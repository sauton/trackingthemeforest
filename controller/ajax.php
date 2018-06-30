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

	$theme = $_GET['themes'];
//	$detail_theme = $curl->getDetailTheme( $_GET['themes'] );
//	$res_rank_url = $curl->get_nitches_toprank( $theme, $_GET['sort'], $_GET['date'], $_GET['top'] );
	$res_rank_url = $curl->getlisttoprank( $theme, $_GET['sort'], $_GET['date'], $_GET['top'] );

//	print_r( $_GET );
//	print_r( $res_rank_url );
	$array_rank_url_detail = [];
	/*     $res_rank_url
	[photography] => Array
		(
			[0] => https://themeforest.net/item/kingsize-fullscreen-photography-theme/166299?s_rank=1
			[1] => https://themeforest.net/item/core-minimalist-photography-portfolio/240185?s_rank=2
			[2] => https://themeforest.net/item/photography-responsive-photography-theme/13304399?s_rank=3
			[3] => https://themeforest.net/item/photolux-photography-portfolio-wordpress-theme/894193?s_rank=4
			[4] => https://themeforest.net/item/tripod-professional-wordpress-photography-theme/4438731?s_rank=5
			[5] => https://themeforest.net/item/chocolate-wp-responsive-photography-theme/299901?s_rank=6
			[6] => https://themeforest.net/item/fluxus-portfolio-theme-for-photographers/3854385?s_rank=7
			[7] => https://themeforest.net/item/expression-photography-responsive-wordpress-theme/2855595?s_rank=8
			[8] => https://themeforest.net/item/dk-for-photography-creative-portfolio/631383?s_rank=9
			[9] => https://themeforest.net/item/village-a-responsive-fullscreen-wordpress-theme/237812?s_rank=10
			[10] => https://themeforest.net/item/photo-me-photo-gallery-photography-theme/12074651?s_rank=11
		)

	[art] => Array
		(
			[0] => https://themeforest.net/item/wave-wordpress-theme-for-artists/5038373?s_rank=1
			[1] => https://themeforest.net/item/tattoo-pro-your-tattoo-shop-wordpress-theme/11690958?s_rank=2
			[2] => https://themeforest.net/item/tattoo-studio-responsive-wordpress-theme/5490599?s_rank=3
			[3] => https://themeforest.net/item/the-curator-premier-wp-timeline-theme-for-artists/2449908?s_rank=4
			[4] => https://themeforest.net/item/inside-creative-parallax-and-scroll-theme/6368314?s_rank=5
			[5] => https://themeforest.net/item/red-art-photography-art-photography-theme/16153193?s_rank=6
			[6] => https://themeforest.net/item/ink-tattoo-studio-creative-wordpress-theme/6588457?s_rank=7
			[7] => https://themeforest.net/item/inkd-tattoo-studio-onepage-wordpress-theme/7512783?s_rank=8
			[8] => https://themeforest.net/item/arte-art-gallery-wordpress-theme/20633505?s_rank=9
			[9] => https://themeforest.net/item/artistas-modern-portfolio-blog-theme/10915213?s_rank=10
			[10] => https://themeforest.net/item/recital-portfolio-blog-wordpress-theme-for-creatives/6069248?s_rank=11
		)

	[experimental] => Array
		(
			[0] => https://themeforest.net/item/anthe-wordpress/4070793?s_rank=1
			[1] => https://themeforest.net/item/greenwich-village-one-page-wordpress-theme/7472860?s_rank=2
			[2] => https://themeforest.net/item/-camera-responsive-creative-wordpress-theme/8909935?s_rank=3
			[3] => https://themeforest.net/item/regolith-responsive-horizontal-portfolio-theme/6276049?s_rank=4
			[4] => https://themeforest.net/item/agen-one-page-multi-page-responsive-wp-theme/11425592?s_rank=5
			[5] => https://themeforest.net/item/paul-creative-multipurpose-wordpress-theme/11104501?s_rank=6
			[6] => https://themeforest.net/item/silent-one-page-multipurpose-wordpress-theme/7803348?s_rank=7
			[7] => https://themeforest.net/item/upward-experimental-portfolio-blog-wordpress-theme/6176008?s_rank=8
			[8] => https://themeforest.net/item/astir-creative-wp-theme-for-artists-craftsmen-artisan-and-creatives/14852949?s_rank=9
			[9] => https://themeforest.net/item/isite-wordpress-version-the-1-page-site/84502?s_rank=10
			[10] => https://themeforest.net/item/mevo-creative-one-page-wordpress-theme/12910432?s_rank=11
		)
*/
	if ( true && ! empty( $res_rank_url ) ) {
		foreach ( $res_rank_url as $key => $value ) {
			foreach ( $value as $val ) {
				$array_rank_url_detail[ $key ][] = $curl->getDetailTheme( $val );
			}
		}
		print_r( $array_rank_url_detail );
	}
	if ( true && ! empty( $array_rank_url_detail ) ):?>

        <table class="table-bordered">
            <tr>
                <td>Nitches</td>
                <td>Theme</td>
                <td>Author</td>
                <td><?php echo $_GET['sort']; ?></td>
                <td>Price</td>
                <td>Created</td>
            </tr>

			<?php
			foreach ( $array_rank_url_detail as $key => $val ) {
				echo '<td>' . $key . '</td>';
				$curl->getTdDetailTheme($val);
			}
			?>
        </table>
	<?php
	endif;

//    print_r($detail_theme);
} else {
	echo 'meo co';
}








