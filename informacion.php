<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="/estilosinformacion.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="librerias/jquery-3.1.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>



	<link rel="icon" href="img/logo.ico">
	<style media="screen">
	body{
		background-color: rgb(0, 0, 0);
	}
	.overlay {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: rgb(0,0,0);
			background-color: rgba(0,0,0, 0.9);
			overflow-x: hidden;
			transition: 0.5s;
	}

	.overlay-content {
			position: relative;
			top: 25%;
			width: 100%;
			text-align: center;
			margin-top: 30px;
	}

	.overlay a {
			padding: 8px;
			text-decoration: none;
			font-size: 36px;
			color: #818181;
			display: block;
			transition: 0.3s;
	}

	.overlay a:hover, .overlay a:focus {
			color: #f1f1f1;
	}

	.overlay .closebtn {
			position: absolute;
			top: 20px;
			right: 45px;
			font-size: 60px;
	}

	@media screen and (max-height: 450px) {
		.overlay a {font-size: 20px}
		.overlay .closebtn {
			font-size: 40px;
			top: 15px;
			right: 35px;
		}
	}
	#menuderecho{
    margin-top: 40px;
    width: 50%;
    color: rgb(255, 255, 255);

  }
  #myNav{
    margin-top: 40px;
  }
  section .container {
    color:#ffffff;
  }
  .chart-container{
	  width: 640px;
	  height: auto;
  }

	</style>

		

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   	

</head>





<body>
	
	
	<!-- Menu lateral -->
	<!--section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title >
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				Cuenta
			</div>

			<!-- Informacion del menu lateral >
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="img/user.png" alt="UserIcon">
					<figcaption class="text-center text-titles">User Name</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="index.html" class="btn-exit-system">
							<i class="zmdi zmdi-power"><br>Salir</i>
						</a>
					</li>
				</ul>
			</div>
			<!-- estadisticas de informacion incubadora >
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="cuenta.html">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i>Home</a>
				</li>
			</ul>
		</div>
	</section-->

	<div id="myNav" class="overlay">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <div class="overlay-content">
	  <form class="form2" action="cuenta.php" method="get">
                 <?php $codigo = $_GET['codigo'];
				  echo '<input type="hidden" name="codigo" value='.$codigo.'>';
                  ?>
                  <input type="submit" value="Home" class="display-4 text-center" role="button" aria-pressed="true" >
                  <!--<a href="" type="submit"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i>Home</a>-->
              </form>	
	    <a href="index.html" class="btn-exit-system"> Salir <br> <i class="zmdi zmdi-power"></i></a>
	  </div>
	</div>

	<script type="text/javascript">
	 
	 
	 google.charts.load('current', {'packages':['gauge']});
	 google.charts.setOnLoadCallback(drawChart);

	 function drawChart() {

	   var data = google.visualization.arrayToDataTable([
		 ['Label', 'Value'],
		 ['Temperatura', 0],
		 ['Humedad', 0],
		 ['Humedad R.',0],
		 ['Temperatura R.',0],

	   ]);

	   var options = {
		 width: 250, height: 250,
		 redFrom: 30, redTo: 40,
		 yellowFrom:26, yellowTo: 30,
		 greenFrom:20, greenTo: 26,

		 max:40, min: 0,
		 minorTicks: 5
	   };

	   var chart = new google.visualization.Gauge(document.getElementById('Medidores'));
	   

	   chart.draw(data, options);
	   setInterval(function() {
		   
		   
	   var JSON=$.ajax({url:" http://localhost/Proyectomodularreal/DatosSensores.php?codigo="+<?php $codigo = $_GET['codigo']; print $codigo;?>,
	   dataType:'json',
	   async: false}).responseText;
	   var Respuesta = jQuery.parseJSON(JSON);
		 data.setValue(0, 1, Respuesta[0].temperaturaActual);
		 data.setValue(1, 1, Respuesta[0].humedadUltimoDia);
		 data.setValue(2, 1, Respuesta[0].humedadRecomendada);
		 data.setValue(3, 1, Respuesta[0].temperaturaRecomendada);


		 chart.draw(data, options);
	   }, 1300);
	   
	   
	 }
   </script>



	  <div  id="menuderecho">
	    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span><br><br>
	  </div>

	<section class="container ">
	
	<div class="container" >
        <div class="row" >
            <div class="col-sm-6 ">
                <div class="card bg-light" >
                    <div class="card-header text-center" >
						Medidores de Condiciones de la Incubadora (Humedad y Temperatura) 
					</div>
					<div class="card-body bg-dark">
                        <div class="row">
                            <div class="col-sm-6 " style="padding-left:50px;">
								<div id="Medidores" >


								</div>
                            </div>
                        </div>
                    </div>
                </div>
			 </div>
			 <div class="col-sm-6">
                <div class="card bg-light" >
                    <div class="card-header text-center" >
						Estadisticas de Incubadora (Humedad y Temperatura) 
					</div>
					<div class="card-body bg-dark">
                        <div class="row">
                            <div class="col-sm-12">
								<div id="Estadisticas" >


								</div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
	 </div><br><br><br><br>
	 <script src="librerias/jquery-3.1.1.min.js"></script>
	<script src="code/highcharts.js"></script>
	<script src="code/modules/exporting.js"></script>
	<script src="code/modules/export-data.js"></script>

<!----------------------------Script de las Estadisticas---------------------------->
	<script type="text/javascript">

	var ultimox;
	var ultimoy;
	$.ajax({

		url: "DatosSensoresEstadisticas.php?codigo="+<?php $codigo = $_GET['codigo']; print $codigo;?>,
		type: "get",
		success: function (DatosRecuperados){
			$.each(DatosRecuperados, function(i,o){
				if (o.x) {DatosRecuperados[i].x = parseFloat(o.x);}
				if (o.y) {DatosRecuperados[i].y = parseFloat(o.y);}

			});
			setx(DatosRecuperados[(DatosRecuperados.length)-1].x);
			sety(DatosRecuperados[(DatosRecuperados.length)-1].y);

Highcharts.chart('Estadisticas', {
    chart: {
        type: 'spline',
        animation: Highcharts.svg, 
        marginRight: 10,
        events: {
            load: function () {
				series = this.series[0];
            }
        }
    },

    title: {
        text: 'Registro de Temperatura'
    },
    xAxis: {
		title: {
            text: 'Tiempo'
        },
        type: 'time',			//'spline' enves de barras te dibuja lineas
        tickPixelInterval: 100
    },
    yAxis: {
        title: {
            text: 'Temperatura'
        },
        plotLines: [{
            value: 0,
            width: 2,
            color: '#808080'
        }]
    },
    tooltip: {
        headerFormat: '<b>{series.name}</b><br/>',
        pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
    },
    legend: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    series: [{
        name: 'Tiempo',
        data: DatosRecuperados
    }]
});
}});

setInterval(function(){
	$.get("DatosSensoresEstadisticas.php?codigo="+<?php $codigo = $_GET['codigo']; print $codigo;?>, function(UltimosDatos){
		var varlocalx = parseFloat(UltimosDatos[0].x);
		var varlocaly = parseFloat(UltimosDatos[0].y);

		if((getx() != varlocalx) && (gety() != varlocaly)){
			series.addPoint([varlocalx,varlocaly], true , true);
			setx(varlocalx); 
			sety(varlocaly);
		}

	});}, 1300);
	function getx(){return ultimox;}
	function gety(){return ultimoy;}
	function setx(x){ultimox = x;}
	function sety(y){ultimoy = y;}

		</script>



	 <!--div class="container" >
        <div class="row" >
            <div class="col-sm-6">
                <div class="card bg-light" >
                    <div class="card-header text-center" >
						Estadisticas de Incubadora (Humedad y Temperatura) 
					</div>
					<div class="card-body bg-dark">
                        <div class="row">
                            <div class="col-sm-6">
								<div id="Estadisticas"></div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
	 </div-->

	 <!--div id="chart-container">
		 <script>
			 $(document).ready(function(){
				 $.ajax({
					 url: "http://localhost/Proyectomodularreal/DatosSensores.php",
					 type: "GET",
					 success: function(datos){
						 console.log(datos);

						 var temperaturaActual = [];
						 for(var i in datos){
							 temperaturaActual.push("TemperaturaActual" + datos[i].temperaturaActual);
						 }

						 var chartdatos = {
							 labels: Temperatura Actual,
							 datasets: [{

							 }]
						 };

						 var ctx = $(#mycanvas);

						 var LineGraph = new Chart(ctx,{
							 type: 'Line',
							 data: chartdatos
						 });

					 },
					 error: function(datos){

					 }
				 });
			 });
		 </script>
		 <canvas id="mycanvas"></canvas>
	 </div-->
	 

	 


	<!-- Content page-->
	<!--section class="container">
	<div class="container" >
        <div class="row" >
            <div class="col-sm-12">
                <div class="card bg-light" >
                    <div class="card-header" >
                        Comportamiento de Temperaturas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="cargaLineal"></div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
     </div>

     <div class="container" >
        <div class="row" >
            <div class="col-sm-12">
                <div class="card bg-light" >
                    <div class="card-header" >
                        Comportamiento de Temperaturas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="cargaBarras"></div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
     </div-->

			<!-- Content page -->
			<!--div class="container-fluid">
				<div class="page-header">
				  <h1 class="text-titles text-center" style="color:rgb(208, 156, 22);">Informaci&oacute;n Detallada</h1><br>
				</div>
			</div>

			<div class="container">
				<div class="grafica">
					<h2 class=" text-center">Comportamiento de Temperaturas</h2> <br><br>
						<img src="img/grafica.jpg" alt="" class="img-fluid" width="80%"><br>
				</div>
				<div class="tabla">
					<h2 class="text-center">Registro de Temperatura</h2> <br><br>
						<img src="img/tabla.jpg" alt="" class="img-fluid" width="30%">
				</div>
			</div-->
		</section>




	<!--====== Scripts -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	function openNav() {
		document.getElementById("myNav").style.width = "100%";
	}

	function closeNav() {
		document.getElementById("myNav").style.width = "0%";
	}
	</script>


</body>
</html>


<script>
    $(document).ready(function(){
        $('#cargaLineal').load('lineal.php');
        $('#cargaBarras').load('barras.php');
    });
</script>
