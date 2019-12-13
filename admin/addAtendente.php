<?php 
require_once("topo.php");

$nome 			= $_POST['nome'];
$login 			= $_POST['login'];
$senhaS 		= $_POST['senha'];
$matricula		= $_POST['matricula'];
$tipo 			= "Atendente";

$senha = md5($senhaS);

//echo $nome." - ".$login." - ".$senha." - ".$matricula." - ".$tipo;

$atendente = new Usuario($nome, $login, $senha, $matricula, $tipo);
$atendenteDao = new UsuarioDao($con);

if ($atendenteDao->insereAtendente($atendente)) {
	$_SESSION["success"] = "Sucesso ao adicionar atendente!";
	header("Location: atendentes.php");
}else{
	$_SESSION["danger"] = "Não foi possível adicionar atendente! <br><div class='container'>".mysqli_error($con)."</div>";
	header("Location: atendentes.php");
}

?>