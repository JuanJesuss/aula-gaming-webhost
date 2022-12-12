<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilos-mis-partidas.css" rel="stylesheet" type="text/css" />
		<title>Mis partidas</title>
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
					<div class="quince">
						<h1>Mis partidas</h1>
						<img src="imagenes/ocho.jpg" alt="Imagen Gaming" width="200px" >
						<p class="doce">Seleccione fecha de inicio y fecha de fin para ver sus partidas.</p>
                        <form method="post">
                            <label for="desde">Fecha inicio: </label>
                            <input type="date" name="desde" min='2022-09-07' max='2023-06-22' ><br/>
                            <label for="hasta">Fecha fin: </label>
                            <input type="date" name="hasta" min='2022-09-07' max='2023-06-22' ><br/>
                            <input type="submit" name="mispartidas" value="Mis partidas" class="diez">
                        </form>
						<?php
							if(isset($_POST['mispartidas'])){
								if(empty($_POST['desde']))
                					echo "<span class=trece>Introduzca una fecha de inicio.</span>";
            					elseif(empty($_POST['hasta']))
                					echo "<span class=trece>Introduzca una fecha de fin.";
            					elseif($_POST['desde']>$_POST['hasta'])
                					echo "<span class=trece>La fecha de fin debe ser mayor a la fecha de inicio.</span>";
            					else{
									if(mysqli_num_rows($fila)==0)
										echo "<span class=trece>Entre ".date("d/m/Y", strtotime($_POST['desde']))." y ".date("d/m/Y", strtotime($_POST['hasta']))." no tiene partidas.</span>";
									else{
										echo
										"<div class=catorce>
										<table>
											<tr>
												<th>Id partida</th>
												<th>Fecha</th>
												<th>Alias</th>
												<th>Juego</th>
												<th>Puesto</th>
											</tr>";
										while($row = mysqli_fetch_assoc($fila)) {
											echo
											"<tr>
												<td>".$row['id']."</td>
												<td>".date("d/m/Y", strtotime($row['fecha']))."</td>
												<td>".$row['alias']."</td>
												<td>".$row['juego']."</td>
												<td>".$row['posicion']."</td>
											</tr>";
										}
										echo "</table></div>";
									}
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