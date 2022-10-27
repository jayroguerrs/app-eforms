<?php
  
  $url = "http://svsiwnapdev01/wsSecurity/WebServicesSecurity.asmx?WSDL";
  $user = 'jguerreros';
  $psw = 'enfermeria2021';
  $num = '19';

  $Parametros = $user . '|' . $psw . '|' . $num;

try {
 $client = new SoapClient($url, [ "trace" => 1 ] );
 $result = $client->getLista($Parametros     );
 $data = json_encode($result);

# echo $data;
} catch ( SoapFault $e ) {
 echo $e->getMessage();
}
/*
$decode = json_decode($data,true);

$EEResponse = $decode['EEResponse'];

echo $EEResponse;
*/

$getdata = json_decode($data,true);

echo $getdata['EEResponse']['status'] ; 
echo $getdata['EEResponse']['mensaje'];

echo $getdata['EAutorizacionLst']['EAutorizacion'][0]['Descripcion'];


#echo PHP_EOL;
?>