<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Theme Forest</title>
</head>
<body>
<?php

require('controller/cURL.php');
$rank = new cURLtheme();

//page one get url cat
//$res = $rank->arr_cat;


$rank->getCategoryForm($rank->arrange_category(),'');
//echo '<pre>';
//print_r($rank->arr_cat);
//echo '</pre>';


$sortby = '';
$top = '';
$themes = [];
if (!empty($_GET['top'])) {
    $top = $_GET['top'];
}
if (!empty($_GET['sort'])) {
    $sortby = $_GET['sort'];
}
if (!empty($_GET['themes'])) {
    $themes = $_GET['themes'];
}









?>


</body>
</html>

