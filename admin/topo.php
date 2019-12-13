<?php 

	function carregaClasse($nomeDaClass){
		require_once("../class/".$nomeDaClass.".php");
	}
	
	spl_autoload_register("carregaClasse");

	require_once("../conexao.php");
	require_once("../logica_usuario.php");

	verificaUsuario();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0">
	<title>Portaria :: White Martins</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<!-- JS -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  	
	<script>
		function verificaNumero(e){
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				return false;
			}
		}
		$(document).ready(function(){
			$("#cpf").keypress(verificaNumero);
			$("#tel").keypress(verificaNumero);
			$("#cel").keypress(verificaNumero);
		});

		function FormataCpf(evt){
			vr = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
				if (vr.length == 3) vr = vr+".";
				if (vr.length == 7) vr = vr+".";
				if (vr.length == 11) vr = vr+"-";
			return vr;
		}
		function MaskTelefone(evt){
			tel = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
				if (tel.length == 0) tel = tel+"(";
				if (tel.length == 3) tel = tel+")";
				if (tel.length == 4) tel = tel+" ";
				if (tel.length == 9) tel = tel+"-";
			return tel;
		}
		function MaskCelular(evt){
			tel = (navigator.appName == 'Netscape') ?evt.target.value : evt.srcElement.value;
				if (tel.length == 0) tel = tel+"(";
				if (tel.length == 3) tel = tel+")";
				if (tel.length == 4) tel = tel+" ";
				if (tel.length == 10) tel = tel+"-";
			return tel;
		}
	</script>
</head>
<body class="admin">

		<header class="locais-admin">
			<div class="container">
				<div class="pull-left esquerda">
					<img src="../img/logos.png">
				</div>
				<div class="pull-right direita">
					<img src="../img/logo-m8d-1.png" class="pull-right">
				</div>
			</div>
		</header>

		<div class="guia">
			<div class="container">
				<p class="pull-left">Você está logado como: 
					<span class="text-primary">
						<?php
							if($_SESSION['tipoDoUsuario'] == "Administrador" || $_SESSION['tipoDoUsuario'] == "Supervisor"){
								echo $_SESSION['tipoDoUsuario'];
							}else{
								echo $_SESSION['loginDoUsuario'];
							}
						?>
					</span>
				</p>
				<button class="pull-right btn btn-danger text-uppercase" onclick="location.href = '../sair.php';"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp sair</button>
			</div>
		</div>