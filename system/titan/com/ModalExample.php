<?php

namespace system\titan\com;
use system\jupiter\core\GeneratorClass;
use system\titan\\;

/* ####################### ModalExample : USAGE EXAMPLE ####################### 

	$varModalExample = new ModalExample();

	$varModalExample->setId("ModalExample_id_EXAMPLE");

	$varModalExample->setModalTitle("ModalExample_modalTitle_EXAMPLE");

	$varModalExample->setCloseButtonLabel("ModalExample_closeButtonLabel_EXAMPLE");

	$varModalExample->setModalMessage("ModalExample_modalMessage_EXAMPLE");

	$varModalExample->setButtonSaveText("ModalExample_buttonSaveText_EXAMPLE");

	$varModalExample->setCloseButtonText("ModalExample_closeButtonText_EXAMPLE");

	$varModalExample->write();

    ####################### USAGE EXAMPLE ####################### **/ 

class ModalExample extends GeneratorClass {

	protected $id;

	protected $modalTitle;

	protected $closeButtonLabel;

	protected $modalMessage;

	protected $buttonSaveText;

	protected $closeButtonText;

public function __construct()

{

		parent :: __construct();

	$this->id =  null;

	$this->modalTitle =  null;

	$this->closeButtonLabel =  null;

	$this->modalMessage =  null;

	$this->buttonSaveText =  null;

	$this->closeButtonText =  null;

}

	public function setId(  $id)
{

		 $this->id = $id;
return $this; 
}

	public function setModalTitle(  $modalTitle)
{

		 $this->modalTitle = $modalTitle;
return $this; 
}

	public function setCloseButtonLabel(  $closeButtonLabel)
{

		 $this->closeButtonLabel = $closeButtonLabel;
return $this; 
}

	public function setModalMessage(  $modalMessage)
{

		 $this->modalMessage = $modalMessage;
return $this; 
}

	public function setButtonSaveText(  $buttonSaveText)
{

		 $this->buttonSaveText = $buttonSaveText;
return $this; 
}

	public function setCloseButtonText(  $closeButtonText)
{

		 $this->closeButtonText = $closeButtonText;
return $this; 
}

	public function getId()
{

		return $this->id;
}

	public function getModalTitle()
{

		return $this->modalTitle;
}

	public function getCloseButtonLabel()
{

		return $this->closeButtonLabel;
}

	public function getModalMessage()
{

		return $this->modalMessage;
}

	public function getButtonSaveText()
{

		return $this->buttonSaveText;
}

	public function getCloseButtonText()
{

		return $this->closeButtonText;
}

	public function write() {

	$this->validateData();

print "<div class=\"modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5\" tabindex=\"-1\" role=\"dialog\" id=\"{$this->id}}\">\n";
print "  <div class=\"modal-dialog\" role=\"document\">\n";
print "    <div class=\"modal-content rounded-4 shadow\">\n";
print "      <div class=\"modal-header border-bottom-0\">\n";
print "        <h1 class=\"modal-title fs-5\">{$this->modalTitle}}</h1>\n";
print "        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"{$this->closeButtonLabel}}}\"></button>\n";
print "      </div>\n";
print "      <div class=\"modal-body py-0\">\n";
print "        <p>{$this->modalMessage}}</p>\n";
print "      </div>\n";
print "      <div class=\"modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0\">\n";
print "        <button type=\"button\" class=\"btn btn-lg btn-primary\">{$this->buttonSaveText}}}</button>\n";
print "        <button type=\"button\" class=\"btn btn-lg btn-secondary\" data-bs-dismiss=\"modal\">{$this->closeButtonText}}}</button>\n";
print "      </div>\n";
print "    </div>\n";
print "  </div>\n";
print "</div>\n";
}

 } 


?>

