<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 6/9/18
 * Time: 9:49 AM
 */
require('cURL.php');
require('dom/simple_html_dom.php');

$cate=new cURLtheme();
$res=$cate->getUrlCategory();

echo '<pre>';
print_r($res);
echo '</pre>';