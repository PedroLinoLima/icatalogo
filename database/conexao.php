<?php
//Conectando com o banco de dados
const HOST = "localhost";
const USER = "root";
const PASSWORD = "bcd127";
const DATABASE = "icatalogo";

$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_connect_error());

?>
