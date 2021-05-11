<?php 


if(empty($POST["usuario"]) || empty($POST['senha'])) {
    header('location: ../../produtos/index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $POST['$usuario']);
$senha = mysqli_real_escape_string($conexao, $POST['senha']);

$query = "select id, usuario from tbl_administrador where usuario = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('location: painel.php');
    exit();
}else{
    header('location: index.php');
    }exit();