<?php

//1- Conectarnos al origen de datos / fuente de informacion / web service
$xml = file_get_contents("https://api.daniuf.com.ar/clase-1/crearXML.php");

if ($xml) {

  //2- Transformar el formato XML en variable PHP que pueda manipular
  $libros = new simpleXMLElement($xml);

  /*echo "<pre>";
  var_dump($libros);
  echo "</pre>";*/

  for ($i = 0 ; $i < count($libros->libro); $i++) {

  //3- Ya tengo forma de manipular los datos. Decido que hacer con ellos
  echo "<h1>Titulo: ".$libros->libro[$i]->titulo."</h1>";
  $atributoTitulo = $libros->libro[$i]->titulo->attributes();
  foreach ($atributoTitulo as $key => $value) {
   if ($value != "") {
     echo "<p>$key: $value</p>";
   }
  }
  echo "<h2>Autor: ".$libros->libro[$i]->autor."</h2>";
  echo "<h2>Anio Publicacion: ".$libros->libro[$i]->anio_publicacion."</h2>";
  echo "<h2>Nombre de imagen: ".$libros->libro[$i]->foto_portada."</h2>";
  echo "<hr/>";
  }
}
