<?php
$servicio="http://svsiwnapdev01/wsSecurity/WebServicesSecurity.asmx?WSDL"; //url del servicio
$parametros=array(); //parametros de la llamada
$parametros['user']="jguerreros";
$parametros['psw']="";
$parametros['nsis']="19";
$client = new SoapClient($servicio, $parametros);
$result = $client->getNoticias($parametros);        //llamamos al métdo que nos interesa con los parámetros
echo $result;