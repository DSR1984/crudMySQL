<html lang="en">
<head>
	<title>MySQL forms - insert and update view</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h2>
		<font face='Verdana' color=#894982>MySQL Forms</font>
	</h2>
	<hr/>
	<p>
	<div id="wrapper">
		<form method="POST" enctype="multipart/form-data">
			<fieldset>
			ID: <input type="hidden" name="id" value="<?= (isset($user['id_user']))?$user['id_user']:'';?>"/>
				<legend>Informaci&oacute;n personal</legend>
				<table align="center" width=960>
					<tr height=30>
						<td align="right">Introduzca su nombre:</td>
						<td align="left">
							<input type="text" name="name" width="100" 
							value="<?= (isset($user['name'])&&$user['name']!='')?$user['name']:'';?>">
						</td>
					</tr>
					<tr height=30>
						<td align="right">Introduzca su direcci&oacute;n email:</td>
						<td align="left">
							<input type="text" name="email" width="100" 
							value="<?= (isset($user['email'])&&$user['email']!='')?$user['email']:'';?>">
						</td>
					</tr>
					<tr height=30>
						<td align="right">Introduzca una contrase&ntilde;a:</td>
						<td align="left">
							<input type="password" name="password" width="100" 
							value="<?= (isset($user['password'])&&$user['password']!='')?$user['password']:'';?>" />
						</td>
					</tr>
					<tr height=30>
						<td align="right">Introduzca su direcci&oacute;n residencial:</td>
						<td align="left">
							<input type="text" name="address" width="100" 
							value="<?= (isset($user['address'])&&$user['address']!='')?$user['address']:'';?>">
						</td>
					</tr>
					<tr height=120>
							<td align="right">Descr&iacute;base:</td>
						<td align="left">
							<textarea name="description" cols="50" rows="5">
								<?= (isset($user['description']) && $user['description']!='')?$user['description']:'';?>
							</textarea>
						</td>
					</tr>
					<tr height=30>
						<td align="right">Especifique su sexo:</td>
						<td align="left">
							<?=createRadioCheckFromDb($config, 'gender', 'gender', 'idgender', 'gender', array($user['gender_idgender']), FALSE);?>
						</td>
					</tr>
					<tr height=30>
						<td align="right">Especifique su lugar de residencia:</td>
						<td align="left">
							<?=createSelectFromDb($config, 'cities', 'city','idcity', 'city', array($user['city_idcity']), FALSE);?>
						</td>
					</tr>
					<tr height=30>
						<td align="right">Cargue una foto, por favor:</td>
						<td align="left">
							<input type="file" name="photo"><br/>
							<!-- En caso de existir, mostramos la imagen -->
							<img src="<?="/uploads/".$user['photo'];?>" width=100px />
						</td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<legend>Otros datos de inter&eacute;s</legend>
				<table align="center" width=600>
					<tr>
						<td align="right">Especifique sus mascotas preferidas:</td>
						<td align="left">
							<?=createRadioCheckFromDb($config, 'pets', 'pets', 'idpet', 'pet', $user['pets'], TRUE);?>
						</td>
					</tr>
					<tr height=30>
						<td align="right">Y por &uacute;ltimo, especifique su deporte preferido:</td>
						<td align="left">
							<?=createSelectFromDb($config, 'sports', 'sports', 'idsports', 'sports', $user['sports'], TRUE);?>
						</td>
					</tr>																			
				</table>
			</fieldset>
			<p align="center">
				<input type="submit" name="submit" value="Enviar">
				<input type="button" name="button" value="Bot&oacute;n">
				<input type="reset" name="reset" value="Reiniciar">
			</p>
		</form>
	</div>
	<div class="bottom">
	</div>
</body>
</html>
