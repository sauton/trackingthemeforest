<?php
require('cURL.php');

if (!empty($_GET['themes'])) {

    $curl = new cURLtheme();
    $detail_theme = $curl->getDetailTheme($_GET['themes']);
    print_r($detail_theme);
} else {
    echo 'meo co';
}








