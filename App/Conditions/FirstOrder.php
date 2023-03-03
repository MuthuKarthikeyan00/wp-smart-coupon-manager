<?php

namespace App\Conditions;
use App\Conditions\Base;
defined('ABSPATH') or die('not access');
class FirstOrder extends Base
{
    public function __construct()
    {
        $this->name = "FirstOrder";
    }

    /** check coupon valid or not
     * @param $is_valid
     * @param $coupon_code
     * @return false
     */
    public function check($is_valid,$coupon_code)
    {
        $orders = array();
        $billing_email = WC()->session->get('SCM_billing_email');
        $coupon_id = new \WC_Coupon($coupon_code);
        $coupon_fields = get_post_meta($coupon_id->get_id());
        $only_for_first_order = $coupon_fields['only_for_first_order'][0];
        $user_id = get_current_user_id();
        if (!$user_id) {
            $user = get_user_by('email', $billing_email);
            $user_id = $user->ID;
        }
        if ($only_for_first_order == 1 && $user_id) {
            $orders = wc_get_orders(array(
                'customer_id' => $user_id,
                'status' => 'any',
                'limit' => 1
            ));
            if(empty(count($orders))){
                $user_data = get_userdata($user_id);
                if ($user_data) {
                    $user_email = $user_data->user_email;
                    $orders = wc_get_orders(array(
                        'billing_email' =>  $user_email,
                        'status' => 'any',
                        'limit' => 1
                    ));
                }
            }
        }
        if ($only_for_first_order == 1 && !empty($billing_email) && empty(count($orders))) {
            $orders = wc_get_orders(array(
                'billing_email' =>  $billing_email,
                'status' => 'any',
                'limit' => 1
            ));
        }
        if (count($orders)) {
            return  false;
        }
        return $is_valid;
    }
}