<?php 
require_once("../admin/topo.php");

$id_atendimento 		= $_POST['marcar'];

$resultado=mysqli_query($con, "SELECT * FROM port_atendimento WHERE id_atendimento = {$id_atendimento}");
$linhas=mysqli_num_rows($resultado);

while ($linhas = mysqli_fetch_array($resultado)) {
	$id_atendimento			= $linhas['id_atendimento'];
	$data					= $linhas['data'];
	$cracha 				= $linhas['cracha'];
	$nomeVisitante			= $linhas['nome_visitante'];
	$telefoneVisitante		= $linhas['telefone_visitante'];
	$cpfVisitante			= $linhas['cpf_visitante'];
	$alfa					= $linhas['alfa'];
	$tipo					= $linhas['tipo'];
	$empresa				= $linhas['empresa_visitante'];
	$area					= $linhas['area'];
}
	$status					= 0;
	$dataAlterada			= date("Y-m-d H:i:s");
	$localId				= $_SESSION['localId'];
	$usuarioId				= $_SESSION['idDoUsuario'];

$entrega = new Atendimento($data, $dataAlterada, $cracha, $nomeVisitante, $telefoneVisitante, $cpfVisitante, $alfa, $status, $tipo, $empresa, $area);
$entrega->setIdAtendimento($id_atendimento);
$entrega->setIdLocal($localId);
$entrega->setIdUsuario($usuarioId);

$atendimentoDao = new AtendimentoDao($con);

if ($atendimentoDao->entregaCracha($entrega)) { 
	$_SESSION["success"] = "O crachá (".$cracha.") foi entregue!";
	header("Location: home.php");
}else{
	$_SESSION["danger"] = "Erro ao entregar crachá!<br>".mysqli_error($con);
	header("Location: home.php");
}

?>