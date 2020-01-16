<?php 
include_once ('weather.php');
if(isset($_POST['city'])){
	$weather = new weather();
	$query = ['location' => $_POST['city'],'format' => 'json',];
	echo $weather->curl($query);
	exit();
}
?>
<!DOCTYPE html>
<html>
    <head>        
        <title>Viajemos - prueba </title>  
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
    </head>
    <body>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Prueba viajemos.com </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="javascript:void(0)">Weather API + Mysql + Js + Php</a>
                    </li>                            
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        	<a href="Historico.php" class="btn btn-success my-2 my-sm-0" type="button">Consultar Historico</a>
                        </li>
                    </ul>                            
                </form>
            </div>
        </nav>
        <div id="map"></div>
        <div class="content">
			<div class="jumbotron">
				<h1 class="display-4" id="namecity">Bienvenido!</h1>
				<p class="lead" id="descripcion">Has click sobre alguna de las ciudades indicadas con el marcador para concer el % de humedad en este momento.</p>
        	</div>
        </div>
        <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    		<div class="modal-dialog modal-sm">
        		<div class="modal-content" style="width: 48px">
            		<div class="spinner-grow text-success" role="status" style="width: 15rem; height: 15rem;">
  						<span class="sr-only">Loading...</span>
					</div>
        		</div>
    		</div>
		</div>
    </div>
	<script src="js/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="js/api.js"></script> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkezui-X4JWIAee30499FUiGLtRpWa2z4&callback=initMap" async defer></script>
</body>
</html>
