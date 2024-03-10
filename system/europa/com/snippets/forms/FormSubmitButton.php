<?php

namespace system\europa\com\snippets\forms;
use system\jupiter\core\GeneratorClass;

/* ####################### FormSubmitButton : USAGE EXAMPLE ####################### 

	$varFormSubmitButton = new FormSubmitButton();

	$varFormSubmitButton->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class FormSubmitButton extends GeneratorClass {

public function __construct()

{

		parent :: __construct();

}

	public function write() {

	$this->validateData();

print "<div class=\"row mb-3\">\n";
print "                  <label class=\"col-sm-2 col-form-label\">Submit Button</label>\n";
print "                  <div class=\"col-sm-10\">\n";
print "                    <button type=\"submit\" class=\"btn btn-primary\">Submit Form</button>\n";
print "                  </div>\n";
print "                </div>\n";
}

 } 


?>

