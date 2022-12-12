<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-eliminar-partida.css" rel="stylesheet" type="text/css" />
		<script src="js/eliminar-partida.js" type="text/javascript"></script>
		<title>Eliminar partida</title>
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
						<h1>Eliminar partida</h1>
						<img src="imagenes/veintiuno.jpg" alt="Imagen Gaming" width="250px" >
						<p class="diez">Seleccione alias, seleccione juego y luego pulse 'Eliminar partida' para eliminar la partida qué registró hoy.</p>
                        <form method="post">
							<label for="sel-alias">Seleccione alias</label>
							<select name="alias" id="alias" class="ocho">
								<option value="">--Seleccione alias--</option>
								<?php
								foreach($todos_alias as $valor):?>
								<option><?php echo $valor?></option>
								<?php endforeach;?>
							</select><br/>
							<label for="sel-juego">Seleccione juego:
                            <select name="juego" id="juego" class="ocho">
                                <option value="">--Seleccione juego--</option>
                            </select><br/>
                            <input type="submit" name="eliminar" value="Eliminar partida" class="dieciocho">
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