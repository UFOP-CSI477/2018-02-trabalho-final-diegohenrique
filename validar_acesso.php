<?php 
	
	session_start();

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$sql = "SELECT usuario, email, tipo FROM usuarios WHERE usuario = '$usuario' AND senha= '$senha' ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id =	mysqli_query($link, $sql);

	if ($resultado_id) {
		
		$dados_usuario = mysqli_fetch_array($resultado_id);
		//var_dump($dados_usuario);
		if (isset($dados_usuario['usuario'])) {
			//echo "Usuário existe";
			
			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['email'] = $dados_usuario['email'];
			$_SESSION['tipo'] = $dados_usuario['tipo'];
			
			if($dados_usuario['tipo'] == 0){
				//Se é cliente
				header('Location: index.php');
			}else{
				//Senão é administrador
				header('Location: listarProdutos.php');
			}
		} else {
			//echo "Usuário não existe!";
			header('Location: index.php?erro=1');
		}
	} else {
		echo "Erro na execução da consulta, favor entrar em contato com o Administrador do site";
	}

 ?>