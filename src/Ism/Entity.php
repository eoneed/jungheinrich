<?php
namespace Ism;

/**
 *
 */
abstract class Entity {

    /**
     *
     */
    public function __construct($props = [])
    {
        foreach($props as $key => $val) {
            $this->$key = $val;
        }
    }

    /**
     *
     */
    public function hasValidationRules()
    {
        return method_exists($this, 'loadValidatorRules');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $return = [];
        foreach(get_object_vars($this) as $key => $val) {
            $return[$key] = $val;
        }

        return $return;
    }

}
