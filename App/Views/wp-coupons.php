<?php
defined('ABSPATH') or die('not access');
?>

<div id="custom_coupon_options" class="panel woocommerce_options_panel map">
    <div class="options_group">
        <p class="form-field">
            <label for="only_for_first_order"><?php _e('Only For First Order', 'woocommerce'); ?></label>
            <input type="checkbox" name="only_for_first_order" id="only_for_first_order" value="1" <?php if ($coupon_fields_data == 1) {
                                                                                                        echo "checked";
                                                                                                    } ?> />
            <span for="only_for_first_order" class="description"><?php _e('Check this box if the coupon cannot be used in second order.', 'woocommerce'); ?></span>
        </p>
    </div>
</div>