<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-anular-reserva.css" rel="stylesheet" type="text/css" />
		<title>Anular reserva</title>
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
						<h1>Anular mi reserva</h1>
                        <form method="post">
							<p class="dieciseis">A continuación se muestran las fechas en las que tiene reserva. Seleccione una y luego pulse 'Anular' para anular la reserva.</p>
							<img src="imagenes/doce.jpg" alt="Imagen Gaming" width="200px" >
                            <label for="sel-fecha"><span class="doce">Seleccione fecha:</span> </label>
							<select name="reservas" class="quince">
							<option selected disabled value=''>--Seleccione fecha--</option>
							<?php
            				foreach($reservas as $valor):?>
                			<option><?php echo $valor?></option>
            				<?php endforeach;?>
							</select><br/>
                            <input type="submit" name="anular" value="Anular" class="trece">
                        </form>
						<?php
							if(isset($_POST['anular'])){
								if(empty($_POST['reservas']))
									echo "<span class=catorce>Seleccione una fecha.</span>";
								else{
									$row3 = mysqli_fetch_assoc($fila3);
									echo "<p class=diecisiete>Reserva anulada con éxito:</p><p class=dieciocho>- Id reserva: ".$row3['id']."<br/>- Puesto: ".$row3['puesto']."<br/>- Fecha: ".date("d/m/Y", strtotime($row3['fecha']))."<br/>- Usuario: ".$row3['email']."<br/>- Turno: ".$row3['turno']."</p>";
								}		
							}
						?>
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