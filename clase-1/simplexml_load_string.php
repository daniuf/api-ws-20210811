<?php

//1- Conectarnos al origen de datos / fuente de informacion / web service
$xml = file_get_contents("https://api.daniuf.com.ar/clase-1/notas.xml");

if ($xml) {

  //2- Transformar el formato XML en variable PHP que pueda manipular
  $data = simplexml_load_string($xml);
  echo "<pre>";
  print_r($data);
  echo "</pre>";

  //3- Ya tengo forma de manipular los datos. Decido que hacer con ellos
  echo "<h1>Titulo de la nota: ".$data->heading."</h1>";
  echo "<h2>De: ".$data->from."</h2>";
  echo "<h2>Para: ".$data->to."</h2>";
  echo "<h2>Nota: ".$data->body."</h2>";

}
