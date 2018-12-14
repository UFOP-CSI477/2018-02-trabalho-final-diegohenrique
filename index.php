<?php 
	include_once('funcoes.php');
	cabecalho();
?>
	      <div class="row">
	      <div class="col-md-3"></div>
	      <div class="col-md-6">
	    
	      <div id="myCarousel" class="carousel slide" data-ride="carousel">
	        
	        <ol class="carousel-indicators">
	          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	          <li data-target="#myCarousel" data-slide-to="1"></li>
	          <li data-target="#myCarousel" data-slide-to="2"></li>
	        </ol>

	        
	        <div class="carousel-inner">
	          <div class="item active">
	            <img src="imagens/cruzeiro.jpg" alt="Camisa do Cruzeiro" width="25%">
	            <div class="carousel-caption">
	              <h1>Camisa do Cruzeiro</h1>
	              <h2>Por apenas R$ 199,00</h2>
	            </div>
	          </div>

	          <div class="item">
	            <img src="imagens/palmeiras.jpg" alt="Camisa do Palmeiras" width="25%">
	            <div class="carousel-caption">
	              <h1>Camisa do Palmeiras</h1>
	              <h2>Por apenas R$ 199,00</h2>
	            </div>
	          </div>

	          <div class="item">
	            <img src="imagens/flamengo.jpg" alt="Camisa do Flamengo" width="25%">
	            <div class="carousel-caption">
	              <h1>Camisa do Flamengo</h1>
	              <h2>Por apenas R$ 199,00</h2>
	            </div> 
	          </div>
	        </div>

	        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	          <span class="glyphicon glyphicon-chevron-left"></span>
	          <span class="sr-only">Anterior</span>
	        </a>
	        <a class="right carousel-control" href="#myCarousel" data-slide="next">
	          <span class="glyphicon glyphicon-chevron-right"></span>
	          <span class="sr-only">Próximo</span>
	        </a>
	        <div class="col-md-3"></div>
	      </div>
	      </div>
	    </div>

		<div class="container">
			<div class="row">
				<?php 
				 $objDb = new db();
    			$link = $objDb->conecta_mysql();

    			$sql_produtos = "SELECT * FROM produtos";
    			$resultado_produtos = mysqli_query($link, $sql_produtos);
    			while($totalProdutos = mysqli_fetch_array($resultado_produtos)){
					mostrarProduto($totalProdutos['idproduto'], $totalProdutos['nome'], $totalProdutos['preco'], $totalProdutos['imagem'], $totalProdutos['qtd']);
				}
				?>

			</div>
		</div>

			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
	<?php 
		 rodape();	
	 ?>