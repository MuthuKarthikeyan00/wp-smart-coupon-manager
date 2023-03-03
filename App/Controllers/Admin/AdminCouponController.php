<?php

namespace App\Controllers\Admin;

defined('ABSPATH') or die('not access');
class AdminCouponController
{
    /** Create New tap for Smart Coupon Manager
     * @param $tabs
     * @return mixed
     */
    public function addCouponTap($tabs)
    {
        $tabs['wp_coupons'] = array(
            'label'    => __('Smart Coupon Manager', 'woocommerce'),
            'target'   => 'custom_coupon_options',
        );
        return $tabs;
    }

    /** Get frontend View
     * @param $id
     * @param $data
     * @return mixed
     */
    public function addWpCouponPanel($id, $data)
    {
        if (isset($_GET['post']) && $_GET['action'] == "edit") {
            $coupon_fields = get_post_meta(sanitize_text_field($_GET['post']));
            $coupon_fields_data = $coupon_fields['only_for_first_order'][0];
        }
        return require_once "" . SCM_PLUGIN_PATH . "/App/Views/wp-coupons.php";
    }

    /** Save custom fields
     * @param $post_id
     * @return void
     */
    public function saveWpCouponPanel($post_id)
    {
        $post_id  = json_decode($post_id, true);
        $custom_field = isset($_POST['only_for_first_order']) ? sanitize_text_field($_POST['only_for_first_order']) : '';
        update_post_meta($post_id['id'], 'only_for_first_order', $custom_field);
    }
}
