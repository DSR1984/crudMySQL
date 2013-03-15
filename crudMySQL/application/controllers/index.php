
<?php
/**
 * Index Controller
*
* @version 1.0
*
*/


switch ($route['action'])
{
	case 'index':
		$content=renderView($config, 'index/index.php', $viewVars);
		break;
}

$layoutVars=array('content'=>$content,
		'title'=>'Mi application');
$layout=renderLayout($config, "home.php",$layoutVars);

echo $layout;