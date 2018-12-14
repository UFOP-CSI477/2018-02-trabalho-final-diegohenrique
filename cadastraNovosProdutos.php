<?php 
  include_once('funcoes.php');
  cabecalho();
  
  if (isset($_GET['editar'])){ //Editar
     $objDb = new db();
        $link = $objDb->conecta_mysql();
        $id = $_GET['editar'];
        $sql_produtos = "SELECT * FROM produtos WHERE idproduto = $id";
        $result_produtos = mysqli_query($link, $sql_produtos);
        $resultado_produtos = mysqli_fetch_array($result_produtos);
        
        $nomeproduto = $resultado_produtos['nome'];
        $descricaoproduto = $resultado_produtos['descricao'];
        $qtdproduto = $resultado_produtos['qtd'];
        $precoproduto = $resultado_produtos['preco'];
        $imagemproduto = $resultado_produtos['imagem'];
  } else { //Cadastrar
    $id = '';
    $nomeproduto = '';
    $descricaoproduto = '';
    $qtdproduto = '';
    $precoproduto = '';
  }

?>

        <div class="container">        
          <div class="row">
               
              <div class="col-md-4">
                  <h3><?php echo isset($_GET['editar']) ? 'Editar' : 'Cadastrar';?> Novos Produtos</h3>
                 
                 <form method="post" action="cadastraNovosProdutosBD.php" id="formCadProdutos" accept-charset="utf-8" enctype="multipart/form-data">
                   
                  <div class="form-group">
                     <label for="nome">Nome do Produto:</label>
                     <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" value="<?=$nomeproduto?>">
                  </div>
                  
                  <div class="form-group">
                     <label for="descricao">Descrição</label>
                     <textarea class="form-control" name="descricao" rows="3"><?=$descricaoproduto?></textarea>
                  </div>

                  <div class="form-group">
                     <label for="qtd">Quantidade</label>
                     <input type="text" class="form-control" id="qtd" name="qtd" placeholder="Quantidades desse produto que vão ser adicionados" value="<?=$qtdproduto?>">
                  </div>

                  <div class="form-group">
                     <label for="preco">Preço</label>
                     <input type="text" class="form-control" id="preco" name="preco" placeholder="Valor do Produto: 120.00" value="<?=$precoproduto?>">
                  </div>
                  
                    <div class="form-group">
                      <label for="imagem">Adicone uma imagem da camisa</label>
                      <input type="file" class="form-control-file" name="imagem" id="imagem" value="<?=$imagemproduto?>">
                    </div>

                    <input type="hidden" name="idproduto" value="<?=$id?>">

                   <input type="submit" class="btn btn-primary" value="<?=isset($_GET['editar']) ? 'Editar' : 'Cadastrar'?>">
                 </form>
               </div>
          </div>
        </div>

 <?php 
     rodape();  
   ?>     