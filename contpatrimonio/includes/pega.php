<?php

$param = $_POST['param'];

if ($param != "") {
  echo 'Nada foi recebido.';
  exit;
}

// Do stuff...

echo 'Dados recebidos!';