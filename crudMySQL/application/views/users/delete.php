
<!DOCTYPE html>
<html lang="en">
<head>
<title>Confirmar Borrar</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="robots" content="noarchive,noindex">
<meta name="description" content="Formulario">
<meta name="keywords" content="Formulario">
</head>
<body>

<div id="wrapper">
<hr/><h1>¿CONFIRMA QUE DESEA BORRAR A <?=$user['name'];?></h1>
<form method="POST">
	<ul>
		<li>Id: <input type="hidden" name="id" value="<?= (isset($_GET['id']))?$_GET['id']:'1';?>"/></li>
		<li>Submit: <input type="submit" name="submit" value="Si"/></li>
		<li>Submit: <input type="submit" name="submit" value="No"/></li>
		
	</ul>
</form>



</div>

<div class="bottom">
</div>
</body>
</html>