<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 6/9/18
 * Time: 9:59 AM
 */

class cURLtheme
{

    private $url_source = 'https://themeforest.net';
    public $numrank = 5;
    private $dom;
    private $arr_cat = [];

    public function __construct()
    {
        $this->domHTML($this->url_source . '/category');
    }


    private function domHTML($url)
    {
        $this->dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $this->dom->loadHTML($this->curl_theme($url));
    }

    public function getUrlCategory($arg_cat=[],$preg='')
    {
        # Iterate over all the <a> tags
        foreach ($this->dom->getElementsByTagName('a') as $link) {
            # Show the <a href>
            if (preg_match('#^\/category'.$preg.'\/[a-z]+[\/]#', $link->getAttribute('href')) && $link->textContent != 'All Items') {
                preg_match('#^\/category'.$preg.'\/([a-z]+)[\/]#', $link->getAttribute('href'), $match);
                print_r($match);
                echo $link->getAttribute('href');
                //  echo $link->textContent;
                echo "<br />";
                //$this->arr_cat[$match[1]][] = array($link->getAttribute('href'), $link->textContent);

                // echo $link->textContent;
//                    echo "<br />";
//                    echo $link->getAttribute('href');
//                    echo "<br />";
            }
        }
        return $this->arr_cat;

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