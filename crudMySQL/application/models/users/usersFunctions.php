<?php

/**
 * Update users photo
 * @param string $lastImage
 * @param string $uploadDir
 * @return string $name
 */
function updatePhoto($lastImage, $uploadDir)
{
	// Sobreescibir imagen si hay nueva
	if(isset($_FILES["photo"]["tmp_name"]) && 
			 $_FILES["photo"]["tmp_name"]!='')
	{
		$tmp_name = $_FILES["photo"]["tmp_name"];
		$name = $_FILES["photo"]["name"];
		$ruta = $_SERVER['DOCUMENT_ROOT'].$uploadDir;
		$url = $uploadDir;
		$name=SubirArchivo($_FILES);

		// Borrar imagen anterior
		unlink($ruta."/".$lastImage);
	}
	else
	{
		// Usar imagen anterior
		$name=$lastImage;
	}

	return $name;
}

/**
 * Insert photo into directory
 * @param string $uploadDir
 * @return string
 */
function insertPhoto($uploadDir)
{
	$tmp_name = $_FILES["photo"]["tmp_name"];
	$name = $_FILES["photo"]["name"];
	$ruta = $_SERVER['DOCUMENT_ROOT'].$uploadDir;
	$url = $uploadDir;
	$name=SubirArchivo($_FILES);

	return $name;
}

/**
 * Delete photo from directory
 * @param string $uploadDir
 * @param string $filename
 */
function deletePhoto($uploadDir, $filename)
{
	$ruta = $_SERVER['DOCUMENT_ROOT'].$uploadDir;
	unlink($ruta."/".$filename);
	return;
}
?>