<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-crear-nueva-contrasena.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/crear-nueva-contrasena.js"></script>
		<title>Crear nueva contraseña</title>
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
						<h1>Crear nueva contraseña</h1>
						<img src="imagenes/treintaidos.jpg" alt="Imagen Gaming" width="200px" >
						<form method="post" name="formulario">
							<div id="caja">
								<label for="email">Correo: </label>
								<input type="text" name="email" /> <span class="siete">Introduce tu correo.</span><select id="emails" hidden></select><br/>
								<input type="text" name="erremail" size="80" class="err" disabled /><br/>
								<label for="email">Código: </label>
								<input type="text" name="codigo" /> <span class="siete">Introduce el código qué recibiste.</span><select id="codigos" hidden></select><br/>
								<input type="text" name="errcodigo" class="err" disabled /><br/>
								<input type="button" id="validar" name="validar" value="Validar" class="seis" />
							</div>
							<div id="caja2" hidden>
								<div class="ocho" id="ocho">Correo y código correctos.</div>
								<div class="once">
									<label for="email">Introduce una nueva contraseña:</label> <input type="password" name="contra" id="contra" /><br/>
									<input type="checkbox" name="mostrar" /><label for="mostrar-contrasena"><span class="doce">Mostrar contraseña</span></label><input type="text" name="errcontra" size="105" class="err" disabled /><br/>
								</div>
								<p class="nueve">Requisitos contraseña:<br/>- Debe estar compuesta solo por letras (sin tíldes), números y caracteres especiales ($%?!).<br/>- Debe incluir al menos 1 mayúscula, 1 minúscula, 1 número y 1 caracter especial ($%?!).<br/>- Debe tener una longitud mínima de 8 y máxima de 12.</p>
								<input type= "submit" name="enviar" value="Enviar" class="seis" />
							</div>
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
