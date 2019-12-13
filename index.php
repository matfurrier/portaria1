<?php 
	require_once("topo.php");
	require_once("logica_usuario.php");
?>

<?php
if(usuarioEstaLogado()) {
	switch ($_SESSION['tipoDoUsuario']) {
		case '0':
			//Manda o usuário para sua respectiva tela
			header("location: admin/locais.php");
			break;
		case '1':
			//Manda o usuário para sua respectiva tela
			header("location: atendente/home.php");
			break;
		
		default:
			$_SESSION["danger"] = "Não foi possível acessar suas informações.";
			break;
	}
} else { ?>

<div class="container">
	<div class="form_login center-block">

		<header>
			<center><img class="logos" src="img/logo-m8d-branca.png" alt="M8D Engenharia" width="70%"></center>
		</header>
		<h2 class="text-center">Acesse sua conta!</h2>
		<form action="login.php" method="POST">
			<input type="text" name="login" placeholder="Login" class="form-control"><br>
			<input type="password" name="senha" placeholder="Senha" class="form-control"><br>
			<select name="local" class="form-control">
			<?php
				$localDao = new LocalDao($con);
				$locais = $localDao->listaLocal();
				foreach($locais as $local) :
			?>
				<option value="<?= $local->getId() ?>">
					<?= $local->getNome() ?>
				</option>
			<?php 
				endforeach 
			?>
			</select><br>
			<button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase">Entrar</button>
		</form>

		<p class="versao text-center text-uppercase">Versão: 1.0.0</p>
		<p class="desenvolvedor text-center">
			Desenvolvido por:
			<a href="https://buzios.digital" target="_blank">
				<img src="img/logo-bd-1.png" alt="Agência Búzios Digital" width="100">
			</a>
		</p>
	</div>
</div>
<?php
}
?>
<?php require_once("base.php"); ?>