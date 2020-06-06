<?php

require_once("config.php");

$u = new Usuario();

$u->loadById(4);

//var_dump($u);

echo $u;