<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Theme Forest</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 6/9/18
 * Time: 9:49 AM
 */


require('cURL.php');
$rank = new cURLtheme();

//page one get url cat
$res = $rank->arr_cat;
echo '<pre>';
//print_r($res);
echo '</pre>';

$sortby = '';
$top = '';
$themes = [];
if (!empty($_GET['top'])) {
    $top = $_GET['top'];
}
if (!empty($_GET['sort'])) {
    $sortby = $_GET['sort'];
}
if (!empty($_GET['themes'])) {
    $themes = $_GET['themes'];
}


//page 2 get detail
$output = '';
$temp = '';
foreach ($rank->arr_cat as $key => $value) {
    $exp = explode('/', $key);
    if ($temp != $exp[1]) {
        $temp = $exp[1];
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
        <td>Sales</td>
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

function array2csv(array $array, $sortby)
{
    if (count($array) == 0) {
        return null;
    }
    ob_start();
    $df = fopen("" . date('Y-m-d') . $sortby . ".csv", 'w');
    foreach ($array as $key => $value) {
        fputcsv($df, array($key));
        foreach ($value as $row) {
            fputcsv($df, $row);
        }
    }
    fclose($df);
    return ob_get_clean();
}

array2csv($array_rank_url_detail, $sortby);
?>


</body>
</html>

