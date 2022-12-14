<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-registro.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/registro.js"></script>
		<title>Registrarse</title>
	</head>
	<body>
		<header>
			<div class= "tres">
				<a href="../index.php" class="inicio">Inicio</a>
				<a href="controller-registro.php" class="registrarse">Registrarse</a>
				<a href="controller-iniciar-sesion.php" class="iniciarsesion">Iniciar sesión</a>
			</div>
			<div class= "cuatro">
				<p>
					<span class="uno">IES Leonardo Da Vinci</span><br/>
					<span class="dos">Aula Gaming</span>
				</p>
			</div>
		</header>
		<nav>
		</nav>
		<main>
			<section>
				<article>
					<div>
						<h1>Registro</h1>
						<img src="imagenes/veinticinco.jpg" alt="Imagen Gaming" width="300px" >
						<form method="post" name="formulario">
							<label for="email"><span class="diez">Correo:</span> </label>
							<input type="text" name="email" id="email" /><span class="ocho">*</span><span class="siete">Introduce un correo de gmail o outlook.</span><select id="emails" hidden></select><br/>
							<input type="text" id="erremail" size="80" class="err" disabled /><br/>
							<div class="catorce">
								<label for="password"><span class="diez">Contraseña:</span> </label>
								<input type="password" name="password" id="password" /><span class="ocho">*</span><br/>
								<input type="checkbox" name="mostrar" /><label for="mostrar-contrasena"><span class="quince">Mostrar contraseña</span></label><input type="text" id="errpassword" size="105" class="err" disabled />
							</div>
							<p class="siete">Requisitos contraseña:<br/>- Debe estar compuesta solo por letras (sin tíldes), números y caracteres especiales ($%?!).<br/>- Debe incluir al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial ($%?!).<br/>- Debe tener una longitud mínima de 8 y máxima de 12.</p><br/>
							<label for="alias"><span class="diez">Alias:</span> </label>
							<input type="text" name="alias" id="alias" /><span class="ocho">*</span><span class="siete">Debe tener entre 4 y 20 caracteres, los cuales pueden ser letras<br/><span class="dieciseis">(en minúsculas y sin tíldes), números y .-_</span></span><select id="todosalias" hidden></select><br/>
							<input type="text" id="erralias" size="70" class="err" disabled /><br/>
							<label for="turno"><span class="diez">Turno:</span> </label>
							<select name="turno" id="turno" class="once">
								<option selected disabled value="">--Seleccione turno--</option>
								<option>Diurno</option>
								<option>Vespertino</option>
							</select><span class="ocho">*</span><br/>
							<input type="text" id="errturno" class="err" disabled /><br/>
							<label for="nombre"><span class="diez">Nombre:</span> </label>
							<input type="text" name="nombre" id="nombre" /><span class="ocho">*</span><br/>
							<input type="text" id="errnombre" size="80" class="err" disabled /><br/>
							<label for="apellido"><span class="diez">Apellidos:</span> </label>
							<input type="text" name="apellidos" id="apellidos" /><span class="ocho">*</span><br/>
							<input type="text" id="errapellidos" size="80" class="err" disabled /><br/>
							<span class="doce">*</span><span class="siete">Obligatorio.</span>
							<br/><br/>
							<input type="submit" name="registrarse" value="Registrarse" class="once">
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
