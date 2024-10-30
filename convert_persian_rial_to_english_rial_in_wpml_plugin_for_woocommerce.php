<?php
/*
Plugin Name: Convert Persian Rial to English Rial in wpml plugin for woocommerce 
Description: Convert Persian Rial to English Rial in wpml plugin for woocommerce
Author: mrMB
Author URI: https://mojtaba.site
Version: 1.0
Text Domain: mrmb-cprteriwpfw
Domain Path: /languages/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Load plugin textdomain.
 */
add_action('plugins_loaded', 'cprteriwpfw_load_textdomain');

function cprteriwpfw_load_textdomain()
{
    load_plugin_textdomain('mrmb-cprteriwpfw', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

/**
 * Change a currency symbol
 */
if (!function_exists('cprteriwpfw_change_existing_currency_symbol')) {
    add_action('init', function () {
        if (ICL_LANGUAGE_CODE == 'en') {
            add_filter('woocommerce_currency_symbol', 'cprteriwpfw_change_existing_currency_symbol', 10, 2);

            function cprteriwpfw_change_existing_currency_symbol($currency_symbol, $currency)
            {
                switch ($currency) {
                    case 'IRR':
                        $currency_symbol = 'Rial';
                        break;
                    case 'IRT':
                        $currency_symbol = 'Toman';
                        break;
                }
                return $currency_symbol;
            }
        }
    }, 99999);
}
