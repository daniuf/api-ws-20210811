<?php

//1- Conectarnos al origen de datos / fuente de informacion / web service
$ip = $_SERVER["HTTP_CF_CONNECTING_IP"];

$xml = file_get_contents("http://www.geoplugin.net/xml.gp?ip=".$ip);

if ($xml) {

  //2- Transformar el formato XML en variable PHP que pueda manipular
  $data = simplexml_load_string($xml);
  echo "<pre>";
  print_r($data);
  echo "</pre>";

}
