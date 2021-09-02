<?php

/**
 * Listar usuarios con TOKEN de autenticacion
 *
 * 
 * Tabla: token
   - email
   - token
   - fechahora_creacion

  * Tabla: token_request
   - token
   - fechahora
 */

define("TOKEN", "fgchjbhhbvghjhhkggjhk1234444");

if ($_SERVER['HTTP_TOKEN'] == TOKEN) {

  $usuarios = array(
		  array(
		    'Nombre' => "Juan",
		    'Apellido' => "Perez",
		    'email' => "daniuf@gmail.com"
		  ),
		  array(
		    'Nombre' => "Lionel",
		    'Apellido' => "Messi",
		    'email' => "liomessi@gmail.com"
		  ),
		);

  $listar = json_encode($usuarios);
  http_response_code(200);
  header("Content-Type: application/json");
  echo $listar;

} else {

  http_response_code(403);
  header("Content-Type: application/json");
  $json = json_encode(array('Error' => "Usuario no autorizado"));
  echo $json;
}

