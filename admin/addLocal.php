<?php 
require_once("topo.php");

$nome 			= $_POST['local'];
$endereco 		= $_POST['endereco'];
$telefone 		= $_POST['telefone'];
$responsavel 	= $_POST['responsavel'];

$local = new Local($nome, $telefone, $endereco, $responsavel);
$localDao = new LocalDao($con);

if ($localDao->insereLocal($local)) { 
	$_SESSION["success"] = "Sucesso ao adicionar local!";
	header("Location: locais.php");
}else{
	$_SESSION["danger"] = "Não foi possível adicionar local! <br><div class='container'>".mysqli_error($con)."</div>";
	header("Location: locais.php");
}

?>