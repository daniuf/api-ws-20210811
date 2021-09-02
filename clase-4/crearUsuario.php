<?php

/**
 * Script que crea recursos en DB (usuario)
 *
 */

$json_input = json_decode(file_get_contents('php://input'));

if ($json_input) {

  if (($json_input->nombre == "") || ($json_input->apellido == "") || ($json_input->email == "")) {

    http_response_code(400);
    header("Content-Type: application/json");
    $json_response = json_encode(array('Error' => "Falta el nombre, o apellido o email"));
    echo $json_response;
  } else {

    http_response_code(201);
    header("Content-Type: application/json");
    $json_response = json_encode(array("id" => uniqid(), 
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


