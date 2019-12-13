<?php 
require_once("../admin/topo.php");

$id 					= $_POST['idUsuario'];
$nome					= $_POST['nome'];
$loginUsuario			= $_POST['login'];
$matricula				= $_POST['matricula'];
$senhaNova				= $_POST['novaSenha'];
$tipo					= $_POST['tipoUsuario'];

$senha = md5($senhaNova);

if ($loginUsuario == "") {
	$login = $_SESSION['loginDoUsuario'];
}else{
	$login = $loginUsuario;
}

$usuario = new Usuario($nome, $login, $senha, $matricula, $tipo);
	$usuario->setId($id);

	$usuarioDao = new UsuarioDao($con);
	if ($usuarioDao->alteraUsuario($usuario)){
		$_SESSION["success"] = "Alterações realizadas com sucesso!<br/>As alterações funcionarão a partir do próximo login.";
		header("Location: meusDados.php");
	}else{
		$_SESSION["danger"] = "As Alterações não puderam ser feitas! Entre em contato com o Administrador.";
		header("Location: meusDados.php");
}

//echo $idUsuario." - ".$nomeUsuario." - ".$login." - ".$matriculaUsuario." - ".$senha." - ".$tipoUsuario;

?>