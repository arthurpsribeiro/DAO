<?php

require_once("config.php");

// carrega um usuário
//$u = new Usuario();
//$u->loadById(4);
//echo $u;

// carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

// carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("ma");
//echo json_encode($search);

// carrega um usuário usando o login e a senha
$usuario = new Usuario();
$usuario->login("maria", "lkjhgfd");
echo $usuario;