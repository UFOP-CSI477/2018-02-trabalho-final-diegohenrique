<?php 

function cabecalho()
{
	require_once('db.class.php');
	session_start();
	?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>BRASFUT - A sua Loja de Camisas de Futebol</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo.css">
	
	</head>

	<body>

		<nav class="navbar navbar-expand-md navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="index.php">
		        <img src="imagens/brasfut_logo.png" alt="Logo Brasfut" style="width:90; height:35px;"/>
		      </a>
		       
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
	        	
	        	<?php 

	        	if(isset($_SESSION['usuario'])){
	        		echo '<div class="col-md-4"> 
				  	<br/>
				  	<div style="color:#FFF">Seja bem vindo, '.$_SESSION['usuario'].'.</div>
				  </div>';
				 } 
				?>
	            <div id="navbar" class="navbar-collapse collapse">
	              <ul class="nav navbar-nav navbar-right">
					<?php 
						if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
					 
	                echo '<li class="nav-item"><a href="listarProdutos.php"><span class="glyphicon glyphicon-list-alt"></span>  Listar Produtos</a></li>';
	            }
	                ?>
	                <li class="nav-item"><a href="contato.php"><span class="glyphicon glyphicon-envelope"></span>  Contato</a></li>
	                <li class="nav-item"><a href="inscrevase.php"><span class="glyphicon glyphicon-user"></span>  Inscreva-se</a></li>
	                
	                  <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li> -->
	                  <?php
	                  if (isset($_SESSION['usuario'])) {
	                  	echo '<li class="nav-item"><a class="nav-link" href="exit.php"><span class="glyphicon glyphicon-log-out"></span>  Sair</a></li> ';
	                  }else{
	                  	echo '<li class="1">
	                  <a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span>  Entrar</a>
	                    <ul class="dropdown-menu" aria-labelledby="entrar">
	                    <div class="col-md-12">
	                    <p>Você possui uma conta?</p>
	                    <br />
	                      <form method="post" action="validar_acesso.php" id="formLogin">
	                        <div class="form-group">
	                            <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
	                        </div>
	                                
	                        <div class="form-group">
	                          <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
	                        </div>
	                                
	                        <button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

	                        <br /><br />
	                                
	                      </form>';
	                      $erro="";
	                    if ($erro == 1) {
	                      echo '<font color="#FF0000"> Usuário e ou senha inválido(s)</font>';
	                    }
	          
	                  echo'
	                  </div>
	                  </ul>
	                </li>';
	                  }
	                  ?>
	                                
	              </ul>
	            </div>
	          </div>
	        </nav>
	<?php

}

function rodape(){ 
?>
	<footer class="page-footer font-small teal pt-4">
	<div class="container-fluid text-center text-md-left">
	    <div class="rodape">
	      <div class="row"> 
	        <div class="col-md-3"></div>
	          <div class="col-md-6">
	            <h3>Atendimento</h3>
	            <h6 class="rodape-horario">Estamos disponivel das 8:30 ás 18:30 de Segunda à Sexta, sabádos e Domingos apenas por telefone!</h6>
	            <!-- <span class="right">Todos os direitos reservados 2013 - 2014</span>  -->
	            <div class="footer-copyright text-center py-3">© 2018 Copyright:
	              <a href="index.php"> BrasFut.com</a>
	            </div>
	          </div>
	          <div class="col-md-3"></div>
	      </div>
	    </div>
	  </div>
	</footer>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
		</body>
	</html>
	<?php 
}

function autenticar()
{
	if(!isset($_SESSION['tipo'])){
		echo '
		<script> alert("Você tem que conectar para acessar essa tela");
		window.location.href = "exit.php";
		</script>';
	}
}

function mostrarProduto($id, $nome, $descricao, $preco, $imagem, $qtd)
{
	echo '<div class="col-md-3">
	<form action="pagamento.php" method="get" accept-charset="utf-8">
              <div class="card" style="width: 18rem; text-align: center">
                  <img class="card-img-top" src="imagens/'.$imagem.'.jpg" alt="'.$nome.'" style="width: 50%;">
                  <div class="card-body">
                  <h5 class="card-title">'.$nome.'</h5>
                  <h5>'.$descricao.'</h5>
                  <h5>R$'.$preco.'</h5>
                  <input type="number" name="qtd" max="'.$qtd.'" min="1" value="1"><br>
                  <input type="hidden" name="idproduto" value="'.$id.'">
                  <input type="submit" value="Comprar" class="btn btn-primary">
                  </div>
              </div>
              </form>
            </div>';
}
