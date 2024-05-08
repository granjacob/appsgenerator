<?php

namespace system\jupiter\core;

use \ArrayObject;

abstract class GeneratorClass extends ArrayObject {

    public $selected;

    public $disabled;

    public $customCondition;

    public $options;

    public function __construct()
    {
        $this->options = array();
    }

    public function validateData()
    {
    }

    public abstract function write();


    public function getOptionsArray( $keys, $currentKey, &$currentItem )
    {

        return array(
            "condition:notlast" => (end($keys) !== $currentKey),
            "condition:first" => ($currentKey === $keys[0]),
            "condition:notfirst" => ($currentKey !== $keys[0]),
            "condition:disabled" => ($currentItem->disabled === true),
            "condition:notdisabled" => ($currentItem->disabled !== true),
            "condition:selected" => ($currentItem->selected === true),
            "condition:notselected" => ($currentItem->selected !== true),
            "condition:enabled" => ($currentItem->disabled !== true),
            "condition:notenabled" => ($currentItem->disabled === true),
            "condition:last" => ($currentKey === end($keys)),
        );
    }

    public function validateOptions( $conditionKey )
    {

        return (isset($this->options[$conditionKey]) &&
				$this->options[$conditionKey] === true) || 
                !isset($this->options[$conditionKey]);
    }

    public function writeArrayObject( &$object, $writeAsClass )
    {
        if ($object !== null) {

            $temp = new $writeAsClass();


			$keys = array_keys((array)$object);

			foreach ($object as $key => $item) {

                $itemKeys = get_object_vars( $item );

                foreach ($itemKeys as $key => $attr) {
                    if (property_exists( $temp, $key ))
                        $temp->$key = $item->$key;
                }
                $temp->write();

			}


		}
    }


}
