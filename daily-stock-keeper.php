<?php

/**
 * Plugin Name: Daily Stock Keeper
 * Description: Assist users manage their product inventory on a daily basis.
 * Author: Zeeshan Ahmed
 * Author URI: https://github.com/zeeshanahmedcode
 * Version: 0.0.1
 * Text Domain: Daily Stock Keeper
 *
 * Copyright: (c) 2023 Zeeshan Ahmed. All rights reserved.
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package   Daily Stock Keeper
 * @author    Zeeshan Ahmed
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 *
 * Requires PHP: 8.0
 * WC requires at least: 7.0.0
 * WC tested up to: 7.2.2
 */

use GreatWebsiteStudio\DailyProductInventory;

/**
 * Global constants.
 *  
 */

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human !');

if (!defined('DPI_FILE')) {

    define('DPI_FILE', __FILE__);
}

if (!defined('DPI_PATH')) {

    define('DPI_PATH', plugin_dir_path(__FILE__));
}

/**
 * Load all file on src directory.
 *  
 */

foreach (glob(DPI_PATH . 'src/*.php') as $filename) {

    require_once $filename;
}

/**
 * Register activation and deactivation hook.
 *  
 */

register_activation_hook(
    __FILE__,
    array(
        GreatWebsiteStudio\DailyProductInventory::class,
        'activate'
    )
);

register_deactivation_hook(
    __FILE__,
    array(
        GreatWebsiteStudio\DailyProductInventory::class,
        'deactivate'
    )
);

/**
 * Create a new DailyProductInventory instance.
 * 
 */

$dailyProductInventory = new DailyProductInventory();
