<?php

function loguear($modo, $nombre_archivo, $mensaje) {

  $date = new DateTime();
  $datetime = $date->format("Y-m-d H:i:s");

  $fp = fopen($nombre_archivo, $modo);
  fwrite($fp, "[".$datetime."]\t".$mensaje.PHP_EOL);
  fclose($fp);

}
