<?php 
session_start();

function usuarioEstaLogado(){
	return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario(){
	if (!usuarioEstaLogado()) {
		$_SESSION["danger"] = "Área restrita! Por favor, identifique-se.";
		header("Location: ../index.php");
		die();
	}
}

function usuarioLogado(){
	return $_SESSION["usuario_logado"];
}

function logaUsuario($login){
	$_SESSION["usuario_logado"] = $login;

	switch ($_SESSION['tipoDoUsuario']) {
		case '0':
			//Manda o usuário para página de Administrativo
			header("location: admin/locais.php");
		break;
		case '1':
			//Manda o usuário para página de Atendente
			header("location: atendente/home.php");
		break;
		
		default:
			$_SESSION["danger"] = "Não foi possível acessar suas informações.";
		break;
	}
}

function logout(){
	session_destroy();
	session_start();
}