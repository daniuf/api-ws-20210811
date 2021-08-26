<?php

define("WSDL", "https://ecs.syr.edu/faculty/fawcett/Handouts/cse775/code/calcWebService/Calc.asmx?wsdl");

// Operaciones disponibles: add / substract

try {

 $options = array(
		'soap_version' => SOAP_1_2,
		'trace' => true
		);

 $client = new SoapClient(WSDL, $options);
 $a = $_GET['a'];
 $b = $_GET['b'];
 //$resultado = $client->Add(['a' => $a, 'b' => $b]);
 $resultado = $client->Subtract(['a' => $a, 'b' => $b]);
 echo "El resultado de la operacion es ".$resultado->SubtractResult."<br/>";

 /*
 echo "<pre>";
 var_export($resultado);
 echo "</pre>";

 echo "<hr/>";
 echo "Request". $client->__getLastRequestHeaders()."<br/>";
 echo "Request". $client->__getLastRequest()."<br/>";
 echo "Request". $client->__getLastResponseHeaders()."<br/>";
 echo "Request". $client->__getLastResponse()."<br/>";
 */

} catch (Exception $e) {

  echo $e->getMessage();

}
