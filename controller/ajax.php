<?php
require( 'cURL.php' );
//print_r( $_GET );

if ( ! empty( $_GET['themes'] ) ) {

	$curl = new cURLtheme();

	$theme = $_GET['themes'];
//	$detail_theme = $curl->getDetailTheme( $_GET['themes'] );
	$res_rank_url = $curl->get_nitches_toprank( $theme, $_GET['sort'], $_GET['date'], $_GET['top'] );


	$array_rank_url_detail = [];
	foreach ( $res_rank_url as $value ) {
		$array_rank_url_detail[] = $curl->getDetailTheme( $value );
	}
	print_r( $array_rank_url_detail );
	if ( false && ! empty( $array_rank_url_detail ) ):?>

        <table>
            <tr>
                <td>Nitches</td>
                <td>Name</td>
                <td>Author</td>
                <td><?php echo $_GET['sort']; ?></td>
                <td>Price</td>
            </tr>

			<?php
			foreach ( $array_rank_url_detail as $key => $val ) {
				echo '<td>' . $key . '</td>';
				foreach ( $val as $v ) {
					echo '<tr>';
					echo '<td></td>';
					echo '<td><a href="' . $v[1] . '">' . $v[0] . '</a></td>';
					echo '<td><a href="' . $v[3] . '">' . $v[2] . '</a></td>';
					echo '<td>' . $v[4] . '</td>';
					echo '<td>' . $v[5] . '</td>';
					echo '</tr>';

				}
			}
			?>
        </table>
	<?php
	endif;

//    print_r($detail_theme);
} else {
	echo 'meo co';
}








