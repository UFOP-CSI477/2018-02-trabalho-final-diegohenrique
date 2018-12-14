<?php
    
    session_start();
    require_once('db.class.php');
    //Cadastrar os registros
    $idproduto = $_POST['idproduto'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $qtd = $_POST['qtd'];
    $preco = $_POST['preco'];


    $msg = false;

        if(isset($_FILES['imagem'])){
            $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); // pega a extensao do arquivo
            $novo_nome = md5(time()) . $extensao; //define o nome do arquivo / criptografia de imagem (mas não é interessante pois não queremos imagem duplicada)
            $diretorio = "imagens/"; //define o diretorio para onde enviaremos o arquivo

            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

            
        }
    

    //Conexão com o BD
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    //Inserindo os novos dados ao BD com os respectivos campos
   if($idproduto != ''){

     $sql = "UPDATE produtos SET nome = '$nome', descricao = '$descricao', qtd = '$qtd', preco = '$preco', imagem = '$novo_nome' WHERE idproduto = $idproduto";

   } else {
     
     $sql = "INSERT INTO produtos (idproduto, imagem, nome, descricao, qtd, preco) VALUES ('$idproduto', '$novo_nome', '$nome', '$descricao', '$qtd', '$preco')";
    }

    //executar a query
    if(mysqli_query($link, $sql)){
      //echo "Emite um alerta se deu certo o cadastro de um novo registro";
       echo "<script>
        alert('Foi realizado com sucesso!   Aperte OK');
       location.href='listarProdutos.php'</script>";
    }else{
       //echo "Algo deu errado ao cadastrar";
        echo "<script>
         alert('Erro...     Aperte OK para voltar!');
        location.href='cadastraNovosProdutos.php'</script>";
    }

?>