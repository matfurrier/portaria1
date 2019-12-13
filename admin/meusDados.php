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
					<li role="presentation">
						<a href="atendentes.php"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp Atendentes</a>
					</li>
					<li role="presentation" class="active">
						<a href=""><i class="fa fa-cog" aria-hidden="true"></i>&nbsp Meus Dados</a>
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

		<div class="titulo">
			<h2 class="text-uppercase"><strong>Meus dados</strong></h2>
		</div>

		<form action="atualizaDados.php" method="POST">
			<input type="hidden" name="idUsuario" value="<?= $_SESSION['idDoUsuario'] ?>">
			<input type="hidden" name="tipoUsuario" value="<?= $_SESSION['tipoDoUsuario'] ?>">
			<input type="hidden" name="matricula" value="<?= $_SESSION['matriculaDoUsuario'] ?>">
			<div class="col-lg-3">
				<label for="nome">Nome:</label><br>
				<input type="text" name="nome" id="nome" value="<?= $_SESSION['nomeDoUsuario'] ?>" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="login">Nome de usuário:</label><br>
				<input type="text" name="login" id="login" placeholder="<?= $_SESSION['loginDoUsuario'] ?>" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="senha">Nova Senha:</label><br>
				<input type="password" name="novaSenha" id="senha" class="form-control" required><br>
			</div>
			<button type="submit" class="btn btn-primary text-uppercase" style="margin-top: 27px;"><i class="fa fa-check" aria-hidden="true"></i>&nbsp Salvar alterações</button>
		</form>
	</div>
<?php require_once("base.php"); ?>