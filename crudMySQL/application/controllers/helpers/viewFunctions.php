<?php

/**
 * Render view with viewVars
 * 
 * @param string $config
 * @param string $view
 * @param array $viewVars
 * @return string $content
 */
function renderView($config, $view, array $viewVars=NULL)
{
	ob_start();
		include_once ($config['path.views']."/".$view);

	$content=ob_get_clean();
	ob_end_clean();

	return $content;
}

/**
 * Render layouts with layoutsVars
 * @param array $config
 * @param string $layout
 * @param array $layoutVars
 * @return string $layoutOut
 */
function renderLayout($config, $layout=NULL, array $layoutVars=NULL)
{
	if($layout===NULL)
		$layout=$config['default.layout'];

	ob_start();
		include_once ($config['path.layouts']."/".$layout);		
	$layoutOut=ob_get_contents();
	ob_end_clean();

	return $layoutOut;	
}


