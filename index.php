<?php

require_once("config.php");
/*Carrega um usuário
$root = new Usuario();

$root->loadById(4);

echo $root;
*/

/*Carrega uma lista de usuários
$lista = Usuario::getList();

echo json_encode($lista);
*/

/*Carrega uma lista de usuários pelo login
$search = Usuario::search("us");

echo json_encode($search);
*/

/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);
*/	

//Carrega um usuário usando login e senha
$usuario = new Usuario();
$usuario->login("root", "!@#$");

echo $usuario;
?>