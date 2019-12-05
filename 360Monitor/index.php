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
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
	<script language="javascript">
    function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
  </script>
  <script src="jquery.min.js" type="text/javascript"></script>
 <script src="highcharts.js" type="text/javascript"></script>
	<!--Grafica1-->
	<script type="text/javascript">
	var dat1 = [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4];
	</script>
	<!-- mostrar en -->
	<script type="text/javascript">
	var chart1;
	$(document).ready(function(){
	  chart1 = new Highcharts.Chart({
		chart: {renderTo: 'container1'},
		series: [{data: dat1}]
	  });
	});
	</script>
</head>

<body onload="startTime()">
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
			if ($_SESSION['user']=="normaluser") { 
				echo "<style>
				section main article form input {
					display: none;
				}
				#configadmin{
					display:none;
				}
				</style>";
		}
		?>
	<header>
		<div id="logo"><img src="logo.png"></div>
		<div id="sublogo"><img src="descript.png"></div>
		<div id="menu-page">
		<nav>  
			<ul>
				<li><a href="#">Inicio</a></li>
				<li><a href="graphs.php">Gráficos</a></li>
				<li><a href="graphs.php">Respaldo</a></li>
				<li><div id="configadmin"><a href="settings.php">Configuración</a></div></li>
				<li><a href="logout.php">Salir</a></li>
			</ul>
		</nav>
		</div>
	</header>
	<section id="pageContent">
		<main role="main">
			<article>
				<h2>Antena 1</h2>
				<!--GPIO17--> 
				  <form action="" method="post">
				   <div id="demoFont"><?php
								//Abrimos nuestro archivo
								$archivo = fopen("voltaje.csv", "r");
								//Lo recorremos
								while (($datos = fgetcsv($archivo, ",")) == true){
								        echo "Voltaje: " . $datos[0]*0.0996 . "v";
								}
								//Cerramos el archivo
								fclose($archivo);
							?></div><input type="submit" name="encender17" value="Encender">
				   <input type="submit" name="apagar17" value="Apagar">
				   <input type="submit" name="parpadear17" value="Reiniciar">
				   </form>
			</article>
			<article>
				<h2>Antena 2</h2>
				<!--GPIO27--> 
				  <form action="" method="post">
				   <div id="demoFont"><?php
								//Abrimos nuestro archivo
								$archivo = fopen("voltaje.csv", "r");
								//Lo recorremos
								while (($datos = fgetcsv($archivo, ",")) == true){
								        echo "Voltaje: " . $datos[1]*0.0996 . "v";
								}
								//Cerramos el archivo
								fclose($archivo);
							?></div><input type="submit" name="encender27" value="Encender">
				   <input type="submit" name="apagar27" value="Apagar">
				   <input type="submit" name="parpadear27" value="Reiniciar">
				   </form>
			</article>
			<article>
				<h2>Antena 3</h2>
				<!--GPIO4--> 
				  <form action="" method="post">
				   <div id="demoFont"><?php
								//Abrimos nuestro archivo
								$archivo = fopen("voltaje.csv", "r");
								//Lo recorremos
								while (($datos = fgetcsv($archivo, ",")) == true){
								        echo "Voltaje: " . $datos[2]*0.0996 . "v";
								}
								//Cerramos el archivo
								fclose($archivo);
							?></div><input type="submit" name="encender4" value="Encender">
				   <input type="submit" name="apagar4" value="Apagar">
				   <input type="submit" name="parpadear4" value="Reiniciar">
				   </form>
			</article>
			<article>
				<h2>Antena 4</h2>
				<!--GPIO22--> 
				  <form action="" method="post">
				   <div id="demoFont"><?php
								//Abrimos nuestro archivo
								$archivo = fopen("voltaje.csv", "r");
								//Lo recorremos
								while (($datos = fgetcsv($archivo, ",")) == true){
								        echo "Voltaje: " . $datos[3]*0.0996 . "v";
								}
								//Cerramos el archivo
								fclose($archivo);
							?></div><input type="submit" name="encender22" value="Encender">
				   <input type="submit" name="apagar22" value="Apagar">
				   <input type="submit" name="parpadear22" value="Reiniciar">
			</article>
		</main>
		<aside>
			<div>
				<div id="clockdate">
				  <div class="clockdate-wrapper">
					<div id="clock"></div>
					<div id="date"></div>
				  </div>
				</div>
			</div>
			<div><div id="container1" style="height: 250px "></div></div>
			<div>Sidebar3</div>
		</aside>
	</section>
	<footer>
		<p>&copy; Página desarrollada por Hermes Estrada</p>
		<address>
			Contacto: <a href="mailto:me@example.com">Soporte 360NET</a>
		</address>
	</footer>


</body>

</html>

<?php

  if ($_POST[encender17]) { 
   
$a- exec("sudo ./rutina2");
echo $a;
  }

  if ($_POST[apagar17]) { 
   $a- exec("sudo python /var/www/leds/gpio/17/apaga.py");
   echo $a;
  }

  if ($_POST[parpadear17]) { 
   $a- exec("sudo ./rutina2");
   echo $a;
  }

  if ($_POST[encender27]) { 
   $a- exec("sudo python /var/www/leds/gpio/27/enciende.py");
   echo $a;
  }

  if ($_POST[apagar27]) { 
   $a- exec("sudo python /var/www/leds/gpio/27/apaga.py");
   echo $a;
  }

  if ($_POST[parpadear27]) { 
   $a- exec("sudo python /var/www/leds/gpio/27/parpadea.py");
   echo $a;
  }

  if ($_POST[encender4]) { 
   $a- exec("sudo python /var/www/leds/gpio/4/enciende.py");
   echo $a;
  }

  if ($_POST[apagar4]) { 
   $a- exec("sudo python /var/www/leds/gpio/4/apaga.py");
   echo $a;
  }

  if ($_POST[parpadear4]) { 
   $a- exec("sudo python /var/www/leds/gpio/4/parpadea.py");
   echo $a;
  }

  if ($_POST[encender22]) { 
   $a- exec("sudo python /var/www/leds/gpio/22/enciende.py");
   echo $a;
  }

  if ($_POST[apagar22]) { 
   $a- exec("sudo python /var/www/leds/gpio/22/apaga.py");
   echo $a;
  }

  if ($_POST[parpadear22]) { 
   $a- exec("sudo python /var/www/leds/gpio/22/parpadea.py");
   echo $a;
  }

?>
