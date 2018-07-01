<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Theme Forest</title>
    <link rel="stylesheet" href="assets/js/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/libs/jquery-3.3.1.min.js"></script>
    <script src="assets/js/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>

<?php

require( 'controller/cURL.php' );
require( 'model/themeforest.php' );
$rank = new cURLtheme();
?>

<div class="listcategory">
	<?php
	$rank->getCategoryForm( $rank->arrange_category(), '' );
	?>
</div>
<div class="fixed-table">
    <div class="container scroll">
        <h2>Thang</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" class="active show" href="#home">Get Top List</a></li>
            <li><a data-toggle="tab" href="#menu1">Get Favorite Detail</a></li>
            <li><a data-toggle="tab" href="#menu2">Get Detail Theme</a></li>
            <li><a data-toggle="tab" href="#menu3">Get Weekly Nitches Sales</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active show">
                <h3>Choose List Category</h3>
                <form id="get_list_category" action="" method="get">
                    <table>
                        sort
                        <select name="sort" id="">
                            <option value="sales">sales</option>
                            <option value="rating">rating</option>
                            <option value="trending">trending</option>
                        </select>
                        date
                        <select name="date" id="">
                            <option value="">Any date</option>
                            <option value="this-year">In the last year</option>
                            <option value="this-month">In the last month</option>
                            <option value="this-week">In the last week</option>
                        </select>
                        top
                        <select name="top" id="">
							<?php
							for ( $i = 1; $i < 32; $i ++ ) {
								echo ' <option value="' . $i . '">' . $i . '</option>';
							}
							?>
                        </select>
                        <input type="submit">
                        <div class="show_detail_themes">
                        </div>
                    </table>
                    <!-- define type to get  -->
                    <input type="hidden" name="type" value="category">
                </form>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Favorite Theme</h3>
                <form id="get_specific_theme" action="" method="get">
					<?php
					$model_themeforest = new themeforest_model();
					$model_themeforest->getFavoriteListTheme();
					?>
                    <!-- define type to get  -->
                    <input type="hidden" name="type" value="detail">
                    <input type="submit">
                    <div class="show_detail_themes">
                    </div>
                </form>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Get Detail Theme</h3>
                <form id="get_specific_theme" action="" method="get">
                    <label for="">Detail Theme:
                        https://themeforest.net/item/arredo-a-clean-woocommerce-wordpress-theme/22122445?s_rank=1
                        <input
                                type="text" name="themes[]"></label>
                    <!-- define type to get  -->
                    <input type="hidden" name="type" value="detail">

                    <input type="submit">
                    <div class="show_detail_themes">
                    </div>
                </form>
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>Get Weekly Nitches Sales</h3>
                <!-- define type to get  -->
                <button class="btn-danger get_weekly_sale">GetAll Top 10</button>
                <div class="show_detail_themes">
                </div>
            </div>
        </div>
    </div>

</div>

<?php


?>


</body>
</html>

