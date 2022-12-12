<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-olvide-contrasena.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/olvide-contrasena.js"></script>
		<title>Olvidé contraseña</title>
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
						<h1>Olvidé mi contraseña</h1>
						<img src="imagenes/treintaiuno.jpg" alt="Imagen Gaming" width="300px" >
						<form method="post" name="formulario">
							<label for="email">Correo: </label>
							<input type="text" name="email" /> <span class="ocho">Introduce tu correo.</span><select id="emails" hidden></select><br/>
							<input type="text" name="erremail" size="80" class="errmail" disabled />
							<p>Si el correo está registrado, se te enviará un correo para reestablecer tu contraseña.</p>
							<input type="submit" name="enviar" value="Enviar" class="seis">
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