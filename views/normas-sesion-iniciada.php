<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-normas-sesion-iniciada.css" rel="stylesheet" type="text/css" />
		<title>Normas</title>
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
						<h1>Normas</h1>
						<p>- El uso del aula se hará durante el recreo.</p>
						<p>- La asignación de puesto se hará en orden ascendente (del 1 al 9).</p>
						<p>- La primera persona en reservar ocupará el puesto 1 y será el RESPONSABLE del aula.</p>
						<p>- El responsable del aula será el encargado de abrir y cerrar el aula, así como comprobar que todos los equipos estén apagados antes de cerrarla.</p>
						<p>- El responsable del aula deberá comprobar la reserva de cada usuario y el puesto que le corresponde.</p>
						<p>- En caso de que el responsable del aula no esté presente, el responsable del aula será la persona que ocupe el puesto siguiente.</p>
						<p>- Para solicitar permiso para registrar partidas, se deberá tener reserva en el momento que se hace. Y solo se concederá al primer usuario en solicitarlo.</p>
						<p>- Se ruega mantener el orden y la limpieza del aula por parte de todos los usuarios.</p>
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