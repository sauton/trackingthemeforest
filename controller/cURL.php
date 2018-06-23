<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 6/9/18
 * Time: 9:59 AM
 */

class cURLtheme {

	private $url_source = 'https://themeforest.net/category';
	public $numrank = 5;
	public $arr_cat = [];
	private $arranged_category = [];
	private $dom;
	private $cat_cached = '[["wordpress"],["wordpress","blog-magazine"],["wordpress","buddypress"],["wordpress","corporate"],["wordpress","creative"],["wordpress","corporate","directory-listings"],["wordpress","ecommerce"],["wordpress","education"],["wordpress","entertainment"],["wordpress","mobile"],["wordpress","nonprofit"],["wordpress","real-estate"],["wordpress","retail"],["wordpress","technology"],["wordpress","wedding"],["wordpress","miscellaneous"],["wordpress?hosting_setup=1&sort=sales"],["wordpress?hosting_setup=1&sort=sales"],["site-templates"],["site-templates","admin-templates"],["site-templates","corporate"],["site-templates","creative"],["site-templates","entertainment"],["site-templates","mobile"],["site-templates","nonprofit"],["site-templates","personal"],["site-templates","retail"],["site-templates","specialty-pages"],["site-templates","technology"],["site-templates","wedding"],["site-templates","miscellaneous"],["marketing"],["marketing","email-templates"],["marketing","landing-pages"],["marketing","pagewiz"],["marketing","unbounce-landing-pages"],["cms-themes"],["cms-themes","concrete5"],["cms-themes","drupal"],["cms-themes","joomla"],["cms-themes","modx-themes"],["cms-themes","moodle"],["cms-themes","mura"],["cms-themes","webflow"],["cms-themes","weebly"],["cms-themes","miscellaneous"],["ecommerce"],["wordpress","ecommerce","woocommerce"],["ecommerce","3dcart"],["ecommerce","bigcommerce"],["wordpress","ecommerce","cart66"],["ecommerce","cs-cart"],["wordpress","ecommerce","jigoshop"],["ecommerce","magento"],["ecommerce","opencart"],["ecommerce","oscommerce"],["ecommerce","prestashop"],["ecommerce","shopify"],["cms-themes","joomla","virtuemart"],["wordpress","ecommerce","wp-e-commerce"],["ecommerce","zen-cart"],["ecommerce","miscellaneous"],["muse-templates"],["muse-templates","corporate"],["muse-templates","creative"],["muse-templates","ecommerce"],["muse-templates","landing"],["muse-templates","personal"],["muse-templates","miscellaneous"],["sketch-templates"],["psd-templates"],["sketch-templates"],["blogging"],["courses"],["forums"],["blogging","ghost-themes"],["static-site-generators","jekyll"],["blogging","tumblr"],["typeengine-themes"],["site-templates"],["site-templates","creative"],["site-templates","creative","portfolio"],["site-templates","creative","photography"],["site-templates","creative","art"],["site-templates","creative","experimental"],["site-templates","corporate"],["site-templates","corporate","business"],["site-templates","corporate","marketing"],["site-templates","corporate","government"],["site-templates","retail"],["site-templates","retail","fashion"],["site-templates","retail","health-beauty"],["site-templates","retail","shopping"],["site-templates","retail","travel"],["site-templates","retail","food"],["site-templates","retail","children"],["site-templates","technology"],["site-templates","technology","hosting"],["site-templates","technology","electronics"],["site-templates","technology","software"],["site-templates","technology","computer"],["site-templates","nonprofit"],["site-templates","nonprofit","churches"],["site-templates","nonprofit","charity"],["site-templates","nonprofit","environmental"],["site-templates","nonprofit","political"],["site-templates","nonprofit","activism"],["site-templates","entertainment"],["site-templates","entertainment","nightlife"],["site-templates","entertainment","restaurants-cafes"],["site-templates","entertainment","events"],["site-templates","entertainment","film-tv"],["site-templates","entertainment","music-and-bands"],["site-templates","personal"],["site-templates","personal","virtual-business-card"],["site-templates","personal","social-media-home"],["site-templates","personal","photo-gallery"],["site-templates","specialty-pages"],["site-templates","specialty-pages","4-4-pages"],["site-templates","specialty-pages","under-construction"],["site-templates","specialty-pages","miscellaneous"],["site-templates","specialty-pages","resume-cv"],["site-templates","admin-templates"],["site-templates","miscellaneous"],["site-templates","mobile"],["site-templates","wedding"],["wordpress"],["wordpress","blog-magazine"],["wordpress","blog-magazine","personal"],["wordpress","blog-magazine","news-editorial"],["wordpress","creative"],["wordpress","creative","portfolio"],["wordpress","creative","photography"],["wordpress","creative","art"],["wordpress","creative","experimental"],["wordpress","corporate"],["wordpress","corporate","business"],["wordpress","corporate","directory-listings"],["wordpress","corporate","marketing"],["wordpress","retail"],["wordpress","retail","fashion"],["wordpress","retail","health-beauty"],["wordpress","retail","shopping"],["wordpress","retail","travel"],["wordpress","retail","food"],["wordpress","retail","children"],["wordpress","technology"],["wordpress","technology","hosting"],["wordpress","technology","software"],["wordpress","nonprofit"],["wordpress","nonprofit","churches"],["wordpress","nonprofit","charity"],["wordpress","nonprofit","environmental"],["wordpress","nonprofit","political"],["wordpress","nonprofit","activism"],["wordpress","entertainment"],["wordpress","entertainment","nightlife"],["wordpress","entertainment","restaurants-cafes"],["wordpress","entertainment","events"],["wordpress","entertainment","film-tv"],["wordpress","entertainment","music-and-bands"],["wordpress","wedding"],["wordpress","miscellaneous"],["wordpress","mobile"],["wordpress","buddypress"],["wordpress","ecommerce"],["wordpress","ecommerce","wp-e-commerce"],["wordpress","ecommerce","woocommerce"],["wordpress","ecommerce","jigoshop"],["wordpress","ecommerce","cart66"],["wordpress","ecommerce","wp-easycart"],["wordpress","ecommerce","miscellaneous"],["wordpress","real-estate"],["wordpress","education"],["cms-themes"],["cms-themes","webflow"],["cms-themes","weebly"],["cms-themes","joomla"],["cms-themes","joomla","blog-magazine"],["cms-themes","joomla","blog-magazine","personal"],["cms-themes","joomla","blog-magazine","news-editorial"],["cms-themes","joomla","creative"],["cms-themes","joomla","creative","portfolio"],["cms-themes","joomla","creative","photography"],["cms-themes","joomla","creative","art"],["cms-themes","joomla","creative","experimental"],["cms-themes","joomla","corporate"],["cms-themes","joomla","corporate","business"],["cms-themes","joomla","corporate","marketing"],["cms-themes","joomla","corporate","government"],["cms-themes","joomla","retail"],["cms-themes","joomla","retail","fashion"],["cms-themes","joomla","retail","health-beauty"],["cms-themes","joomla","retail","shopping"],["cms-themes","joomla","retail","travel"],["cms-themes","joomla","retail","food"],["cms-themes","joomla","retail","children"],["cms-themes","joomla","technology"],["cms-themes","joomla","technology","hosting"],["cms-themes","joomla","technology","software"],["cms-themes","joomla","nonprofit"],["cms-themes","joomla","nonprofit","churches"],["cms-themes","joomla","nonprofit","charity"],["cms-themes","joomla","nonprofit","environmental"],["cms-themes","joomla","nonprofit","political"],["cms-themes","joomla","entertainment"],["cms-themes","joomla","entertainment","restaurants-cafes"],["cms-themes","joomla","entertainment","events"],["cms-themes","joomla","entertainment","music-and-bands"],["cms-themes","joomla","wedding"],["cms-themes","joomla","virtuemart"],["cms-themes","joomla","miscellaneous"],["cms-themes","drupal"],["cms-themes","drupal","blog-magazine"],["cms-themes","drupal","blog-magazine","personal"],["cms-themes","drupal","blog-magazine","news-editorial"],["cms-themes","drupal","creative"],["cms-themes","drupal","creative","portfolio"],["cms-themes","drupal","creative","photography"],["cms-themes","drupal","creative","experimental"],["cms-themes","drupal","corporate"],["cms-themes","drupal","corporate","business"],["cms-themes","drupal","corporate","marketing"],["cms-themes","drupal","retail"],["cms-themes","drupal","retail","fashion"],["cms-themes","drupal","retail","health-beauty"],["cms-themes","drupal","retail","shopping"],["cms-themes","drupal","retail","travel"],["cms-themes","drupal","retail","food"],["cms-themes","drupal","nonprofit"],["cms-themes","drupal","entertainment"],["cms-themes","drupal","entertainment","restaurants-cafes"],["cms-themes","drupal","entertainment","events"],["cms-themes","drupal","entertainment","music-and-bands"],["cms-themes","drupal","miscellaneous"],["cms-themes","concrete5"],["cms-themes","concrete5","blog-magazine"],["cms-themes","concrete5","blog-magazine","personal"],["cms-themes","concrete5","creative"],["cms-themes","concrete5","creative","portfolio"],["cms-themes","concrete5","corporate"],["cms-themes","concrete5","corporate","business"],["cms-themes","concrete5","entertainment"],["cms-themes","concrete5","entertainment","restaurants-cafes"],["cms-themes","concrete5","entertainment","events"],["cms-themes","moodle"],["cms-themes","moodle","corporate"],["cms-themes","moodle","corporate","business"],["cms-themes","modx-themes"],["cms-themes","mura"],["cms-themes","miscellaneous"],["cms-themes","miscellaneous","creative"],["cms-themes","miscellaneous","corporate"],["cms-themes","miscellaneous","corporate","business"],["cms-themes","miscellaneous","retail"],["cms-themes","miscellaneous","retail","health-beauty"],["cms-themes","miscellaneous","retail","food"],["ecommerce"],["ecommerce","magento"],["ecommerce","magento","entertainment"],["ecommerce","magento","fashion"],["ecommerce","magento","health-beauty"],["ecommerce","magento","miscellaneous"],["ecommerce","magento","shopping"],["ecommerce","magento","technology"],["ecommerce","cs-cart"],["ecommerce","3dcart"],["ecommerce","shopify"],["ecommerce","shopify","entertainment"],["ecommerce","shopify","fashion"],["ecommerce","shopify","health-beauty"],["ecommerce","shopify","miscellaneous"],["ecommerce","shopify","shopping"],["ecommerce","shopify","technology"],["ecommerce","bigcommerce"],["ecommerce","opencart"],["ecommerce","opencart","entertainment"],["ecommerce","opencart","fashion"],["ecommerce","opencart","health-beauty"],["ecommerce","opencart","miscellaneous"],["ecommerce","opencart","shopping"],["ecommerce","opencart","technology"],["ecommerce","oscommerce"],["ecommerce","oscommerce","fashion"],["ecommerce","oscommerce","miscellaneous"],["ecommerce","oscommerce","shopping"],["ecommerce","oscommerce","technology"],["ecommerce","prestashop"],["ecommerce","prestashop","entertainment"],["ecommerce","prestashop","fashion"],["ecommerce","prestashop","health-beauty"],["ecommerce","prestashop","miscellaneous"],["ecommerce","prestashop","shopping"],["ecommerce","prestashop","technology"],["ecommerce","zen-cart"],["ecommerce","zen-cart","fashion"],["ecommerce","zen-cart","health-beauty"],["ecommerce","zen-cart","miscellaneous"],["ecommerce","zen-cart","shopping"],["ecommerce","miscellaneous"],["blogging"],["blogging","tumblr"],["blogging","tumblr","blog"],["blogging","tumblr","portfolio"],["blogging","tumblr","business"],["blogging","tumblr","miscellaneous"],["blogging","ghost-themes"],["blogging","blogger"],["marketing"],["marketing","email-templates"],["marketing","email-templates","newsletters"],["marketing","email-templates","e-flyers"],["marketing","email-templates","catalogs"],["marketing","email-templates","email-stationery"],["marketing","email-templates","miscellaneous"],["marketing","landing-pages"],["marketing","landing-pages","creative"],["marketing","landing-pages","creative","portfolio"],["marketing","landing-pages","creative","photography"],["marketing","landing-pages","creative","art"],["marketing","landing-pages","corporate"],["marketing","landing-pages","corporate","business"],["marketing","landing-pages","corporate","marketing"],["marketing","landing-pages","corporate","informational"],["marketing","landing-pages","corporate","government"],["marketing","landing-pages","retail"],["marketing","landing-pages","retail","fashion"],["marketing","landing-pages","retail","health-beauty"],["marketing","landing-pages","retail","shopping"],["marketing","landing-pages","retail","travel"],["marketing","landing-pages","retail","food"],["marketing","landing-pages","retail","children"],["marketing","landing-pages","technology"],["marketing","landing-pages","technology","hosting"],["marketing","landing-pages","technology","electronics"],["marketing","landing-pages","technology","software"],["marketing","landing-pages","technology","computer"],["marketing","landing-pages","technology","apps"],["marketing","landing-pages","nonprofit"],["marketing","landing-pages","nonprofit","charity"],["marketing","landing-pages","nonprofit","political"],["marketing","landing-pages","nonprofit","activism"],["marketing","landing-pages","entertainment"],["marketing","landing-pages","entertainment","restaurants-cafes"],["marketing","landing-pages","entertainment","events"],["marketing","landing-pages","entertainment","film-tv"],["marketing","landing-pages","personal"],["marketing","landing-pages","personal","virtual-business-card"],["marketing","landing-pages","mobile"],["marketing","landing-pages","miscellaneous"],["marketing","pagewiz"],["marketing","unbounce-landing-pages"],["forums"],["forums","phpbb"],["forums","vanilla"],["forums","vbulletin"],["forums","miscellaneous"],["psd-templates"],["psd-templates","creative"],["psd-templates","creative","portfolio"],["psd-templates","creative","photography"],["psd-templates","creative","art"],["psd-templates","creative","experimental"],["psd-templates","corporate"],["psd-templates","corporate","business"],["psd-templates","corporate","marketing"],["psd-templates","corporate","government"],["psd-templates","retail"],["psd-templates","retail","fashion"],["psd-templates","retail","health-beauty"],["psd-templates","retail","shopping"],["psd-templates","retail","travel"],["psd-templates","retail","food"],["psd-templates","retail","children"],["psd-templates","technology"],["psd-templates","technology","hosting"],["psd-templates","technology","electronics"],["psd-templates","technology","software"],["psd-templates","technology","computer"],["psd-templates","nonprofit"],["psd-templates","nonprofit","churches"],["psd-templates","nonprofit","charity"],["psd-templates","nonprofit","environmental"],["psd-templates","nonprofit","political"],["psd-templates","nonprofit","activism"],["psd-templates","entertainment"],["psd-templates","entertainment","nightlife"],["psd-templates","entertainment","restaurants-cafes"],["psd-templates","entertainment","events"],["psd-templates","entertainment","film-tv"],["psd-templates","personal"],["psd-templates","personal","virtual-business-card"],["psd-templates","personal","social-media-home"],["psd-templates","personal","photo-gallery"],["psd-templates","miscellaneous"],["muse-templates"],["muse-templates","creative"],["muse-templates","corporate"],["muse-templates","ecommerce"],["muse-templates","landing"],["muse-templates","personal"],["muse-templates","miscellaneous"],["sketch-templates"],["typeengine-themes"],["static-site-generators"],["static-site-generators","jekyll"],["courses"],["courses","web-design"],["courses","code"]]';


	public function __construct() {
		$this->dom = new DOMDocument();

//		$this->getUrlCategory();
//		$this->arrange_category( $this->getUrlCategory() );
//		$this->arrange_category( json_decode( $this->cat_cached ) );
	}

	private function getJsondecodeCategory() {
		return json_decode( $this->cat_cached );
	}

	public function arrange_category() {
		$arr_cat = $this->getJsondecodeCategory();
		foreach ( $arr_cat as $index => $items ) {
			switch ( count( $items ) ) {
				case 1:
					$this->arranged_category[ $items[0] ] = [];
					break;
				case 2:
					$this->arranged_category[ $items[0] ][ $items[1] ] = [];

					break;
				case 3:
					$this->arranged_category[ $items[0] ][ $items[1] ][ $items[2] ] = [];

					break;
				case 4:
					$this->arranged_category[ $items[0] ][ $items[1] ][ $items[2] ][ $items[3] ] = [];

					break;
			}
		}

		return $this->arranged_category;
	}

	public function getUrlThemeforest() {
		return $this->url_source;
	}

	private function domHTML( $url ) {
		libxml_use_internal_errors( true );
		$this->dom->loadHTML( $this->curl_theme( $url ) );

		return $this->dom;
	}

	public function gettoprank( $arr_nitches = [], $top = 5, $filter = 'sales' ) {
		$arr = [];

		$sort_by = '?sort=' . $filter;
		if ( empty( $arr_nitches ) ) {
			$arr_nitches = $this->arr_cat;
		}
		foreach ( $arr_nitches as $item ) {
//            print_r($this->url_source . $item . $sort_by);

			$this->domHTML( $this->url_source . $item . $sort_by );

			$url_arr = explode( '/', $item );
			$url_arr = $url_arr[ count( $url_arr ) - 1 ];

			$i = 1;
			foreach ( $this->dom->getElementsByTagName( 'a' ) as $link ) {
				if ( preg_match( '#.*s_rank=' . $i . '#', $link->getAttribute( 'href' ) ) && $i <= $top ) {
					$i ++;
					$arr[ $url_arr ][] = $link->getAttribute( 'href' );
				}
			}
		}

		return $arr;
	}

	public function getDetailTheme( $url ) {
		$curl = $this->curl_theme( $url );


		$curl = trim( preg_replace( '/\s\s+/', ' ', $curl ) );
		$curl = trim( preg_replace( '#<span class="sidebar-stats__icon"><i class="e-icon -icon-cart"></i></span>#', '', $curl ) );
		$curl = preg_replace( '#href="#', 'href="https://themeforest.net', $curl );
		preg_match( '#is-hidden-phone">(.*?)</h1>#', $curl, $title );
		preg_match( '#js-purchase-price">(.*?)</span>#', $curl, $price );
		preg_match( '#sidebar-stats__number">(.*?)</strong>#', $curl, $sale );
		preg_match( '#<a\srel="author".*href="(.*)">(.*)</a>#', $curl, $author );


		return array( $title[1], $url, $author[2], $author[1], $sale[1], $price[1] );

	}

	public function getUrlCategory( $url = '' ) {
		if ( empty( $url ) ) {
			$url = $this->url_source;
		}
		$dom = $this->domHTML( $url );
		# Iterate over all the <a> tags
		foreach ( $dom->getElementsByTagName( 'a' ) as $link ) {
			# Show the <a href>
			if ( preg_match( '#^\/category\/.[a-z]#', $link->getAttribute( 'href' ) ) && $link->textContent != 'All Items' ) {
				echo '<pre>';
				print_r( $link->getAttribute( 'href' ) );
				echo '</pre>';

//				$this->arr_cat[ substr( $link->getAttribute( 'href' ), 9 ) ] = $link->textContent;
				$this->arr_cat[] = explode( '/', substr( $link->getAttribute( 'href' ), 10 ) );

			}
		}

		return $this->arr_cat;
	}

	private function curl_theme( $url ) {

		if ( ! $res = $this->getUrlContent( $url ) ) {
			die( 'Error cURL ' );
		}

		return $res;
	}

	private function getUrlContent( $url ) {
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)' );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
		curl_setopt( $ch, CURLOPT_TIMEOUT, 5 );
		$data     = curl_exec( $ch );
		$httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		curl_close( $ch );

		return ( $httpcode >= 200 && $httpcode < 300 ) ? $data : false;
	}

	public function array2csv( array $array, $sortby ) {
		if ( count( $array ) == 0 ) {
			return null;
		}
		ob_start();
		$df = fopen( "" . date( 'Y-m-d' ) . $sortby . ".csv", 'w' );
		foreach ( $array as $key => $value ) {
			fputcsv( $df, array( $key ) );
			foreach ( $value as $row ) {
				fputcsv( $df, $row );
			}
		}
		fclose( $df );

		return ob_get_clean();
	}

	public function getCategoryForm( $arr_temp, $output ) {

		if ( count( $arr_temp ) > 0 ):
			foreach ( $arr_temp as $key => $value ) :

				if ( count( $value ) > 0 ) {
					$output_temp = $output;
					$output_temp .= '/' . $key;
					echo '<pre>';
					print_r( $output . '/' . $key );
					echo '</pre>';
					$this->getCategoryForm( $value, $output_temp );
				} else {
					echo '<pre>';
					echo $output . '/' . $key;
					echo '</pre>';
				}
				//			if ( $temp != $exp[1] ) {
//				$temp   = $exp[1];
//				$output .= '<tr>';
//				$output .= '<td><h2><label><input type="checkbox" name="themes" value="' . $key . '">' . $value . '</label></h2></td>';
//				$output .= '</tr>';
//
//			} else {
//				$output .= '<td><label><input type="checkbox" name="themes[]" value="' . $key . '">' . $value . '</label></td>';
//			}
			endforeach;
		else:
			echo count( $arr_temp );
			print_r( $arr_temp );

		endif;

		/*return '
		<form action="" method="get">
		<table>
			<input type="submit">
			<br>
			<select name="sort" id="">
				<option value="sales">sales</option>
				<option value="rating">rating</option>
			</select>
			<br>
			<label for="">top<input type="text" name="top"></label>
			' . $output . '
		</table>
		</form>';*/

	}
}

?>