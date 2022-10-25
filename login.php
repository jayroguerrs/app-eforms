<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(img/clinica.png);">
	<form role="form" id="login-form" action="modelo-login.php" method="post">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Lavado de manos</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
					  <h3 class="mb-4 text-center">Inicio de sesión</h3>
					  <form action="#" class="signin-form">
						  <div class="form-group">
							  <input type="text" class="form-control" placeholder="Usuario" required>
						  </div>
					<div class="form-group">
					  <input id="password-field" type="password" class="form-control" placeholder="Contraseña" required>
					  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					</div>
					<div class="form-group">
						
						<button type="submit" class="form-control btn btn-primary submit px-3">Ingresar</button>
					</div>

					<div class="form-group">
					<?php

						header('Content-Type: text/html; charset=ISO-8859-1');
						require_once('lib/nusoap.php');

						//Variables
						$slengua = "C";
						$scurso = "2011-12";
						$scoddep = "B142";
						$scodest = "";

						//url del webservice que invocaremos
						$wsdl="https://cvnet.cpd.ua.es/servicioweb/publicos/pub_gestdocente.asmx?wsdl";

						//instanciando un nuevo objeto cliente para consumir el webservice
						$client=new nusoap_client($wsdl,'wsdl');

						//pasando parametros de entrada que seran pasados hacia el metodo
						$param=array('plengua'=>$slengua, 'pcurso' => $scurso, 'pcoddep' => $scoddep, 'pcodest' => $scodest);

						//llamando al metodo y recuperando el array de productos en una variable
						$resultado = $client->call('wsasidepto', $param);

						//¿ocurrio error al llamar al web service?
						if ($client->fault) { // si
							$error = $client->getError();
						if ($error) { // Hubo algun error
								//echo 'Error:' . $error;
								//echo 'Error2:' . $error->faultactor;
								//echo 'Error3:' . $error->faultdetail;faultstring
								echo 'Error:  ' . $client->faultstring;
							}
							
							die();
						}

						//Si es vacio
						echo "<pre>";
						print_r($resultado);
						echo "</pre>";

						?>
					</div>
					
				  </form>
				  
				  </div>
					</div>
				</div>
			</div>
		</section>
	</form>		

	<script src="js/vendor/jquery-3.4.1.min.js"></script>
  	<script src="js/vendor/bootstrap.min.js"></script>
  	<script src="js/vendor/jquery.soap.js"></script>
  	<script src="js/ajax.js"></script>
  	<script src="js/script.js"></script>
	</body>
</html>

