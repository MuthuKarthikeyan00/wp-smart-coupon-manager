<?php
namespace App;

use \App\Controllers\Admin\AdminCouponController;
use \App\Controllers\Site\SiteCouponController;
use \App\Controllers\EnqueueController;

defined('ABSPATH') or die('not access');
class Router
{
    private static $admin_coupon_controller,$site_coupon_controller,$enqueue_controller;

    /** Register all events
     * @return void
     */
    public function register()
    {
        self::$admin_coupon_controller = empty( self::$admin_coupon_controller) ?  new AdminCouponController() : self::$admin_coupon_controller;
        self::$site_coupon_controller = empty( self::$site_coupon_controller) ?  new SiteCouponController() : self::$site_coupon_controller;
        self::$enqueue_controller = empty( self::$enqueue_controller) ?  new EnqueueController() : self::$enqueue_controller;
        // create coupon tap and panels
        add_filter('woocommerce_coupon_data_tabs', array(self::$admin_coupon_controller,'addCouponTap'));
        add_action('woocommerce_coupon_data_panels', array(self::$admin_coupon_controller,'addWpCouponPanel'),1,2);
        add_action( 'woocommerce_before_data_object_save', array(self::$admin_coupon_controller,'saveWpCouponPanel') );
        // process and check coupons valid or not
        add_filter('woocommerce_coupon_is_valid',array(self::$site_coupon_controller,'couponValidOrNot'), 10, 2);
        add_action('woocommerce_checkout_update_order_review',array(self::$site_coupon_controller,'myCheckoutUpdate'),10);
        // add js and css files
        add_action('wp_enqueue_scripts',array(self::$enqueue_controller,'enqueue'));
    }
}


