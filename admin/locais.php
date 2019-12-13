<?php 
	require_once("topo.php");

	function mostraAlerta($tipo) {
		if(isset($_SESSION[$tipo])) { ?>
		<p class="text-center alert-<?= $tipo ?>"><?= $_SESSION[$tipo]?></p>
		<?php 
			unset($_SESSION[$tipo]);
		} 
	}
?>

	<div class="container">

		<div class="menu_admin">
			<nav>
				<ul class="nav nav-pills center-block">
					<li role="presentation" class="active">
						<a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp Locais de Atendimento</a>
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
			<h2 class="text-uppercase"><strong>Novo Local</strong></h2>
		</div>

		<form action="addLocal.php" method="POST">
			<div class="col-lg-3">
				<label for="local">Local:</label><br>
				<input type="text" name="local" id="local" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="endereco">Endereco:</label><br>
				<input type="text" name="endereco" id="endereco" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="telefone">Telefone:</label><br>
				<input type="text" id="tel" maxlength="14" onkeypress="this.value = MaskTelefone(event)" onpaste="return false;" name="telefone" id="telefone" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="responsavel">Responsável:</label><br>
				<input type="text" name="responsavel" id="responsavel" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<button type="submit" class="btn btn-primary text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp Adicionar Local</button>
			</div>
		</form>

		<p>&nbsp</p>
		<div class="titulo">
			<h2 class="text-uppercase"><strong>Locais de Atendimento</strong></h2>
		</div>

		<table class="tabela table table-striped">
			<thead>
				<tr>
					<td>Locais de Atendimento</td>
					<td>Endereço</td>
					<td>Telefone</td>
					<td>Responsável</td>
					<td>Ações</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$localDao = new LocalDao($con);
					$locais = $localDao->listaLocal();
					foreach($locais as $local) :
				?>
					<tr>
						<td><?= $local->getNome() ?></td>
						<td><?= $local->getEndereco() ?></td>
						<td><?= $local->getTelefone() ?></td>
						<td><?= $local->getResponsavel() ?></td>
						<td>
							<form action="atualizaLocal.php" method="POST">
								<input type="hidden" name="id" value="<?= $local->getId() ?>">
								<button type="submit" class="btn btn-primary">
									<i class="fas fa-edit"></i>&nbsp atualizar
								</button>
							</form>
							&nbsp
							<form action="excluirLocal.php" method="POST">
								<input type="hidden" name="id" value="<?= $local->getId() ?>">
								<button type="submit" class="btn btn-danger">
									<i class="fa fa-trash" aria-hidden="true"></i>&nbsp excluir
								</button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
<?php require_once("base.php"); ?>