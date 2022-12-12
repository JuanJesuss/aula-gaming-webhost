<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-cambiar-password.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/md5.js"></script>
		<script type="text/javascript" src="js/cambiar-contrasena.js"></script>
		<title>Cambiar contraseña</title>
	</head>
	<body>
		<header>
			<div class= "tres">
				<div>
					<ul class="horizontal">
							<li>
								<a href="controller-bienvenido.php" class="usuario"><?php echo strtoupper($_SESSION['nombre'][0]);?></a>
								<ul class="vertical">
									<li><a href="controller-mi-perfil.php">Mi perfil</a></li>
									<li><a href="controller-cambiar-password.php">Cambiar contraseña</a></li>
									<li><a href="controller-cerrarsesion.php">Cerrar sesión</a></li>
								</ul>
							</li>
					</ul>
				</div>
				<div>
					Hola <?php echo ucwords($_SESSION['nombre']);?>!
				</div>
				<div>
					<a href="controller-bienvenido.php"><img src="imagenes/uno.jpg" alt="Imagen Gaming" width="50%"></a>
				</div>
				<div>
					<a href="controller-modo-registrador.php" class="modoregistrador"><span class="veinte">Modo Registrador</span></a>
				</div>
			</div>
			<div class= "cuatro">
				<p>
					<span class="uno">IES Leonardo Da Vinci</span><br/>
					<span class="dos">Aula Gaming</span>
				</p>
			</div>
		</header>
		<nav>
			<ul class="nueve">
				<li class="reservar"><a href="controller-reservar.php">Reservar</a></li>
				<li class="misreservas"><a href="controller-mis-reservas.php">Mis reservas</a></li>
				<li class="reservas"><a href="controller-reservas.php">Otras reservas</a></li>
				<li class="anular"><a href="controller-anular-reserva.php">Anular mi reserva</a></li>
				<li class="mispartidas"><a href="controller-mis-partidas.php">Mis partidas</a></li>
				<li><a href="controller-partidas.php">Otras partidas</a></li>
			</ul>
		</nav>
		<main>
			<section>
				<article>
					<div>
						<h1>Cambiar contraseña</h1>
						<img src="imagenes/siete.jpg" alt="Imagen Gaming" width="200px" >
						<form method="post" name="formulario">
							<label for="email"><span class="seis">Correo:</span> </label>
							<input type="text" name="email" /><span class="siete">*</span> <span class="ocho">Ingresa tu correo.</span><select name="correoactual" id="correoactual" hidden><option><?php echo $_SESSION['email'];?></option></select><br/>
                        	</label><input type="text" name="erremail" class="err" disabled /><br/>
							<label for="contra"><span class="seis">Contraseña actual:</span> </label>
							<input type="password" name="contrasena" /><span class="siete">*</span> <span class="ocho">Ingresa tu actual contraseña.</span><select name="contrasenaactual" id="contrasenaactual" hidden></select><br/>
							<input type="checkbox" name="mostrar" /><label for="mostrar-contrasena-actual"><span class="quince">Mostrar contraseña</span><input type="text" name="errcontrasena" size="27" class="err" disabled /><br/><br/>
							<label for="nueva-contra"><span class="seis">Nueva contraseña:</span></label>
							<input type="password" name="nuevacontrasena" /><span class="siete">*</span><span class="ocho">Ingresa tu nueva contraseña.</span><br/>
							<input type="checkbox" name="mostrar2" /><label for="mostrar-nueva-contrasena"><span class="quince">Mostrar contraseña</span><input type="text" name="errnuevacontrasena" size="90" class="err" disabled />
							<p class="trece">Requisitos nueva contraseña:<br/>- Debe estar compuesta solo por letras (sin tíldes), números y caracteres especiales ($%?!).<br/>- Debe incluir al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial ($%?!).<br/>- Debe tener una longitud mínima de 8 y máxima de 12.</p>
							<span class="siete">*</span> <span class="ocho">Obligatorio.</span><br/><br/>
							<input type="submit" name="cambiar" value="Cambiar" class="once">
        				</form>
					</div>
				</article>
			</section>
		</main>
		<footer>
			<div class="cinco">
				© <?php echo $anio ?> Aula Gaming - IES Leonardo Da Vinci
			</div>
			<div>
				<a href="controller-normas.php" class="normas">Normas</a>
			</div>
			<div>
				<a href="controller-contacta.php" class="contacta">Contacta</a>
			</div>
		</footer>
		<aside>
		</aside>		
	</body>
</html>