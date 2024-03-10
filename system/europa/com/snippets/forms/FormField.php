<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### FormField : USAGE EXAMPLE ####################### 

	$varFormField = new FormField();

	$varFormField->setName("FormField_name_EXAMPLE");

	$varFormField->setLabelDescription("FormField_labelDescription_EXAMPLE");

	$varFormField->setFieldType("FormField_fieldType_EXAMPLE");

	$varFormField->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class FormField extends GeneratorClass {

	protected $name;

	protected $labelDescription;

	protected $fieldType;

public function __construct()

{

		parent :: __construct();

	$this->name =  null;

	$this->labelDescription =  null;

	$this->fieldType =  null;

}

	public function setName(  $name)
{

		 $this->name = $name;
return $this; 
}

	public function setLabelDescription(  $labelDescription)
{

		 $this->labelDescription = $labelDescription;
return $this; 
}

	public function setFieldType(  $fieldType)
{

		 $this->fieldType = $fieldType;
return $this; 
}

	public function getName()
{

		return $this->name;
}

	public function getLabelDescription()
{

		return $this->labelDescription;
}

	public function getFieldType()
{

		return $this->fieldType;
}

	public function write() {

	$this->validateData();

print "<div class=\"row mb-3\">\n";
print "                  <label for=\"{$this->name}\" class=\"col-sm-2 col-form-label\">{$this->labelDescription}</label>\n";
print "                  <div class=\"col-sm-10\">\n";
print "                    <input name=\"{$this->name}\" type=\"{$this->fieldType}\" class=\"form-control\">\n";
print "                  </div>\n";
}

 } 


?>

