<?php

  //1-Cargamos archivo XML en variable PHP
  $data = simplexml_load_file('notas.xml');
  echo "<pre>";
  print_r($data);
  echo "</pre>";

  //2- Ya tengo forma de manipular los datos. Decido que hacer con ellos
  echo "<h1>Titulo de la nota: ".$data->heading."</h1>";
  echo "<h2>De: ".$data->from."</h2>";
  echo "<h2>Para: ".$data->to."</h2>";
  echo "<h2>Nota: ".$data->body."</h2>";

