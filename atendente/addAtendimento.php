<?php 
require_once("../admin/topo.php");

$local 					= $_POST['localId'];
$atendente				= $_POST['idDoUsuario'];
$data 					= date('Y-m-d H:i:s');
$dataAlterada			= "";
$cracha					= $_POST['cracha'];
$nomeVisitante			= $_POST['nome'];
$telefoneVisitante		= $_POST['telefone'];
$cpfVisitante			= $_POST['documento'];
$alfa					= $_POST['autorizacao'];
$status					= 1;
$tipo					= $_POST['tipo'];
$empresa				= $_POST['empresa'];
$area					= $_POST['area'];

$atendimento = new Atendimento($data, $dataAlterada, $cracha, $nomeVisitante, $telefoneVisitante, $cpfVisitante, $alfa, $status, $tipo, $empresa, $area);
$atendimento->setIdLocal($local);
$atendimento->setIdUsuario($atendente);

$atendimentoDao = new AtendimentoDao($con);

if ($atendimentoDao->insereAtendimento($atendimento)) {
	$_SESSION["success"] = "O atendimento foi iniciado!";
	header("Location: home.php");
}else{
	$_SESSION["danger"] = "Não foi possível iniciar atendimento!<br>".mysqli_error($con);
	header("Location: home.php");
}

?>