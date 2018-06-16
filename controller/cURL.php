<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 6/9/18
 * Time: 9:59 AM
 */

class cURLtheme
{

    private $url_source = 'https://themeforest.net/category';
    public $numrank = 5;
    public $arr_cat = [];
    private $dom;

    public function __construct()
    {
        $this->dom = new DOMDocument();
        $this->getUrlCategory();
    }

    public function getUrlThemeforest()
    {
        return $this->url_source;
    }

    private
    function domHTML($url)
    {
        libxml_use_internal_errors(true);
        $this->dom->loadHTML($this->curl_theme($url));
        return $this->dom;
    }

    public
    function gettoprank($arr_nitches = [], $top = 5, $filter = 'sales')
    {
        $arr = [];

        $sort_by = '?sort=' . $filter;
        if (empty($arr_nitches)) {
            $arr_nitches = $this->arr_cat;
        }
        foreach ($arr_nitches as $item) {
//            print_r($this->url_source . $item . $sort_by);

            $this->domHTML($this->url_source . $item . $sort_by);

            $url_arr = explode('/', $item);
            $url_arr = $url_arr[count($url_arr) - 1];

            $i = 1;
            foreach ($this->dom->getElementsByTagName('a') as $link) {
                if (preg_match('#.*s_rank=' . $i . '#', $link->getAttribute('href')) && $i <= $top) {
                    $i++;
                    $arr[$url_arr][] = $link->getAttribute('href');
                }
            }
        }
        return $arr;
    }

    public function getDetailTheme($url)
    {
        $curl = $this->curl_theme($url);


        $curl = trim(preg_replace('/\s\s+/', ' ', $curl));
        $curl = trim(preg_replace('#<span class="sidebar-stats__icon"><i class="e-icon -icon-cart"></i></span>#', '', $curl));
        $curl = preg_replace('#href="#', 'href="https://themeforest.net', $curl);
        preg_match('#is-hidden-phone">(.*?)</h1>#', $curl, $title);
        preg_match('#js-purchase-price">(.*?)</span>#', $curl, $price);
        preg_match('#sidebar-stats__number">(.*?)</strong>#', $curl, $sale);
        preg_match('#<a\srel="author".*href="(.*)">(.*)</a>#', $curl, $author);


        return array($title[1],$url, $author[2], $author[1], $sale[1], $price[1]);

        /*echo '<br>';
        print_r($author);
        echo '<br>';
        print_r($sale);
        echo '<br>';
        print_r($price);
        echo '<br>';
        print_r($title);
        echo '<br>';*/
    }

    public
    function getUrlCategory($url = '')
    {
        if (empty($url)) {
            $url = $this->url_source;
        }
        $dom = $this->domHTML($url);
        # Iterate over all the <a> tags
        foreach ($dom->getElementsByTagName('a') as $link) {
            # Show the <a href>
            if (preg_match('#^\/category\/.[a-z]#', $link->getAttribute('href')) && $link->textContent != 'All Items') {

                $this->arr_cat[substr($link->getAttribute('href'), 9)] = $link->textContent;

            }
        }


    }

    private
    function convertUrltoArray($arr)
    {
        foreach ($arr as $item) {
            $path = $item;

            $arr_cat = explode('/', substr($path, 1));

            switch (count($arr_cat)) {
                case 3:
                    $this->arr_cat[$arr_cat[0]][$arr_cat[1]][$arr_cat[2]] = [];
                    break;
                case 4:
                    $this->arr_cat[$arr_cat[0]][$arr_cat[1]][$arr_cat[2]][$arr_cat[3]] = [];
                    break;
                case 5:
                    $this->arr_cat[$arr_cat[0]][$arr_cat[1]][$arr_cat[2]][$arr_cat[3]][$arr_cat[4]] = [];
                    break;
            }
        }
    }

    private
    function curl_theme($url)
    {

        if (!$res = $this->getUrlContent($url)) {
            die('Error cURL ');
        }
        return $res;
    }

    private
    function getUrlContent($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ($httpcode >= 200 && $httpcode < 300) ? $data : false;
    }


}

?>