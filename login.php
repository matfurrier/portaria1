<?php 
require_once("banco_usuario.php");
require_once("logica_usuario.php");

$usuario = buscaUsuario($con, $_POST['login'], $_POST['senha'], $_POST['local']);

if ($usuario == null) {
	$_SESSION["danger"] = "Digite os campos corretamente.";
	header("Location: index.php");
}else{
	logaUsuario($usuario['login']);
}
die();