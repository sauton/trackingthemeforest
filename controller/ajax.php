<?php
require( 'cURL.php' );
//print_r( $_GET );

//$curl = new cURLtheme();
//
//
//$res_rank_url = $curl->getlisttoprank( [
//	'https://themeforest.net/category/wordpress/creative/photography',
//	'https://themeforest.net/category/wordpress/creative/experimental'
//] );
//$res_rank_url = $curl->curl_theme( 'https://themeforest.net/category/wordpress/creative/photography' ,1);
//$res_rank_url = $curl->getUrlContent( 'https://market.envato.com');

//echo '<pre>';
//print_r( $res_rank_url );
//echo '</pre>';
if ( ! empty( $_GET['themes'] ) ) {

	$curl = new cURLtheme();

	switch ( $_GET['type'] ) {
		case 'category' :
			$curl->getAjaxTopCategory();
			break;
		case 'detail':
			$curl->getAjaxDetailTheme();
			break;
		case 'weekly_sale':
			$curl->getAjaxWeeklySale();
			break;
	}
} else {
	echo 'meo co';
}








