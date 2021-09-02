<?php

/**
 * Script que elimina recurso en DB (usuario)
 *
 */

if ($_GET['id']) {

    //Validar si existe ese ID
    //Elimino recurso en DB
    http_response_code(200);
    header("Content-Type: application/json");

} else {

  http_response_code(400);
  header("Content-Type: application/json");
  $json_response = json_encode(array('Error' => "No enviaste el ID"));
  echo $json_response;

}


