<?php

/**
 * Plugin name: Smart Coupon Manager
 * Description: smart-coupon-manger.
 * Author: cartrabbit
 */

defined('ABSPATH') or die('not access');

defined('SCM_PLUGIN_PATH') or define('SCM_PLUGIN_PATH',plugin_dir_path(__FILE__));
defined('SCM_PLUGIN_URL') or define('SCM_PLUGIN_URL',plugin_dir_url(__FILE__));
defined('SCM_PLUGIN') or define('SCM_PLUGIN',plugin_basename(__FILE__));

if(file_exists( SCM_PLUGIN_PATH.'/vendor/autoload.php' )){
    require_once SCM_PLUGIN_PATH.'/vendor/autoload.php';
}
if(class_exists('App\\Router')){
      $router =  new App\Router();
      $router->register();
}
