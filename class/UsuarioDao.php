<?php 
	class UsuarioDao{	
		private $con;
		function __construct($con){
			$this->con = $con;
		}
		function listaAtendentes(){
			$usuarios = array();
			$resultado = mysqli_query($this->con, "SELECT * FROM port_usuarios WHERE tipo='1' ORDER BY nome asc ");
				
				while ($usuario_array = mysqli_fetch_assoc($resultado)) {

				$nome		= $usuario_array['nome'];
				$login		= $usuario_array['login'];
				$senha		= $usuario_array['senha'];
				$matricula	= $usuario_array['matricula'];
				$tipo		= $usuario_array['tipo'];

				$usuario = new Usuario($nome, $login, $senha, $matricula, $tipo);
				$usuario->setId($usuario_array['id']);

				array_push($usuarios, $usuario);
			}
			return $usuarios;
		}
		function alteraUsuario(Usuario $usuario){
			$query = "UPDATE port_usuarios 
					  SET nome='{$usuario->getNome()}', 
					  	  login='{$usuario->getLogin()}', 
					  	  matricula='{$usuario->getMatricula()}', 
					  	  senha='{$usuario->getSenha()}', 
					  	  tipo='{$usuario->getTipo()}' 
					  WHERE id='{$usuario->getId()}'";

			return mysqli_query($this->con, $query);
		}
		function insereAtendente(Usuario $usuario){
			$query = "INSERT INTO port_usuarios (`nome`, `login`, `senha`, `matricula`, `tipo`)
			VALUES ('{$usuario->getNome()}', '{$usuario->getlogin()}', '{$usuario->getSenha()}', '{$usuario->getMatricula()}', '{$usuario->getTipo()}')";

			return mysqli_query($this->con, $query);
		}
		function excluiAtendente(Usuario $usuario){
			$query = "DELETE FROM port_usuarios WHERE id = '{$usuario->getId()}'";
			return mysqli_query($this->con, $query);
		}
	}

?>