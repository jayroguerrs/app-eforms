<?php

phpinfo();
$wsdl = 'http://svsiwnapdev01/wsSecurity/WebServicesSecurity.asmx'; //URL de nuestro servicio soap

//Basados en la estructura del servicio armamos un array

$user = 'jguerreros';
$psw = 'enfermeria2021';
$num = 19;

$Parametros = $user . '|' . $psw . '|' . $num;

$options = Array(
	"uri"=> $wsdl,
	"style"=> SOAP_RPC,
	"use"=> SOAP_ENCODED,
	"soap_version"=> SOAP_1_1,
	"cache_wsdl"=> WSDL_CACHE_BOTH,
	"connection_timeout" => 15,
	"trace" => false,
	"encoding" => "UTF-8",
	"exceptions" => false,
	);

//Enviamos el Request
$soap = new SoapClient($wsdl, $options);
$result = $soap->getLista($Parametros); //Aquí cambiamos dependiendo de la acción del servicio que necesitemos ejecutar
var_dump($result);