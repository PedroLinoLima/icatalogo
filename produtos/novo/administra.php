<?php


session_start();



$erro = [];


require("../../database/conexao.php");


function validarCampos(){

    
    if(!isset($_POST["descricao"]) && $_POST["descricao"]== ""){
        $erros[] = "O campo descrição é obrigatório";
    }

   
    if(!isset($_POST["peso"]) && $_POST["peso"] == ""){
        $erros[] = "O campo peso é obrigatório";
   
    }else if(is_numeric(str_replace(",",".",$_POST["peso"]))){
        $erros[] = "O campo peso deve ser um número";
    }

    
    if(!isset($_POST["quantidade"]) && $_POST["quantidade"] == ""){
        $erros[] = "O campo quantidade é obrigatório";
    
    }else if(is_numeric(str_replace(",",".",$_POST["quantidade"]))){
        $erros[] = "O campo quantidade deve ser um número";
    }
    
    if(!isset($_POST["cor"]) && $_POST["cor"]== ""){
        $erros[] = "O campo descrição é obrigatório";
    }

    
    if(isset($_POST["valor"]) && $_POST["valor"] != "" && !is_numeric(str_replace(",",".",$_POST["valor"]))){
        $erros[] = "O campo valor deve ser um número";
    }

    
    if(isset($_POST["desconto"]) && $_POST["desconto"] != "" && !is_numeric(str_replace(",",".",$_POST["desconto"]))){
        $erros[] = "O campo desconto deve ser um número";
    } 
    return $erros;
}


$erros = validarCampos();


if(count($erros) > 0) {

    
    $_SESSION["erros"] = $erros;

    
    header("location: ../novo/index.php"); 
}

        
        if (isset($_POST["descricao"]) && isset($_POST["peso"]) && isset($_POST["quantidade"])&& isset($_POST["cor"]) && isset($_POST["tamanho"]) && isset($_POST["valor"]) && isset($_POST["desconto"])) {
            $descricao = $_POST["descricao"];
            
            $peso = str_replace(",",".", $_POST["peso"]);
            $quantidade = $_POST["quantidade"];
            $cor = $_POST["cor"];
            $tamanho = $_POST["tamanho"];
            $peso = str_replace(",",".", $valor = $_POST["valor"]);
            
            $desconto = $_POST["desconto"];
        
           
            $sqlInsert = "INSERT INTO tbl_produto (descricao, peso, quantidade, cor, tamanho, valor, desconto) VALUES ('$descricao', $peso, $quantidade, '$cor', '$tamanho', '$valor', '$desconto')";

            
            $resultado = mysqli_query($conexao, $sqlInsert) or die(mysqli_error($conexao));

            if ($resultado) {
            
            $mensagem = "Produto inserido com sucesso!";
        } else {
            
            $mensagem = "Erro ao inserir o produto!";
        }              
    }

    
    header("location: http://localhost/web-backend/icatalogo/produtos/");