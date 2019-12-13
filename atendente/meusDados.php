<?php 
	require_once("../admin/topo.php");

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
						<a href="home.php"><i class="fas fa-home"></i>&nbsp Home</a>
					</li>
					<li role="presentation">
						<a href="provisorios.php"><i class="far fa-clock"></i></i>&nbsp Provisórios</a>
					</li>
					<li role="presentation">
						<a href="retornoProvisorio.php"><i class="fas fa-arrow-left"></i>&nbsp Retorno Provisórios</a>
					</li>
					<li role="presentation">
						<a href="visitantes.php"><i class="fas fa-male"></i>&nbsp Visitantes</a>
					</li>
					<li role="presentation">
						<a href="retornoVisitante.php"><i class="fas fa-arrow-left"></i>&nbsp Retorno Visitantes</a>
					</li>
					<li role="presentation" class="active">
						<a href=""><i class="fas fa-cog"></i>&nbsp Meus Dados</a>
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

		<form action="editaUsuario.php" method="POST">
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
			<div class="col-lg-3"><br>
				<button type="submit" class="btn btn-primary text-uppercase" style="margin-top: 5px;"><i class="fa fa-check" aria-hidden="true"></i>&nbsp Salvar alterações</button>
			</div>
		</form>
	</div>
<?php require_once("../admin/base.php"); ?>