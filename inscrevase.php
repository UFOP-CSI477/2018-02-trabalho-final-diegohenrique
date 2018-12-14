<?php 
  
  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
  include_once('funcoes.php');
  cabecalho();
?>

	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Inscreva-se já!</h3>
	    		<br />
				<form method="post" action="registra_usuario.php" id="formCadastrarse">
					<div class="form-group">
						<label for="usuario">Usuário:</label>
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite o nome do usuário" required="requiored">
					</div>

					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required="requiored">
					</div>
					
					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required="requiored">
					</div>

					<!-- <div class="form-group">
					
						<label for="tipo">Tipo</label>
						<select name="tipo" id="tipo" class="form-control">
							
							<option value="0" selected>Cliente</option>
							<option value="1">Administrador</option>
						</select>	
					
					</div> -->

					<div class="checkbox">
					  <label for="termos"> 
					    <input type="checkbox" required=""> Aceito os termos do serviço.
					  </label>
					</div>
					
					<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
				</form>
			</div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>

<?php 
rodape();
 ?>
 