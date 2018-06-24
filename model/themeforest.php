<?php

class themeforest_model
{
    private $favorite_theme = array(
        'Arredo' => 'https://themeforest.net/item/arredo-a-clean-woocommerce-wordpress-theme/22122445?s_rank=1',
        'Chromium' => 'https://themeforest.net/item/chromium-auto-parts-shop-wordpress-woocommerce-theme/21832717?s_rank=2',
        'Mantis' => 'https://themeforest.net/item/mantis-minimal-modern-woocommerce-theme/22115715?s_rank=3',
    );

    public function __construct()
    {

    }

    public function getFavoriteListTheme()
    {
        $html_format = '<p><a href="%2$s" target="_blank">%1$s</a><input type="hidden" name="themes" value="%2$s"></p>';
        foreach ($this->favorite_theme as $key => $value) {
            printf($html_format, $key, $value);
        }
    }


}