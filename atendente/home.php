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
						<li role="presentation" class="active">
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
						<li role="presentation">
							<a href="meusDados.php"><i class="fas fa-cog"></i>&nbsp Meus Dados</a>
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
				<h2 class="text-uppercase"><strong>Atendimentos em andamento</strong></h2>
			</div>

			<table class="tabela table table-striped">
				<thead>
					<tr>
						<td>Número do crachá</td>
						<td>Nome do visitante</td>
						<td>Documento do visitante</td>
						<td>Telefone do visitante</td>
						<td>Autorização</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$atendimentoDao = new AtendimentoDao($con);
						$atendimentos = $atendimentoDao->listaAtendimentoAtendente();
						foreach($atendimentos as $atendimento) :

							if($atendimento->getStatus() == 0){
								echo "<tr>";
									echo "<td>Ainda não há atendimento neste local.</td>";
								echo "</tr>";
							}else{
					?>
						<tr>
							<td><?= $atendimento->getCracha() ?></td>
							<td><?= $atendimento->getNomeVisitante() ?></td>
							<td><?= $atendimento->getCpfVisitante() ?></td>
							<td><?= $atendimento->getTelefoneVisitante() ?></td>
							<td><?= $atendimento->getAlfa() ?></td>
						</tr>
					<?php 
							}
						endforeach 
					?>
				</tbody>
			</table>
		</div>
<?php require_once("../admin/base.php"); ?>