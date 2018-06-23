<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 6/23/18
 * Time: 4:17 PM
 */

//page 2 get detail
$output = '';
$temp   = '';
foreach ( $rank->arr_cat as $key => $value ) {
	$exp = explode( '/', $key );
	if ( $temp != $exp[1] ) {
		$temp   = $exp[1];
		$output .= '<tr>';
		$output .= '<td><h2><label><input type="checkbox" name="themes" value="' . $key . '">' . $value . '</label></h2></td>';
		$output .= '</tr>';

	} else {
		$output .= '<td><label><input type="checkbox" name="themes[]" value="' . $key . '">' . $value . '</label></td>';
	}
}
?>

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
		<?php echo $output; ?>
    </table>
    </form><?php
