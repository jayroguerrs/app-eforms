<?php 


$webservice_url = "http://svsiwnapdev01/wsSecurity/WebServicesSecurity.asmx?WSDL";

$user = 'jguerreros';
$psw = 'enfermeria2021';
$num = 19;

$Parametros = $user . '|' . $psw . '|' . $num;



/*
$request_param = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Body>
    <CelsiusToFahrenheit xmlns="https://www.w3schools.com/xml/">
      <Celsius>' . $input_celsius . '</Celsius>
    </CelsiusToFahrenheit>
  </soap12:Body>
</soap12:Envelope>';
*/

$request_param = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <Parametros xmlns="http://tempuri.org/">'. $Parametros.'</Parametros>
  </soap:Body>
</soap:Envelope>';

$myXMLData =
'<?xml version="1.0" encoding="utf-8"?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Dont forget me this weekend!</body>
</note>';


$headers = array(
    'Content-Type: text/xml; charset=utf-8',
    'Content-Length: '.strlen($request_param)
);

$ch = curl_init($webservice_url);
curl_setopt ($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $request_param);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$data = curl_exec ($ch);

$result = $data;

if ($result === FALSE) {
    printf("CURL error (#%d): %s<br>\n", curl_errno($ch),
    htmlspecialchars(curl_error($ch)));
}

curl_close ($ch);

//$data = json_encode($data);
echo $data;

echo strpos($data, "USUARIO");
echo strpos($data, " ");


#$data . ' tiene que salir';

?>