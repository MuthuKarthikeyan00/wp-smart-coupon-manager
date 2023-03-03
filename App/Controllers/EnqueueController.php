<?php

namespace App\Controllers;
defined('ABSPATH') or die('not access');
class EnqueueController 
{
    /**
     * add script files
     * @return void
     */
    public function enqueue(){
        wp_enqueue_script('ajax-script',SCM_PLUGIN_URL.'Assets/Js/script.js',array('jquery'));
    }
}

?>