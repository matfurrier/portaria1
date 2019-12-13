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
					<li role="presentation">
						<a href="retornoProvisorio.php"><i class="fas fa-arrow-left"></i>&nbsp Retorno Provisórios</a>
					</li>
					<li role="presentation" class="active">
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
			<h2 class="text-uppercase"><strong>Adicionar Atendimento</strong></h2>
		</div>

		<form action="addAtendimento.php" method="POST" class="adicionaVisitante">

			<input type="hidden" name="idDoUsuario" value="<?= $_SESSION['idDoUsuario'] ?>">
			<input type="hidden" name="localId" value="<?= $_SESSION['localId'] ?>">
			<input type="hidden" name="tipo" value="visitante">

			<div class="col-lg-3">
				<label for="cracha">Número do crachá:</label><br>
				<input type="text" name="cracha" id="cracha" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="nome">Nome do visitante:</label><br>
				<input type="text" name="nome" id="nome" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="empresa">Empresa do visitante:</label><br>
				<input type="text" name="empresa" id="empresa" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="documento">Documento do visitante:</label><br>
				<input type="text" id="cpf" maxlength="14" onkeypress="this.value = FormataCpf(event)" onpaste="return false;" name="documento" id="documento" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="telefone">Telefone do visitante:</label><br>
				<input type="text" id="cel" maxlength="15" onkeypress="this.value = MaskCelular(event)" onpaste="return false;" name="telefone" id="telefone" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="autorizacao">Autorização:</label><br>
				<input type="text" name="autorizacao" id="autorizacao" class="form-control"><br>
			</div>
			<div class="col-lg-3">
				<label for="area">Área Visitada:</label><br>
				<input type="text" name="area" id="area" class="form-control"><br>
			</div>
			<div class="col-lg-3"><br>
				<button type="submit" class="btn btn-primary text-uppercase" style="margin-top: 5px;"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp Adicionar Atendimento</button>
			</div>
		</form>
		
		<p>&nbsp</p>
		<p>&nbsp</p>
		<div class="titulo">
			<h2 class="text-uppercase"><strong>Relatório de Visitas Provisórias</strong></h2>
		</div>
		<div class="col-lg-3">
			<form action="gerarRelatorioVisitantes.php" method="POST">
				<button type="submit" class="btn btn-primary text-uppercase" name="local" value="<?= $_SESSION['localId'];?>" onclick="$('form').attr('target', '_blank');"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp Gerar Relatório</button>
			</form>
		</div>

		<p>&nbsp</p>
		<div class="titulo">
			<h2 class="text-uppercase"><strong>Atendimentos de Visitantes</strong></h2>
		</div>
			<table class="tabela table table-striped">
				<thead>
					<tr>
						<td>Número do crachá</td>
						<td>Nome do visitante</td>
						<td>Empresa do visitante</td>
						<td>Documento do visitante</td>
						<td>Telefone do visitante</td>
						<td>Nome do Visitado</td>
						<td>Área Visitada</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$atendimentoDao = new AtendimentoDao($con);
						$atendimentos = $atendimentoDao->listaAtendimentoAtendenteVisitantes();
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
							<td><?= $atendimento->getEmpresaVisitante() ?></td>
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
	</div>
<?php require_once("../admin/base.php"); ?>