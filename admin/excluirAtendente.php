<?php 
	require_once("topo.php");

	$id = $_POST['id'];

	$query = "SELECT * FROM port_usuarios WHERE id = '$id'";
	$resultado = mysqli_query($con, $query);
	$result = mysqli_fetch_assoc($resultado);

	$id 			= $result['id'];
	$nome 			= $result['nome'];
	$login 			= $result['login'];
	$senha 			= $result['senha'];
	$matricula		= $result['matricula'];
	$tipo			= $result['tipo'];

	//echo $id." - ".$nome." - ".$login." - ".$senha." - ".$matricula." - ".$tipo;

	$atendente = new Usuario($nome, $login, $senha, $matricula, $tipo);
	$atendente->setId($id);

	$atendenteDao = new UsuarioDao($con);
	if ($atendenteDao->excluiAtendente($atendente)) {
		$_SESSION["success"] = "Atendente excluido com sucesso!";
		header("Location: atendentes.php");
	}else{
		$_SESSION["danger"] = "Não foi possível excluir atendente! <br><div class='container'>".mysqli_error($con)."</div>";
		header("Location: atendentes.php");
	}
?>
