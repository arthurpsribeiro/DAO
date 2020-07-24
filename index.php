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
//$usuario = new Usuario();
//$usuario->login("maria", "lkjhgfd");
//echo $usuario;

// inserindo novo usuário
//$aluno = new Usuario("lucas", "senhalucas");
//$aluno->insert();
//echo $aluno;

// fazendo update 
//$usuario = new Usuario();
//$usuario->loadById("7");
//$usuario->update("professor", "asdfgh");
//echo $usuario;

// fazendo delete 
$usuario = new Usuario();
$usuario->loadById("9");
$usuario->delete();
echo $usuario;



