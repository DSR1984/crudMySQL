<?php
/**
 * Users Controller
 * 
 * @version 1.0 
 * 
 */

// Controll de session



//$_SESSION['var']="value";




// Include model
include_once('../application/models/users/usersFunctions.php');

switch ($route['action'])
{
	case 'insert':
		if($_POST)
		{						
			$id=insertUser($config, $_POST);
			header('Location: /users/select');
			exit;
		}
		else
		{	
			$user=initUser();
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$content=renderView($config, 'forms/user.php', $viewVars);
		}
	break;

	case 'update':
		if($_POST)
		{
			updateUser($_REQUEST['id'], $config, $_POST);			
			header('Location: /users/select');
			exit;
		}
		else 
		{
			$user=readUser($_REQUEST['id'], $config);
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$content=renderView($config, 'forms/user.php', $viewVars);
		}
	break;

	case 'delete':
		if($_POST)
		{
			if($_POST['submit']=='Si')
				deleteUser($_REQUEST['id'],$config);
			header('Location: /users/select');
			exit;
		}
		else 
		{
			$user=readUser($_REQUEST['id'], $config);
			$viewVars=array('user'=>$user,
					'title'=>'Delete Usuarios');
			$content=renderView($config, 'users/delete.php', $viewVars);
		}
	break;

	case 'index':
	case 'select':
		$users=readUsers($config);
		$viewVars=array('users'=>$users,
						'title'=>'Usuarios de la aplicación');
		$content=renderView($config, 'users/select.php', $viewVars);		
	break;	

	default:
		echo "Esto default";
	break;	
}

$layoutVars=array('content'=>$content,
				  'title'=>'Mi application');
$layout=renderLayout($config, "layout.php", $layoutVars);

echo $layout;