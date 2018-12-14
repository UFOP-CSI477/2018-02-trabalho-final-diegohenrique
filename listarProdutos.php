<?php 
	include_once('funcoes.php');
	cabecalho();

			$objDb = new db();
    		$link = $objDb->conecta_mysql();

    if(isset($_GET['excluir'])){

    		$sql_produtos = "DELETE FROM produtos WHERE idproduto = ".$_GET['excluir'];
    		 mysqli_query($link, $sql_produtos);
    		 unlink('imagens/'.$_GET['imagem'].'.jpg');

    		 echo '<script>alert("Produto excluído com sucesso!");</script>';

    }

    $sql_produtos = "SELECT * FROM produtos ORDER BY nome asc";
    $resultado_produtos = mysqli_query($link, $sql_produtos);
  
		?>
		
		<a href="cadastraNovosProdutos.php" class="btn btn-success">Cadastrar</a>
		<br><br><br>
		<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
		
		  <!-- Cabeçalho ddos registros-->
		  <thead class="table-dark">
		    <tr>
		        <th>Imagem</th>
		        <th>Nome</th>
		        <th>Quantidade disponível</th>
		        <th>Preco</th>
		        <th>Editar Produto</th>
		        <th>Excluir Produto</th>		        	        
		    </tr>
		  </thead>
		
		 <?php while($dado_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?> 

		 	<tbody>
		 	        <tr>
		 				<td ><img src="imagens/<?=$dado_produtos['imagem']?>.jpg" width="100"></td>
		 				<td><?php echo $dado_produtos["nome"]; ?></td>
		 				<td><?php echo $dado_produtos["qtd"]; ?></td>
		 				<td><?php echo $dado_produtos["preco"]; ?></td>

		 				<td>
								<a href="cadastraNovosProdutos.php?editar=<?=$dado_produtos['idproduto']?>" class="btn btn-warning">Editar</a>
		 				</td>
		 				
		 				<td>
								<a href="?excluir=<?=$dado_produtos['idproduto']?>&imagem=<?=$dado_produtos['imagem']?>" class="btn btn-danger">Excluir</a>
		 				</td>		 				
		 			</tr>

		 			<?php } ?>
		 			</tbody>
		 		</table>
		 	</div>		 	

<?php 
	 rodape();	
 ?>