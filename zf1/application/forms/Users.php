<?php
class Application_Form_Users extends Zend_Form
{
	public function init()
	{
		$this->setName('users');
		$id = new Zend_Form_Element_Hidden('id_user');
		$id->addFilter('Int');
		$userName = new Zend_Form_Element_Text('name');
		$userName->setLabel('name')
		->setRequired(true)
		->addValidator('NotEmpty');
		$userEmail = new Zend_Form_Element_Text('email');
		$userEmail->setLabel('email')
		->setRequired(true)
		->addValidator('NotEmpty');
		$userPassword = new Zend_Form_Element_Text('password');
		$userPassword->setLabel('password')
		->setRequired(true)
		->addValidator('NotEmpty');
		$userAddress = new Zend_Form_Element_Text('address');
		$userAddress->setLabel('address')
		->setRequired(true)
		->addValidator('NotEmpty');
		$userDescription = new Zend_Form_Element_Text('description');
		$userDescription->setLabel('E-description')
		->setRequired(true)
		->addValidator('NotEmpty');
		$userPhoto = new Zend_Form_Element_File('photo');
		$userPhoto->setLabel('photo')
        ->setDestination(APPLICATION_PATH,'/../public/uploads')
		->addValidator('Size', false, 1048576)
		->setMaxFileSize(1048576);
		
		$userGender = new Zend_Form_Element_Radio('gender_idgender');
		$userGender->setLabel('gender')
		    ->setMultiOptions(array( 1=>'H', 2=>'M', 3=>'O'))
		    ->setRequired(true)
		    ->addValidator('NotEmpty');		    

		$userCity = new Zend_Form_Element_Select('city_idcity');
		$userCity->setLabel('city')
		->setMultiOptions(array( 1=>'Vigo', 2=>'Barcelona', 3=>'Bilbao' , 4=>'Madrid'))
		->setRequired(true)
		->addValidator('NotEmpty');
		
		$userPets = new Zend_Form_Element_Checkbox('pets');
		$userPets->setLabel('pets')
		->setOptions(array( 1=>'Iguana', 2=>'Tigre', 3=>'Tar&aacute;ntula'))
		->setRequired(true)
		->addValidator('NotEmpty');
		
		$userSports = new Zend_Form_Element_Multiselect('sports');
		$userSports->setLabel('sports')
		->setMultiOptions(array( 1=>'Futbol', 2=>'Baseball', 3=>'Nataci&oacute;n'))
		->setRequired(true)
		->addValidator('NotEmpty');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		$this->addElements(array($id, $userName, $userEmail, $userPassword, $userAddress, $userCity, $userDescription, $userEmail, $userGender, $userDescription, $userSports));
	}
}