<?php require_once("../admin/topo.php"); ?>
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
					<li role="presentation" class="active">
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

			<div class="titulo">
				<h2 class="text-uppercase"><strong>Entrega de Crachás Provisório</strong></h2>
			</div>
			<form action="entregaCracha.php" method="POST">
				<table class="tabela table table-striped">
					<thead>
						<tr>
							<td>#</td>
							<td>Número do crachá</td>
							<td>Nome do visitante</td>
							<td>Documento do visitante</td>
							<td>Telefone do visitante</td>
							<td>Autorização</td>
							<td>Empresa/Área</td>
						</tr>
					</thead>
					<tbody>
						<?php
							$atendimentoDao = new AtendimentoDao($con);
							$atendimentos = $atendimentoDao->listaAtendimentoAtendenteProvisorio();
							foreach($atendimentos as $atendimento) :

								if($atendimento->getStatus() == 0){
									echo "<tr>";
										echo "<td>Ainda não há atendimento neste local.</td>";
									echo "</tr>";
								}else{
						?>
							<tr>
								<td><button type="submit" name="marcar" value="<?= $atendimento->getIdAtendimento()?>" class="btn btn-primary text-uppercase"><i class="fa fa-check" aria-hidden="true"></i>&nbsp Entregue</button></td>
								<td><?= $atendimento->getCracha() ?></td>
								<td><?= $atendimento->getNomeVisitante() ?></td>
								<td><?= $atendimento->getCpfVisitante() ?></td>
								<td><?= $atendimento->getTelefoneVisitante() ?></td>
								<td><?= $atendimento->getAlfa() ?></td>
								<td><?= $atendimento->getAreaVisitada() ?></td>
							</tr>
						<?php 
								}
							endforeach 
						?>
					</tbody>
				</table>
			</form>
	</div>
<?php require_once("../admin/base.php"); ?>