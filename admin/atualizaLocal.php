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

		$query = "SELECT * FROM port_local WHERE id_local = '$id'";
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
				<h2 class="text-uppercase"><strong>Atualizar Local</strong></h2>
			</div>

			<form action="updateLocal.php" method="POST">
				<input type="hidden" name="id" value="<?= $result['id_local']; ?>">
				<input type="hidden" name="nome" value="<?= $result['nome_local']; ?>">
				<input type="hidden" name="endereco" value="<?= $result['endereco_local']; ?>">

				<div class="col-lg-3">
					<label for="tel">Telefone:</label><br>
					<input type="text" id="tel" maxlength="14" onkeypress="this.value = MaskTelefone(event)" onpaste="return false;" name="telefone" class="form-control" value="<?= $result['telefone_local']; ?>"><br>
				</div>
				<div class="col-lg-3">
					<label for="responsavel">Responsável:</label><br>
					<input type="text" name="responsavel" id="responsavel" class="form-control" value="<?= $result['responsavel']; ?>"><br>
				</div><br>
				<div class="col-lg-3">
					<button type="submit" class="btn btn-primary text-uppercase" style="margin-top:5px;">
						<i class="fa fa-check" aria-hidden="true"></i>&nbsp Salvar Alterações
					</button>
				</div>
			</form>
		</div>