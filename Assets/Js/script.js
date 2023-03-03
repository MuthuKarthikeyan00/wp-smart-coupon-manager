jQuery(document).ready(function ($) {
    $(document).on('blur','#billing_email',"",function($) {
        refreshCart();
    });
    function refreshCart() {
        $('#billing_country').trigger('change');
    }
});
