<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-registrar-partida.css" rel="stylesheet" type="text/css" />
		<title>Registrar partida</title>
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
		</nav>
		<main>
			<section>
				<article>
					<div>
						<h1>Registrar partida</h1>
						<img src="imagenes/veintidos.jpg" alt="Imagen Gaming" width="300px" >
						<p class="diecisiete">Para registrar partidas deberá primeramente dar de alta el juego.</p>
                        <form method="post">
							<label for="sel-alias">Seleccione el alias del usuario:</label>
							<select name="alias" class="ocho">
								<option selected disabled value="">--Seleccione alias--</option>
								<?php
								foreach($todos_alias as $valor):?>
								<option><?php echo $valor?></option>
								<?php endforeach;?>
							</select><span class="catorce">*</span></br>
							<label for="sel-juego">Seleccione el juego que jugó el usuario: </label>
                            <select name="juego" class="ocho">
								<option selected disabled value="">--Seleccione juego--</option>
								<?php
								foreach($juegos_hoy as $valor2):?>
								<option><?php echo $valor2?></option>
								<?php endforeach;?>
							</select><span class="catorce">*</span><br/>
                            <label for="sel-puesto">Seleccione en que puesto quedó el usuario:</label>
                            <select name="puesto" class="ocho">
								<option selected disabled value="">--Seleccione puesto--</option>
								<option>Primero</option>
								<option>Segundo</option>
                                <option>Tercero</option>
							</select><span class="catorce">*</span>
							<p class="dieciseis"><span class="catorce">*</span> <span class="quince">Obligatorio</span></p>
                            <input type="submit" name="registrar" value="Registrar" class="diez">
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