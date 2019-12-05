<?php
session_start();
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://html5-templates.com/" />
    <title>360Monitor</title>
	<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <meta name="description" content="Monitor de Estado de Antenas AP de 360NET">
	<link rel="stylesheet" href="css/style-settings.css">
	<link rel="stylesheet" href="css/cssbotones.css">
</head>
<body>
	<?php
		if (isset($_SESSION['loggedin'])) {  
		}
		else {
			echo "<div class='alert alert-danger mt-4' role='alert'>
			<h4>You need to login to access this page.</h4>
			<p><a href='login.html'>Login Here!</a></p></div>";
			exit;
		}
		// checking the time now when check-login.php page starts
		$now = time();           
		if ($now > $_SESSION['expire']) {
			session_destroy();
			echo "<div class='alert alert-danger mt-4' role='alert'>
			<h4>Your session has expire!</h4>
			<p><a href='login.html'>Login Here</a></p></div>";
			exit;
			}
		?>
	<header>
		<div id="logo"><img src="logo.png"></div>
		<div id="sublogo"><img src="descript.png"></div>
		<div id="menu-page">
		<nav>  
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="graphs.php">Gráficos</a></li>
				<li><a href="https://html-css-js.com/css/code/">Respaldo</a></li>
				<li><a href="#">Configuración</a></li>
				<li><a href="logout.php">Salir</a></li>
			</ul>
		</nav>
		</div>
	</header>
	<section id="pageContent">
		<h3>Crear una cuenta</h3><hr />
		<form method="post" action="create-account.php" method="POST">
			<div class="form-group">				
				<input type="text" class="form-control" name="name" placeholder="Ingrese nombre" required>
			</div>
			<div class="form-group">				
				<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingrese correo" required>
			</div>
			<div class="form-group">				
				<input type="password" class="form-control" name="password" placeholder="Crear contraseña" required>
			</div>
			<p>Seleccione tipo de cuenta:</p>
			<div class="form-group">
				<input name="permisos" type="radio" value="admin" checked="checked" />Administrador
				<br />
				<input name="permisos" type="radio" value="normaluser" />Usuario
			</div>
		  <button type="submit" class="btn btn-success btn-block">Crear Cuenta</button>
		</form>
		<h3>Enviar un respaldo</h3><hr />
		<div class='well'>
		<form action="password-recovery.php" method="post">
			<div class="form-group">										
				<input type="email" class="form-control" name="email" placeholder="Ingrese el correo al que se le enviará el respaldo" required>
			</div>
			<button type="submit" class="btn btn-dark">Enviar respaldo</button>
		</form>								
	</div>
	</section>
</body>
</html>