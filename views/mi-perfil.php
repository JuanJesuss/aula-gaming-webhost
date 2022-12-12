<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-mi-perfil.css" rel="stylesheet" type="text/css" />
		<title>Mi perfil</title>
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
						<h1>Mi perfil</h1>
						<img src="imagenes/seis.jpg" alt="Imagen Gaming" width="200px">
                        <ul>
							<li><span class="once">Nombre:</span> <span class="doce"><?php echo $_SESSION['nombre'];?></span></li>
							<li><span class="once">Apellidos:</span> <span class="doce"><?php echo $_SESSION['apellidos'];?></span></li>
							<li><span class="once">Alias:</span> <span class="doce"><?php echo $_SESSION['alias'];?></span></li>
							<li><span class="once">Turno:</span> <span class="doce"><?php echo $_SESSION['turno'];?></span></li>
							<li><span class="once">Correo:</span> <span class="doce"><?php echo $_SESSION['email'];?></span></li>
						</ul>
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