<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-iniciar-sesion.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/md5.js"></script>
		<script type="text/javascript" src="js/iniciar-sesion.js"></script>
		<title>Iniciar sesión</title>
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
						<h1>Iniciar sesión</h1>
						<img src="imagenes/veinticuatro.jpg" alt="Imagen Gaming" width="300px" >
						<form method="post" name="formulario">
							<label for="email"><span class="nueve">Correo:</span> </label>
							<input type="text" name="email" /><select id="emails" hidden></select><br/>
							<input type="text" name="erremail" size="80" class="err" disabled /><br/>
							<label for="password"><span class="nueve">Contraseña:</span> </label>
							<input type="password" name="password" /><select id="passwords" hidden></select><br/>
							<input type="checkbox" name="mostrar" /><label for="mostrar-contrasena"><span class="once">Mostrar contraseña</span></label><input type="text" name="errpassword" size="25" class="err" disabled /><br/><br/>
							<a href="controller-olvide-contrasena.php"><span class="diez">¿Olvidé mi contraseña?</span></a><br/><br/>
							<input type="submit" name="iniciar-sesion" value="Iniciar sesión" class="ocho">
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