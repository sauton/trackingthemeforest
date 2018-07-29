<?php
echo '<pre>';
print_r( __DIR__. '/config.php' );
echo '</pre>';
//require( ABS_PATH. '/controller/cURL.php' );
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

	$notnot = new cURLtheme();

	switch ( $_GET['type'] ) {
		case 'category' :
			$theme = $_GET['themes'];
			$sort  = ! empty( $_GET['sort'] ) ? $_GET['sort'] : '';
			$date  = ! empty( $_GET['date'] ) ? $_GET['date'] : '';
			$top   = ! empty( $_GET['top'] ) ? $_GET['top'] : '';
			$notnot->array2csv( $notnot->getAjaxTopCategory( $theme, $sort, $date, $top ), 'top' );
			break;
		case 'detail':
			$notnot->array2csv( $notnot->getAjaxDetailTheme( $_GET['themes'] ), 'detail' );
			break;
		case 'weekly_sale':
			$notnot->array2csv( $notnot->getAjaxWeeklySale( $_GET['themes'] ), 'weekly' );
			break;
	}
} else {
	echo 'meo co';
}








