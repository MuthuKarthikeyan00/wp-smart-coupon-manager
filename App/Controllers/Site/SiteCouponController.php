<?php
namespace App\Controllers\Site;
use \App\Controllers\Base;

defined('ABSPATH') or die('not access');
class SiteCouponController extends  Base
{
    /** trigger check method
     * @param $is_valid
     * @param $coupon_code
     * @return void
     */
    public function triggerCheck($is_valid,$coupon_code){
        $avilable_conditons = $this->getAvailableConditions();
        foreach ($avilable_conditons as $avilable_conditon){
            if(method_exists($avilable_conditon['object'],'check')){
                return $avilable_conditon['object']->check($is_valid,$coupon_code);
            }
        }
    }

    /**
     * check coupon valid or not
     * @param $is_valid
     * @param $coupon_code
     * @return null
     */
    public function couponValidOrNot($is_valid, $coupon_code)
    {
        return $this->triggerCheck($is_valid,$coupon_code);
    }

    /** check and remove applied coupons
     * @param $data
     * @return void
     */
    public function myCheckoutUpdate($data)
    {
        parse_str($data, $result);
        WC()->session->set('SCM_billing_email', $result['billing_email']);
        foreach (WC()->cart->get_applied_coupons() as $coupon_code) {
            $is_valid = $this->triggerCheck(true,$coupon_code);
            if(!$is_valid){
                WC()->cart->remove_coupon($coupon_code);
            }
        }
        return;
    }

}







