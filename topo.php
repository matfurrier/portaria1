<?php 
	function carregaClasse($nomeDaClass){
		require_once("class/".$nomeDaClass.".php");
	}
	spl_autoload_register("carregaClasse");
	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("conexao.php");
	require_once("mostra_alerta.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0">
	<title>Portaria :: White Martins</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="alerta center-block">
			<?php  mostraAlerta("success"); ?>
			<?php mostraAlerta("danger"); ?>
		</div>
	</div>