<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;
use \system\europa\com\snippets\forms\FormField;
use \system\europa\com\snippets\forms\FormSubmitButton;

/* ####################### SingleForm : USAGE EXAMPLE ####################### 

	$varSingleForm = new SingleForm();

	$varfields = new FormField();
	$varSingleForm->addFieldsItem( $varFieldsItem );

	$varsubmitButton = new FormSubmitButton();
	$varSingleForm->addSubmitButtonItem( $varSubmitButtonItem );

	$varSingleForm->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class SingleForm extends GeneratorClass {

	protected FormField $fields;

	protected FormSubmitButton $submitButton;

public function __construct()

{

		parent :: __construct();

	$this->fields =  new FormField();

	$this->submitButton =  new FormSubmitButton();

}

	public function setFields( FormField $fields)
{

		 $this->fields = $fields;
return $this; 
}

	public function setSubmitButton( FormSubmitButton $submitButton)
{

		 $this->submitButton = $submitButton;
return $this; 
}

	public function getFields()
{

		return $this->fields;
}

	public function getSubmitButton()
{

		return $this->submitButton;
}

	public function addFieldsItem( FormField $item )
{

		$this->fields->append( clone $item);
return $this; 
}

	public function addSubmitButtonItem( FormSubmitButton $item )
{

		$this->submitButton->append( clone $item);
return $this; 
}

	public function write() {

	$this->validateData();

print "<form>\n";
print "                \n";		
$this->writeArrayObject( $this->fields );

print "\n";
print "                \n";		
$this->writeArrayObject( $this->submitButton );

print "\n";
print "                </form>\n";
}

 } 


?>

