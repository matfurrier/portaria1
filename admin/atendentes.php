<?php require_once("topo.php"); 

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
						<li role="presentation">
							<a href="locais.php"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp Locais de Atendimento</a>
						</li>
						<li role="presentation" class="active">
							<a href=""><i class="fa fa-phone" aria-hidden="true"></i>&nbsp Atendentes</a>
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
				<h2 class="text-uppercase"><strong>Novo Atendente</strong></h2>
			</div>

			<form action="addAtendente.php" method="POST">
				<div class="col-lg-3">
					<label for="nome">Nome do atendente:</label><br>
					<input type="text" name="nome" id="nome" class="form-control"><br>
				</div>
				<div class="col-lg-3">
					<label for="login">Nome de usuário:</label><br>
					<input type="text" name="login" id="login" class="form-control"><br>
				</div>
				<div class="col-lg-3">
					<label for="senha">Senha:</label><br>
					<input type="password" name="senha" id="senha" class="form-control"><br>
				</div>
				<div class="col-lg-3">
					<label for="matricula">Número da matricula:</label><br>
					<input type="text" name="matricula" id="matricula" class="form-control"><br>
				</div>
				<div class="col-lg-3">
					<button type="submit" class="btn btn-primary text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp Adicionar Atendente</button>
				</div>
			</form>
			
			<p>&nbsp</p>
			<div class="titulo">
				<h2 class="text-uppercase"><strong>Atendentes</strong></h2>
			</div>

			<table class="tabela table table-striped">
				<thead>
					<tr>
						<td>Nome do atendente</td>
						<td>Nome de usuário</td>
						<td>Número da matricula</td>
						<td>Ações</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$atenDao = new UsuarioDao($con);
						$atendentes = $atenDao->listaAtendentes();
						foreach ($atendentes as $atendente) { 
					?>
					<tr>
						<td><?= $atendente->getNome(); ?></td>
						<td><?= $atendente->getLogin(); ?></td>
						<td><?= $atendente->getMatricula(); ?></td>
						<td>
							<form action="atualizaAtendente.php" method="POST">
								<input type="hidden" name="id" value="<?= $atendente->getId(); ?>">
								<button type="submit" class="btn btn-primary">
									<i class="fas fa-edit"></i>&nbsp atualizar
								</button>
							</form>
							&nbsp
							<form action="excluirAtendente.php" method="POST">
								<input type="hidden" name="id" value="<?= $atendente->getId(); ?>">
								<button type="submit" class="btn btn-danger">
									<i class="fa fa-trash" aria-hidden="true"></i>&nbsp excluir
								</button>
							</form>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
<?php require_once("base.php"); ?>