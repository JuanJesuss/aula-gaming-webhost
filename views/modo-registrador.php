<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-modo-registrador.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/modo-registrador.js"></script>
		<title>Modo Registrador</title>
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
				<div id="trece"></div>
                <div id="doce"></div>
				<div id="botonmr" hidden>
					<form method="post" name="formulario">
                   		<input type="submit" name="modoregistrador" value="Solicitar permiso" class="diez" />
					</form>
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
            <div id="nueve" hidden>
                <ul class="nueve">
                    <li class="regpartidas"><a href="controller-registrar-partida.php">Registrar partida</a></li>
                    <li class="elimpartidas"><a href="controller-eliminar-partida.php">Eliminar partida</a></li>
                    <li><a href="controller-alta-juego.php">Alta juego</a></li>
                </ul>
            </div>
		</nav>
		<main>
			<section>
				<article>
                    <div>
                        <select id="fecha" hidden><option><?php echo $fecha?></option></select>
                        <select id="turno" hidden><option><?php echo $_SESSION['turno']?></option></select>
                        <select id="email" hidden><option><?php echo $_SESSION['email']?></option></select>
                        <select id="registrador" hidden></select>
                        <select id="correoregistrador" hidden>
                            <option>
                                <?php
                                    if(mysqli_num_rows($fila)!=0)					
                                        echo mysqli_fetch_assoc($fila)['email'];
                                ?>
                            </option>
                        </select>
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