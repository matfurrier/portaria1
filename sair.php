<?php 
	require_once("logica_usuario.php");
	
	logout();
	//$_SESSION["success"] = "Ótimo serviço, bom descanso!";
	header("Location: index.php");
	die();