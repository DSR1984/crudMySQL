<html lang="en">
<head>
	<title>MySQL forms - select view</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<a href="users.php?action=insert">A&ntilde;adir</a>
	<table border=1>
		<tr> <!--  AQUI IRÁN LOS CAMPOS  -->
			<td>Id</td>
			<td>Nombre</td>
			<td>Email</td>
			<td>Contrase&ntilde;a</td>
			<td>Direcci&oacute;n</td>
			<td>Descripci&oacute;n</td>
			<td>Mascotas</td>
			<td>Foto</td>
			<td>Sexo</td>
			<td>Ciudad</td>
			<td>Deportes</td>
			<td>Opciones</td>
		</tr>
	<?php foreach($users as $key => $line): ?>
		<tr>
		<?php foreach($line as $key1 => $value):?>
			<td>
				<?=(is_array($value))?implode(',',$value):$value;?>
			</td>
			<?php endforeach;?>
			<td>
				<a href="users.php?action=update&id=<?=$line['id_user'];?>">Actualizar</a>
				&nbsp;
				<a href="users.php?action=delete&id=<?=$line['id_user'];?>">Borrar</a>
			</td>		
		</tr>
	<?php endforeach; ?>
	</table>
</body>
</html>