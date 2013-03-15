<?php

class UsersController extends Zend_Controller_Action
{
    public function init()
    {
    
    }
    
    public function indexAction()
    {
    	$users = new Application_Model_DbTable_Users();
    	$this->view->users = $users->fetchAll();
    
    }
    
    public function addAction()
    {
        $form = new Application_Form_Users();
        $form->submit->setLabel('add');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$userName = $form->getValue('name');
        		$userMail = $form->getValue('email');
        		$userPassword = $form->getValue('password');
        		$userAddress = $form->getValue('address');
        		$userDescription = $form->getValue('description');
        		$userGender = $form->getValue('gender_idgender');
        		$userCity = $form->getValue('city_idcity');
        		$userPhoto = $form->getValue('photo');
        		$userPets = $form->getValue('pets');
        		$userSports = $form->getValue('sports');
        		$albums = new Application_Model_DbTable_Users();
        		$albums->addUser($userName, $userMail, $userPassword, $userAddress, $userDescription,
        		         $userGender, $userCity, $userPhoto, $userPets, $userSports);
        		$this->_helper->redirector('index');
        	}
        	else {
        		$form->populate($formData);
        	}
        }        
    }
    
    public function editAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
}