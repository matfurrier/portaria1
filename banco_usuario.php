<?php 
	require_once("conexao.php");

	function buscaUsuario($con, $login, $senha, $local){

		$senhaMd5 = md5($senha);
		$login = mysqli_real_escape_string($con, $login);

		$query = "SELECT u.*, l.* FROM port_usuarios AS u
		JOIN port_local AS l
		WHERE u.login='{$login}' AND 
			  u.senha='{$senhaMd5}' AND 
			  l.id_local='{$local}' 
		LIMIT 1";

		$resultado = mysqli_query($con, $query);
		$usuario = mysqli_fetch_assoc($resultado);

		//Define os valores atribuidos na sessão do usuário
		$_SESSION['idDoUsuario'] 			= $usuario['id'];
		$_SESSION['nomeDoUsuario'] 			= $usuario['nome'];
		$_SESSION['loginDoUsuario'] 		= $usuario['login'];
		$_SESSION['senhaDoUsuario'] 		= $usuario['senha'];
		$_SESSION['matriculaDoUsuario'] 	= $usuario['matricula'];
		$_SESSION['tipoDoUsuario'] 			= $usuario['tipo'];
		$_SESSION['localId'] 				= $usuario['id_local'];

		return $usuario;
	}