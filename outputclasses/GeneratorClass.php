<?php


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
            "condition:notlast" => (end($keys) === $currentKey),
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

    public function writeArrayObject( &$object )
    {
        if ($object !== null) {
			$keys = array_keys(get_object_vars($object));
			foreach ($object as $key => $item) {
				$item->options = $this->getOptionsArray($keys, $key, $item);
				$item->write();
			}
		}
    }

    public function arrayHasElements( &$arrayObjects=array() )
    {
        foreach ($arrayObjects as $k => $v) {
            if (!($v !== null && $v->count() > 0))
                return false;
        }
        return true;
    }

}

?>