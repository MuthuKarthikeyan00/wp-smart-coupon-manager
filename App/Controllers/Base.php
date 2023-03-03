<?php

namespace App\Controllers;
defined('ABSPATH') or die('not access');
class Base
{
    public $available_conditions = array();

    /** create an array for conditions
     * @return array|mixed
     */
    public function getAvailableConditions()
    {
        //Read the conditions directory and create condition object
        if (file_exists(SCM_PLUGIN_PATH . 'App/Conditions/')) {
            $conditions_list = array_slice(scandir(SCM_PLUGIN_PATH . 'App/Conditions/'), 2);
            if (!empty($conditions_list)) {
                foreach ($conditions_list as $condition) {
                    $class_name = basename($condition, '.php');
                    if (!in_array($class_name, array('Base'))) {
                        $condition_class_name = 'App\Conditions\\' . $class_name;
                        if (class_exists($condition_class_name)) {
                            $condition_object = new $condition_class_name();
                            if ($condition_object instanceof \App\Conditions\Base) {
                                $rule_name = $condition_object->name();
                                if (!empty($rule_name)) {
                                    $this->available_conditions[$rule_name] = array(
                                        'object' => $condition_object,
                                    );
                                }
                            }
                        }
                    }
                }

            }
        }
        return $this->available_conditions;
    }
}