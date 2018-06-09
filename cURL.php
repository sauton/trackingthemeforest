<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 6/9/18
 * Time: 9:59 AM
 */

class cURL
{

    private  $url_source = 'https://themeforest.net';
    public  $numrank=5;
    private $dom;
    public function __construct()
    {
        $this->domHTML($this->url_source . '/category');
    }


    private function domHTML($url){
        $this->dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $this->dom->loadHTML($this->curl_theme($url));
    }
    public function getUrlCategory()
    {

        //$XPath = new DOMXPath($doc);
        //$tr = $XPath->query('//*[@id="right"]//*[@class="olddata"][1]//td[@class="numeric"][1]');
        //$trHTML = $tr->item(0)->nodeValue;
        //echo $trHTML;
        # Iterate over all the <a> tags
        foreach ($this->dom->getElementsByTagName('a') as $link) {
            # Show the <a href>
            if (preg_match('#^\/category\/#', $link->getAttribute('href')) && $link->textContent != 'All Items') {
                echo $link->textContent;
                echo "<br />";
                echo $link->getAttribute('href');
                echo "<br />";
            }
        }
    }
    private function curl_theme($url){

        if(!$res=$this->getUrlContent($url)){
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