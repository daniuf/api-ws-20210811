<?php

/**
 * Armar cliente de BLZService usando soapClient
 */

define("WSDL", "http://www.thomas-bayer.com/axis2/services/BLZService?wsdl");

try {

 //Lanzar lo que quiero ejecutar
 $options = array(
		'soap_version' => SOAP_1_1,
		'trace' => true
		);

 $client = new SoapClient(WSDL, $options);
 //Camino A para transformar complexType en variable PHP
 /*$input['blz'] = "54030011";
 $response = $client->getBank($input);*/

 //Camino B
 //$response = $client->getBank(array('blz' => "54030011"));

 //Camino C
 $response = $client->__soapCall("getBank", array('getBank' 
							=> array('blz' => "54030011")));

 echo "El nombre del banco es: ".$response->details->bezeichnung."<br/>";
 echo "El nombre del banco es: ".$response->details->plz."<br/>";

 echo "<pre>";
 print_r($response);
 echo "</pre>";

 echo "<hr/>";
 echo "Request". $client->__getLastRequestHeaders()."<br/>";
 echo "Request". $client->__getLastRequest()."<br/>";
 echo "Request". $client->__getLastResponseHeaders()."<br/>";
 echo "Request". $client->__getLastResponse()."<br/>";

} catch (Exception $e) {

  //Controlar la exepcion
  echo $e->getMessage();

}
