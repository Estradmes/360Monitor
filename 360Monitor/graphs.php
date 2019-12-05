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
	<link rel="stylesheet" href="css/graphs.css">
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
	var dat2 = [97.0, 71.5, 100.0, 85.4, 90.0, 100.0, 60.0, 100.0, 95.4, 65.1, 11.6, 54.4];
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
	$(document).ready(function(){
	  chart1 = new Highcharts.Chart({
		chart: {renderTo: 'container2'},
		series: [{data: dat2}]
	  });
	});
	$(document).ready(function(){
	  chart1 = new Highcharts.Chart({
		chart: {renderTo: 'container3'},
		series: [{data: dat1}]
	  });
	});
	$(document).ready(function(){
	  chart1 = new Highcharts.Chart({
		chart: {renderTo: 'container4'},
		series: [{data: dat2}]
	  });
	});
	$(document).ready(function(){
	  chart1 = new Highcharts.Chart({
		chart: {renderTo: 'container5'},
		series: [{data: dat1}]
	  });
	});
	$(document).ready(function(){
	  chart1 = new Highcharts.Chart({
		chart: {renderTo: 'container6'},
		series: [{data: dat2}]
	  });
	});
	</script>
	
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
				<li><a href="#">Gráficos</a></li>
				<li><a href="https://html-css-js.com/css/code/">Respaldo</a></li>
				<li><a href="settings.php">Configuración</a></li>
				<li><a href="logout.php">Salir</a></li>
			</ul>
		</nav>
		</div>
	</header>
	<section id="pageContent">
	<table>
		<tr>
			<th><h1>Antena 1</h1></th>
		</tr>
		<tr>
			<th><div id="container1"></div></th>
		</tr>
		<tr>
			<th><h1>Antena 2</h1></th>
		</tr>
		<tr>
			<th><div id="container2"></div></th>
		</tr>
		<tr>
			<th><h1>Antena 3</h1></th>
		</tr>
		<tr>
			<th><div id="container3"></div></th>
		</tr>
		<tr>
			<th><h1>Antena 4</h1></th>
		</tr>
		<tr>
			<th><div id="container4"></div></th>
		</tr>
		<tr>
			<th><h1>Antena 5</h1></th>
		</tr>
		<tr>
			<th><div id="container5"></div></th>
		</tr>
		<tr>
			<th><h1>Antena 6</h1></th>
		</tr>
		<tr>
			<th><div id="container6"></div></th>
		</tr>
	</table>
	</section>
</body>
</html>