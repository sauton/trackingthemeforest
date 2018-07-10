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
			$curl->array2csv( $curl->getAjaxTopCategory(),'top' );
			break;
		case 'detail':
			$curl->array2csv( $curl->getAjaxDetailTheme(), 'detail' );
			break;
		case 'weekly_sale':
			$curl->array2csv( $curl->getAjaxWeeklySale(), 'weekly' );
			break;
	}
} else {
	echo 'meo co';
}








