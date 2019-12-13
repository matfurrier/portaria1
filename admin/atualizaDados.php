<?php 
require_once("topo.php");

$id 					= $_POST['idUsuario'];
$nome					= $_POST['nome'];
$loginUsuario			= $_POST['login'];
$matricula				= $_POST['matricula'];
$senhaNova				= $_POST['novaSenha'];
$tipo					= $_POST['tipoUsuario'];

if ($loginUsuario == "") {
	$login = $_SESSION['loginDoUsuario'];
}else{
	$login = $loginUsuario;
}

if ($senhaNova == "") {
	$senha = $_SESSION['senhaDoUsuario'];
}else{
	$senha = md5($senhaNova);
}

//echo $id." - ".$nome." - ".$login." - ".$matricula." - ".$senha." - ".$tipo;

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

?>