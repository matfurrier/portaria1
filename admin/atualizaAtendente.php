<?php 
	require_once("topo.php");
	error_reporting(0);

	function mostraAlerta($tipo) {
		if(isset($_SESSION[$tipo])) { ?>
		<p class="text-center alert-<?= $tipo ?>"><?= $_SESSION[$tipo]?></p>
		<?php 
			unset($_SESSION[$tipo]);
		} 
	}

		$id = $_POST['id'];
		//echo $id;

		$query = "SELECT * FROM port_usuarios WHERE id = '$id'";
		$resultado = mysqli_query($con, $query);
		$result = mysqli_fetch_assoc($resultado);
?>
		<div class="container">
			<div class="menu_admin">
				<nav>
					<ul class="nav nav-pills center-block">
						<li role="presentation">
							<a href="locais.php"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp Locais de Atendimento</a>
						</li>
						<li role="presentation">
							<a href="atendentes.php"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp Atendentes</a>
						</li>
						<li role="presentation">
							<a href="meusDados.php"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp Meus Dados</a>
						</li>
					</ul>
				</nav>
			</div>

			<div class="container">
				<div class="alerta center-block">
					<?php  mostraAlerta("success"); ?>
					<?php mostraAlerta("danger"); ?>
				</div>
			</div>

			<div class="titulo2">
				<h2 class="text-uppercase"><strong>Atualizar Atendente</strong></h2>
			</div>

			<form action="updateAtendente.php" method="POST">
				<input type="hidden" name="id" value="<?= $result['id']; ?>">
				<input type="hidden" name="nomebd" value="<?= $result['nome']; ?>">
				<input type="hidden" name="loginbd" value="<?= $result['login']; ?>">
				<input type="hidden" name="matriculabd" value="<?= $result['matricula']; ?>">
				<input type="hidden" name="senhabd" value="<?= $result['senha']; ?>">
				<div class="col-lg-3">
					<label for="nome">Nome:</label><br>
					<input type="text" name="nome" id="nome" class="form-control" placeholder="<?= $result['nome']; ?>"><br>
				</div>
				<div class="col-lg-3">
					<label for="login">Login:</label><br>
					<input type="text" name="login" id="login" class="form-control" placeholder="<?= $result['login']; ?>"><br>
				</div>
				<div class="col-lg-3">
					<label for="matricula">Número da matricula:</label><br>
					<input type="text" name="matricula" id="matricula" class="form-control" placeholder="<?= $result['matricula']; ?>"><br>
				</div>
				<div class="col-lg-3">
					<label for="senha">Nova Senha:</label><br>
					<input type="password" name="senhaNova" id="senha" class="form-control"><br>
				</div><br>
				<div class="col-lg-3">
					<button type="submit" class="btn btn-primary text-uppercase">
						<i class="fa fa-check" aria-hidden="true"></i>&nbsp Salvar Alterações
					</button>
				</div>
			</form>
		</div>