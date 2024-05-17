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

    public function verifyOptionalExpression( $objectOrVar )
    {
        if (is_array( $objectOrVar )) {
            return ($objectOrVar !== null && count($objectOrVar) > 0);
        }
        else if ($objectOrVar instanceof ArrayObject) {
            return $objectOrVar !== null && $objectOrVar->count();
        }
        else if (is_string( $objectOrVar )) {
            return ($objectOrVar !== null && strlen( $objectOrVar ) > 0);
        }
        else {
            return $objectOrVar !== null;
        }
    }

    public function validateOptions( $conditionKey )
    {

        return (isset($this->options[$conditionKey]) &&
				$this->options[$conditionKey] === true) || 
                !isset($this->options[$conditionKey]);
    }

    public function writeArrayObject( &$object, $writeAsClass )
    {
        $result = "";
        if ($object !== null) {

            $temp = new $writeAsClass();


			$keys = array_keys((array)$object);

            if (is_array( $keys ) && count( $keys ) > 0) {
                foreach ($object as $key => $item) {

                    $itemKeys = get_object_vars( $item );

                    foreach ($itemKeys as $key => $attr) {
                        if (property_exists( $temp, $key ))
                            $temp->$key = $item->$key;
                    }
                    $result .= $temp->write();

                }
            }
            else {
                $result .= $object->write();
            }


		}

        return $result;
    }

    public function getCreateTableSQL()
    {
        $outputSQL = "";

        $outputSQL .= "CREATE TABLE " . get_class_name( get_class( $this ) ) . "(" . endl();
        $outputSQL .= "id int(20)" . endl();


        $outputSQL .= ");" . endl();

        return $outputSQL;
    }


}
