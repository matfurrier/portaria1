<?php 
	require_once("topo.php");

	$id 				= $_POST['id'];
	$nomeNovo			= $_POST['nome'];
	$loginNovo			= $_POST['login'];
	$senhaS 			= $_POST['senhaNova'];
	$matriculaNova		= $_POST['matricula'];
	$tipo				= "Atendente";

	$nomeBD			= $_POST['nomebd'];
	$loginBD		= $_POST['loginbd'];
	$matriculaBD	= $_POST['matriculabd'];
	$senhaBD		= $_POST['senhabd'];

	if ($senhaS == "") {
		$senha = $senhaBD;
	}else{
		$senha = md5($senhaS);
	}

	if ($nomeNovo == "") {
		$nome = $nomeBD;
	}else{
		$nome = $nomeNovo;
	}

	if ($loginNovo == "") {
		$login = $loginBD;
	}else{
		$login = $loginNovo;
	}

	if ($matriculaNova == "") {
		$matricula = $matriculaBD;
	}else{
		$matricula = $matriculaNova;
	}

	//echo $id." - ".$nome." - ".$login." - ".$senha." - ".$matricula." - ".$tipo;

	$atendente = new Usuario($nome, $login, $senha, $matricula, $tipo);
	$atendente->setId($id);

	$atendenteDao = new UsuarioDao($con);
	if($atendenteDao->alteraUsuario($atendente)){
		$_SESSION["success"] = "Alterações realizadas com sucesso!";
		header("Location: atendentes.php");
	}else{
		$_SESSION["danger"] = "As Alterações não puderam ser realizadas!<br><div class=\"container\">".mysqli_error($con)."</div>";
		header("Location: atendentes.php");
	}

?>