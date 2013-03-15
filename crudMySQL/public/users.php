<?php
/**
 * Users Controller
 * 
 * @version 1.0 
 * 
 */

if(isset($_GET['action']))
	$action=$_GET['action'];
else 
	$action = 'select';
// Read config
$config=parse_ini_file('../application/config/config.ini',true);
$config=$config['production'];

// Include Gateways
include_once('../application/models/dataGatewayMySQL.php');

// Include viewHelpers
include_once('../application/views/helpers/helpersFunctions.php');

// Include controllers

include_once('../application/controllers/helpers/actionHelpersFunctions.php');

// Include Models
include_once('../application/models/files/functions.php');
include_once('../application/models/files/filesFunctions.php');
include_once('../application/models/users/usersFunctions.php');

switch ($action)
{
	case 'insert':
		if($_POST)
		{			
			$id=insertUser($config, $_POST);
			header('Location: /users.php');
			exit;
		}
		else
		{
			$user=initUser();
			include_once('../application/views/forms/user.php');
		}
	break;

	case 'update':
		if($_POST)
		{
			updateUser($_GET['id'], $config, $_POST);			
			header('Location: /users.php');
			exit;
		}
		else 
		{
			$user=readUser($_GET['id'], $config, $_POST);
			include_once('../application/views/forms/user.php');
		}
	break;

	case 'delete':
		if($_POST)
		{
			if($_POST['submit']=='Si')
				deleteUser($_GET['id'],$config);
			header('Location: /users.php');
			exit;
		}
		else 
		{
			$user=readUser($_GET['id'], $config);
			include_once('../application/views/users/delete.php');
		}
	break;

	case 'select':
		$users=readUsers($config);
		include_once ('../application/views/users/select.php');
	break;	

	default:
		echo "Esto default";
	break;	
}
?>