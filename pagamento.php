<?php 
	include_once('funcoes.php');
	cabecalho();
	autenticar();

  $id=$_GET['idproduto'];
  $vencimento=date('d/m/Y', strtotime(' + 5 days'));

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $sql_produtos = "SELECT * FROM produtos WHERE idproduto=$id";
  $resultado_produtos = mysqli_query($link, $sql_produtos);
  $totalProdutos = mysqli_fetch_array($resultado_produtos);

  //DECREMENTAR QUANTIDADE
  $qtd = $totalProdutos['qtd'] - $_GET['qtd'];
  $sql="UPDATE produtos SET qtd = '$qtd' WHERE idproduto=".$id;
  mysqli_query($link, $sql);

  $valorDocumento = $_GET['qtd'] * $totalProdutos['preco'];

  $codigobarra = time().time().time().time();
    // print_r($totalProdutos);
        //  mostrarProduto($totalProdutos['nome'], $totalProdutos['preco']);
?>
<link rel="stylesheet" href="css/boleto.css">	   

		<div class="boleto">
			<div style="text-align: center">
				<button onclick="window.print()">Imprimir boleto</button>
			</div>
<TABLE cellSpacing=0 cellPadding=0 border=0 class=Boleto>
  
  <TR>
    <TD style='width: 0.9cm'></TD>
    <TD style='width: 1cm'></TD>
    <TD style='width: 1.9cm'></TD>
    
    <TD style='width: 0.5cm'></TD>
    <TD style='width: 1.3cm'></TD>
    <TD style='width: 0.8cm'></TD>
    <TD style='width: 1cm'></TD>
    
    <TD style='width: 1.9cm'></TD>
    <TD style='width: 1.9cm'></TD>
    
    <TD style='width: 3.8cm'></TD>
    
    <TD style='width: 3.8cm'></TD>
  <tr><td colspan=11>
  <ul class=BoletoInstrucoes>
  <li>Imprima em papel A4 ou Carta</li>
  <li>Utilize margens mínimas a direita e a esquerda</li>
  <li>Recorte na linha pontilhada</li>
  <li>Não rasure o código de barras</li>
  </ul>
  </td></tr>
  </TR>
  <tr><td colspan=11 class=BoletoPontilhado>&nbsp;</td></tr>
  <TR>
    <TD colspan=4 class=BoletoLogo><img src='imagens/boleto/104.jpg'></TD>
    <TD colspan=2 class=BoletoCodigoBanco>104-0</TD>
    <TD colspan=6 class=BoletoLinhaDigitavel><?=$codigobarra?></TD>
  </TR>
  <TR>
    <TD colspan=10 class=BoletoTituloEsquerdo>Local de Pagamento</TD>
    <TD class=BoletoTituloDireito>Vencimento</TD>
  </TR>
  <TR>
    <TD colspan=10 class=BoletoValorEsquerdo style='text-align: left; padding-left : 0.1cm'>LocalDePagamento</TD>
    <TD class=BoletoValorDireito><?=$vencimento?></TD>
  </TR>  
  <TR>
    <TD colspan=10 class=BoletoTituloEsquerdo>Cedente</TD>
    <TD class=BoletoTituloDireito>Agência/Código do Cedente</TD>
  </TR>
  <TR>
    <TD colspan=10 class=BoletoValorEsquerdo style='text-align: left; padding-left : 0.1cm'>Cedente</TD>
    <TD class=BoletoValorDireito>015</TD>
  </TR>   
  <TR>
    <TD colspan=3 class=BoletoTituloEsquerdo>Data do Documento</TD>
    <TD colspan=4 class=BoletoTituloEsquerdo>Número do Documento</TD>
    <TD class=BoletoTituloEsquerdo>Espécie</TD>
    <TD class=BoletoTituloEsquerdo>Aceite</TD>
    <TD class=BoletoTituloEsquerdo>Data do Processamento</TD>
    <TD class=BoletoTituloDireito>Nosso Número</TD>
  </TR>
  <TR>
    <TD colspan=3 class=BoletoValorEsquerdo><?=date('d/m/Y')?></TD>
    <TD colspan=4 class=BoletoValorEsquerdo>000001</TD>
    <TD class=BoletoValorEsquerdo>RC</TD>
    <TD class=BoletoValorEsquerdo>N</TD>
    <TD class=BoletoValorEsquerdo>DataDoProces</TD>
    <TD class=BoletoValorDireito>987</TD>
  </TR>  
  <TR>
    <TD colspan=3 class=BoletoTituloEsquerdo>Uso do Banco</TD>
    <TD colspan=2 class=BoletoTituloEsquerdo>Carteira</TD>
    <TD colspan=2 class=BoletoTituloEsquerdo>Moeda</TD>
    <TD colspan=2 class=BoletoTituloEsquerdo>Quantidade</TD>
    <TD class=BoletoTituloEsquerdo>(x) Valor</TD>
    <TD class=BoletoTituloDireito>(=) Valor do Documento</TD>
  </TR>
  <TR>
    <TD colspan=3 class=BoletoValorEsquerdo>&nbsp;</TD>
    <TD colspan=2 class=BoletoValorEsquerdo>SR</TD>
    <TD colspan=2 class=BoletoValorEsquerdo>R$</TD>
    <TD colspan=2 class=BoletoValorEsquerdo>&nbsp;</TD>
    <TD class=BoletoValorEsquerdo>&nbsp;</TD>
    <TD class=BoletoValorDireito><?=$valorDocumento?></TD>
  </TR>  
  <TR>
    <TD colspan=10 class=BoletoTituloEsquerdo>Instruco</TD>
    <TD class=BoletoTituloDireito>(-) Desconto</TD>
  </TR>
  <TR>
    <TD colspan=10 rowspan=9 class=BoletoValorEsquerdo style='text-align: left; vertical-align:top; padding-left : 0.1cm'>Instrucoes</TD>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>  
  <TR>
    <TD class=BoletoTituloDireito>(-) Outras Deduções/Abatimento</TD>
  </TR>  
  <TR>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>  
  <TR>
    <TD class=BoletoTituloDireito>(+) Mora/Multa/Juros</TD>
  </TR>  
  <TR>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>  
  <TR>
    <TD class=BoletoTituloDireito>(+) Outros Acréscimos</TD>
  </TR>  
  <TR>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>  
  <TR>
    <TD class=BoletoTituloDireito>(=) Valor Cobrado</TD>
  </TR>  
  <TR>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>                
  <TR>
    <TD rowspan=3 Class=BoletoTituloSacado>Sacado:</TD>
    <TD colspan=8 Class=BoletoValorSacado><?=$_SESSION['usuario']?></TD>
    <TD colspan=2 Class=BoletoValorSacado>CpfDoSacado</TD>
  </TR> 
  <TR>
    <TD colspan=10 Class=BoletoValorSacado>RuaNumeroBairro</TD>
  </TR>
  <TR>
    <TD colspan=10 Class=BoletoValorSacado>CidadeUf&nbsp;&nbsp;&nbsp;CEP</TD>
  </TR>  
  <TR>
    <TD colspan=2 Class=BoletoTituloSacador>Sacador / Avalista:</TD>
    <TD colspan=9 Class=BoletoValorSacador>NomeSacador</TD>
  </TR>
  <TR>
    <TD colspan=11 class=BoletoTituloDireito style='text-align: right; padding-right: 0.1cm'>Recibo do Sacado - Autenticação Mecânica</TD>
  </TR>
  <TR>
    <TD colspan=11 height=60 valign=top>&nbsp</TD>
  </TR>
  <tr><td colspan=11 class=BoletoPontilhado>&nbsp;</td></tr>  
  <TR>
    <TD colspan=4 class=BoletoLogo><img src='imagens/boleto/104.jpg'></TD>
    <TD colspan=2 class=BoletoCodigoBanco>104-0</TD>
    <TD colspan=6 class=BoletoLinhaDigitavel><?=$codigobarra?></TD>
  </TR>
  <TR>
    <TD colspan=10 class=BoletoTituloEsquerdo>Local de Pagamento</TD>
    <TD class=BoletoTituloDireito>Vencimento</TD>
  </TR>
  <TR>
    <TD colspan=10 class=BoletoValorEsquerdo style='text-align: left; padding-left : 0.1cm'>LocalDePagamento</TD>
    <TD class=BoletoValorDireito><?=$vencimento?></TD>
  </TR>  
  <TR>
    <TD colspan=10 class=BoletoTituloEsquerdo>Cedente</TD>
    <TD class=BoletoTituloDireito>Agência/Código do Cedente</TD>
  </TR>
  <TR>
    <TD colspan=10 class=BoletoValorEsquerdo style='text-align: left; padding-left : 0.1cm'>Cedente</TD>
    <TD class=BoletoValorDireito>015</TD>
  </TR>   
  <TR>
    <TD colspan=3 class=BoletoTituloEsquerdo>Data do Documento</TD>
    <TD colspan=4 class=BoletoTituloEsquerdo>Número do Documento</TD>
    <TD class=BoletoTituloEsquerdo>Espécie</TD>
    <TD class=BoletoTituloEsquerdo>Aceite</TD>
    <TD class=BoletoTituloEsquerdo>Data do Processamento</TD>
    <TD class=BoletoTituloDireito>Nosso Número</TD>
  </TR>
  <TR>
    <TD colspan=3 class=BoletoValorEsquerdo><?=date('d/m/Y')?></TD>
    <TD colspan=4 class=BoletoValorEsquerdo>000001</TD>
    <TD class=BoletoValorEsquerdo>RC</TD>
    <TD class=BoletoValorEsquerdo>N</TD>
    <TD class=BoletoValorEsquerdo>DataDoProces</TD>
    <TD class=BoletoValorDireito>987</TD>
  </TR>  
  <TR>
    <TD colspan=3 class=BoletoTituloEsquerdo>Uso do Banco</TD>
    <TD colspan=2 class=BoletoTituloEsquerdo>Carteira</TD>
    <TD colspan=2 class=BoletoTituloEsquerdo>Moeda</TD>
    <TD colspan=2 class=BoletoTituloEsquerdo>Quantidade</TD>
    <TD class=BoletoTituloEsquerdo>(x) Valor</TD>
    <TD class=BoletoTituloDireito>(=) Valor do Documento</TD>
  </TR>
  <TR>
    <TD colspan=3 class=BoletoValorEsquerdo>&nbsp;</TD>
    <TD colspan=2 class=BoletoValorEsquerdo>SR</TD>
    <TD colspan=2 class=BoletoValorEsquerdo>R$</TD>
    <TD colspan=2 class=BoletoValorEsquerdo>&nbsp;</TD>
    <TD class=BoletoValorEsquerdo>&nbsp;</TD>
    <TD class=BoletoValorDireito><?=$valorDocumento?></TD>
  </TR>  
  <TR>
    <TD colspan=10 class=BoletoTituloEsquerdo>Instruco</TD>
    <TD class=BoletoTituloDireito>(-) Desconto</TD>
  </TR>
  <TR>
    <TD colspan=10 rowspan=9 class=BoletoValorEsquerdo style='text-align: left; vertical-align:top; padding-left : 0.1cm'>Instrucoes</TD>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>  
  <TR>
    <TD class=BoletoTituloDireito>(-) Outras Deduções/Abatimento</TD>
  </TR>  
  <TR>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>  
  <TR>
    <TD class=BoletoTituloDireito>(+) Mora/Multa/Juros</TD>
  </TR>  
  <TR>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>  
  <TR>
    <TD class=BoletoTituloDireito>(+) Outros Acréscimos</TD>
  </TR>  
  <TR>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>  
  <TR>
    <TD class=BoletoTituloDireito>(=) Valor Cobrado</TD>
  </TR>  
  <TR>
    <TD class=BoletoValorDireito>&nbsp;</TD>
  </TR>                
  <TR>
    <TD rowspan=3 Class=BoletoTituloSacado>Sacado:</TD>
    <TD colspan=8 Class=BoletoValorSacado><?=$_SESSION['usuario']?></TD>
    <TD colspan=2 Class=BoletoValorSacado>CpfDoSacado</TD>
  </TR> 
  <TR>
    <TD colspan=10 Class=BoletoValorSacado>RuaNumeroBairro</TD>
  </TR>
  <TR>
    <TD colspan=10 Class=BoletoValorSacado>CidadeUf&nbsp;&nbsp;&nbsp;CEP</TD>
  </TR>  
  <TR>
    <TD colspan=2 Class=BoletoTituloSacador>Sacador / Avalista:</TD>
    <TD colspan=9 Class=BoletoValorSacador>NomeSacador</TD>
  </TR>
  <TR>
    <TD colspan=11 class=BoletoTituloDireito style='text-align: right; padding-right: 0.1cm'>Ficha de Compensação - Autenticação Mecânica</TD>
  </TR>
  <TR>
    <TD colspan=11 height=60 valign=top><img src='imagens/boleto/codbar.jpg'></TD>
  </TR>
  <tr><td colspan=11 class=BoletoPontilhado>&nbsp;</td></tr>  
  </TABLE></P>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 