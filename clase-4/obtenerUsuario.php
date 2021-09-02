<?php

/**
 * Obtiene informacion de un usuario a partir de su id
 * 
 * 1- Que llegue el ID => 400
 * 
 * 2- Existe ese ID?
 * 	=> 200 OK
 * 	=> 404 Not found (Recurso) 
 */

if (isset($_GET['id']) && !empty($_GET['id'])) {

 if ($_GET['id'] == 1) {

  $usuario = array(
		    'Nombre' => "Lionel",
		    'Apellido' => "Messi",
		    'email' => "liomessi@gmail.com"
		);
  $listar = json_encode($usuario);
  http_response_code(200);
  header("Content-Type: application/json");
  echo $listar;

 } else {
      
  http_response_code(404);
  header("Content-Type: application/json");
  $json_response = json_encode(array('Error' => "El usuario ingresado no existe"));
  echo $json_response;

 }

} else {

  http_response_code(400);

}

