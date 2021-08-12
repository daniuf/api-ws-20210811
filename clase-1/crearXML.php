<?php

/**
 * Asumimos que nuestro cliente nos solicito construir un XML con los datos 
 * de los libros que tiene almacenados
 * 
 * Objetivo: Transformar nuestro array en un documento XML
 */

$libros = array(
	    array(
		'titulo' => "El secreto de sus ojos",
		'autor' => "Eduardo Sacheri",
		'anio_publicacion' => '2006',
		'isbn' => "234567898765",
		'foto_portada' => ""
	     ),
	    array(
		'titulo' => "Harry Potter",
		'autor' => "Rowling",
		'anio_publicacion' => '2001',
		'isbn' => "",
		'foto_portada' => "harry_potter.jpg"
	     ),
	    array(
                'titulo' => "Harry Potter 2",
                'autor' => "Rowling",
                'anio_publicacion' => '2003',
                'isbn' => "",
                'foto_portada' => "harry_potter.jpg"
             ),
	  );

$xml = new simpleXMLElement("<libros></libros>");

for ($i = 0; $i < count($libros); $i++) {

  $libro = $xml->addChild('libro');
  $titulo = $libro->addChild('titulo', $libros[$i]['titulo']);
  $titulo->addAttribute('isbn', $libros[$i]['isbn']);
  $titulo->addAttribute('prueba', "prueba");
  $libro->addChild('autor', $libros[$i]['autor']);
  $libro->addChild('anio_publicacion', $libros[$i]['anio_publicacion']);
  $libro->addChild('foto_portada', $libros[$i]['foto_portada']);

}

header("Content-Type: text/xml");
echo $xml->asXML();
