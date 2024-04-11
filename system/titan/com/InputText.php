<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\\;

/* ####################### InputText : USAGE EXAMPLE ####################### 

	$varInputText = new InputText();

	$varInputText->setName("InputText_name_EXAMPLE");

	$varInputText->setDefaultValue("InputText_defaultValue_EXAMPLE");

	$varInputText->setId("InputText_id_EXAMPLE");

	$varInputText->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class InputText extends GeneratorClass {

	protected $name;

	protected $defaultValue;

	protected $id;

public function __construct()

{

		parent :: __construct();

	$this->name =  null;

	$this->defaultValue =  null;

	$this->id =  null;

}

	public function setName(  $name)
{

		 $this->name = $name;
return $this; 
}

	public function setDefaultValue(  $defaultValue)
{

		 $this->defaultValue = $defaultValue;
return $this; 
}

	public function setId(  $id)
{

		 $this->id = $id;
return $this; 
}

	public function getName()
{

		return $this->name;
}

	public function getDefaultValue()
{

		return $this->defaultValue;
}

	public function getId()
{

		return $this->id;
}

	public function write() {

	$this->validateData();

print "<input type=\"text\" name=\"{$this->name}}\" value=\"{$this->defaultValue}}\" id=\"{$this->id}}\"/>\n";
}

 } 


?>

