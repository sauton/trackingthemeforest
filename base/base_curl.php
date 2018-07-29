<?php

/**
 * Date: 7/29/18
 * Time: 2:31 PM
 */
abstract class base_curl {
	protected $dom;

	public function __construct() {
		$this->dom = new DOMDocument();
	}
	protected function curl_theme( $url ) {
		if ( ! $res = $this->getUrlContent( $url ) ) {
			$this->getUrlContent( $url );
//			print_r( 'Error_CURL' );
		}

		return $res;
	}
	protected function domHTML( $url ) {
		libxml_use_internal_errors( TRUE );
		$this->dom->loadHTML( $this->curl_theme( $url ) );

		return $this->dom;
	}
	protected function getUrlContent( $url ) {
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$data     = curl_exec( $ch );
		$httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

		curl_close( $ch );

		return ( $httpcode >= 200 && $httpcode < 300 ) ? $data : FALSE;
	}
}