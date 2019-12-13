<?php 
	require_once("../admin/topo.php");

	$idDoLocal = $_POST['local'];

	$sql = "SELECT a.*, l.* FROM port_atendimento AS a
	INNER JOIN port_local AS l
	ON a.local_id = l.id_local
	WHERE tipo='provisorio' AND local_id =".$idDoLocal."";

	$resultado=mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($resultado);
?>
	<div class="container">
		<div class="titulo">
			<h2 class="text-uppercase"><strong><?php echo "Unidade: ". $row['nome_local']; ?></strong></h2>
		</div>
		<table class="tabela table table-striped">
			<thead>
				<tr>
					<td>Crachá</td>
					<td>Nome</td>
					<td>Horário da Entrada</td>
					<td>Documento</td>
					<td>Telefone</td>
					<td>Alfa</td>
				</tr>
			</thead>
			<?php
				$query = "SELECT a.*, l.* 
						  FROM port_atendimento AS a
						  JOIN port_local AS l
						  ON a.local_id = l.id_local
						  WHERE a.local_id =".$row['local_id']."
						  AND a.tipo='visitante' 
						  AND a.status=1 
						  AND a.data < DATE_SUB(NOW(), INTERVAL 8 HOUR)
						  ORDER BY data desc";

				$result	= mysqli_query($con, $query);
				$row = mysqli_num_rows($result);
			?>
			<tbody>
				<?php
					if ($row == 0) {
						echo "<tr>";
							echo "<td>Nenhum atendimento encontrado</td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
						echo "</tr>";
					}else{
					while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?=$row['cracha']?></td>
						<td><?=$row['nome_visitante']?></td>
						<td><?=$row['data']?></td>
						<td><?=$row['cpf_visitante']?></td>
						<td><?=$row['telefone_visitante']?></td>
						<td><?=$row['alfa']?></td>
					</tr>
				<?php
					}}
				?>
			</tbody>
		</table>
	
		<div class="print">
			<button onClick="imprimir()" class="btn btn-primary">Imprimir</button>
		</div>
	</div>

	<!-- JavaScript -->
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript">
		function imprimir(){
			window.print();
		}
	</script>
<?php require_once("../admin/base.php"); ?>