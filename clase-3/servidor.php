<?php

class Servidor {

  public function __construct() {}

  public function holaMundo() {
    return "Hola mundo!!!!!!!";
  }

 public function holaMundoMejorado($mensaje) {
   return "Hola mundo, tu mensaje es $mensaje";
 }

}

$options = array(
		'uri' => 'https://api.daniuf.com.ar/clase-3/servidor.php'
		);

$soapserver = new SoapServer(null, $options);
$soapserver->setClass('Servidor');
$soapserver->handle();

