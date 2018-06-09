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
    private $arr_cat = [];

    public function __construct()
    {

    }


    private function domHTML($url)
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($this->curl_theme($url));
        return $dom;
    }

    public function gettoprank($arr_nitches = ['/wordpress/blog-magazine'], $top = 5, $filter = 'sales')
    {
        $arr = [];

        $sort_by = '?sort=' . $filter;
        if (!empty($arr_nitches)) {
            $arr_nitches = $this->getUrlCategory();
        }
        foreach ($arr_nitches as $item) {

            $dom = $this->domHTML($this->url_source . $item . $sort_by);
            foreach ($dom->getElementsByTagName('a') as $link) {
                # Show the <a href>
                print_r($link->getAttribute('href'));
            }
        }
        return $arr;

    }

    public function getUrlCategory($url = '')
    {
        if (empty($url)) {
            $url = $this->url_source;
        }
        $dom = $this->domHTML($url);
        # Iterate over all the <a> tags
        foreach ($dom->getElementsByTagName('a') as $link) {
            # Show the <a href>
            if (preg_match('#^\/category\/[a-z]+[\/]#', $link->getAttribute('href')) && $link->textContent != 'All Items') {

                $this->arr_cat[] = substr($link->getAttribute('href'), 9);

            }
        }

        return $this->arr_cat;

    }

    private function convertUrltoArray($arr)
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

    private function curl_theme($url)
    {

        if (!$res = $this->getUrlContent($url)) {
            die('Error cURL ');
        }
        return $res;
    }

    private function getUrlContent($url)
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