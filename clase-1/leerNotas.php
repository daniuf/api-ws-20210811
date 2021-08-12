<?php

//1- Conectarnos al origen de datos / fuente de informacion / web service
$xml = file_get_contents("https://api.daniuf.com.ar/clase-1/notas_v2.xml");

if ($xml) {

  //2- Transformar el formato XML en variable PHP que pueda manipular
  $data = simplexml_load_string($xml);

  /*echo "<pre>";
  var_dump($data);
  echo "</pre>";*/

  for ($i = 0 ; $i < count($data->note); $i++) {

  //3- Ya tengo forma de manipular los datos. Decido que hacer con ellos
  echo "<h1>Titulo de la nota: ".$data->note[$i]->heading."</h1>";
  echo "<h2>De: ".$data->note[$i]->from."</h2>";
  echo "<h2>Para: ".$data->note[$i]->to."</h2>";
  echo "<h2>Nota: ".$data->note[$i]->body."</h2>";
  echo "<h3>Nota: ".$data->note[$i]->datetime."</h3>";
  echo "<hr/>";
  }
}
