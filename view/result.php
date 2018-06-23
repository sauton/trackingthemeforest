<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 6/23/18
 * Time: 4:19 PM
 */

if (!empty($themes)) {
	$res_rank_url = $rank->gettoprank($themes, $top, $sortby);

	echo '<pre>';
//print_r($res_rank);
	echo '</pre>';


	$array_rank_url_detail = [];
	foreach ($res_rank_url as $key => $value) {
		foreach ($value as $link_detail) {
			$array_rank_url_detail[$key][] = $rank->getDetailTheme($link_detail);
		}
	}
	echo '<pre>';
	print_r($array_rank_url_detail);
	echo '</pre>';

	?>

	<table>
		<tr>
			<td>Nitches</td>
			<td>Name</td>
			<td>Author</td>
			<td><?php echo $sortby; ?></td>
			<td>Price</td>
		</tr>

		<?php
		foreach ($array_rank_url_detail as $key => $val) {
			echo '<td>' . $key . '</td>';
			foreach ($val as $v) {
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
	/*$curl= '<h2 class="t-heading -size-s">
			  <a rel="author" class="t-link -color-dark -decoration-none" href="/user/tielabs">TieLabs</a>
		  </h2>';
	$curl = trim(preg_replace('/\s\s+/', ' ', $curl));
	$curl = preg_replace('#href="#', 'href="https://themeforest.net', $curl);
	preg_match('#<a\srel="author".*>(.*)</a>#', $curl, $price);
	print_r($price);*/


	$rank->array2csv($array_rank_url_detail, $sortby);
}
//convert to databases mysql


//sortby
// any date
// in the last year
// in the last month
//column
//  create date
//  tracking date
//  avarge sales: create date - tracking date = numday.      sales/numday.
