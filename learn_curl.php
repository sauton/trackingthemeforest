<?php


$ch = curl_init();

curl_setopt( $ch, CURLOPT_URL,'https://market.envato.com');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);


$output=curl_exec($ch);

curl_close($ch);

echo $output;