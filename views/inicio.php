<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-inicio.css" rel="stylesheet" type="text/css" />
		<title>Inicio</title>
	</head>
	<body>
		<header>
			<div class= "tres">
				<a href="index.php" class="inicio">Inicio</a>
				<a href="controllers/controller-registro.php" class="registrarse">Registrarse</a>
				<a href="controllers/controller-iniciar-sesion.php" class="iniciarsesion">Iniciar sesión</a>
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
						<img src="imagen/pexels-cottonbro-studio-3945683.jpg" alt="Imagen Gaming" width="50%" height="80%">
					</div>
				</article>
			</section>
		</main>
		<footer>
			<div class="cinco">
				© <?php echo $anio ?> Aula Gaming - IES Leonardo Da Vinci
			</div>
			<div>
				<a href="controllers/controller-normas.php" class="normas">Normas</a>
			</div>
			<div>
				<a href="controllers/controller-contacta.php" class="contacta">Contacta</a>
			</div>
		</footer>
		<aside>
		</aside>		
	</body>
</html>	