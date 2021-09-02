<?php

/**
 * Script que actualiza recurso en DB (usuario)
 *
 */

$json_input = json_decode(file_get_contents('php://input'));

if ($json_input) {

  if ($json_input->id == "") {

    http_response_code(400);
    header("Content-Type: application/json");
    $json_response = json_encode(array('Error' => "Debe ingresar el ID del recurso"));
    echo $json_response;
  } else {

    //Actualizo recurso en DB
    http_response_code(200);
    header("Content-Type: application/json");
    $json_response = json_encode(array("id" => $json_input->id, 
			   "nombre" => $json_input->nombre, 
			   "apellido" => $json_input->apellido,
			   "email" => $json_input->email
			));
    echo $json_response;
  }

} else {

  http_response_code(400);
  header("Content-Type: application/json");
  $json_response = json_encode(array('Error' => "No enviaste un JSON"));
  echo $json_response;

}


