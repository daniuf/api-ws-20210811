<?php

define("SERVIDOR", "https://api.daniuf.com.ar/clase-3/servidor.php");

try {

 $options = array(
		'uri' => SERVIDOR,
		'location' => SERVIDOR,
		'trace' => true
		);
 $client = new SoapClient(null, $options);
 //$mensaje = $client->holaMundo();

 $input = $_GET['mensaje'];
 $mensaje = $client->holaMundoMejorado($input);

 echo "Respuesta del WS: ".$mensaje;

 echo "<hr/>";
 echo "Request". $client->__getLastRequestHeaders()."<br/>";
 echo "Request". $client->__getLastRequest()."<br/>";
 echo "Request". $client->__getLastResponseHeaders()."<br/>";
 echo "Request". $client->__getLastResponse()."<br/>";

} catch (Exception $e) {

  echo $e->getMessage();
}
