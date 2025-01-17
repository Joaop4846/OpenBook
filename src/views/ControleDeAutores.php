
 <?php
    session_start();
    if(!isset($_SESSION['usuario']) == true and !isset($_SESSION['senha']) == true)
    {
        unset($_SESSION['usuario']); 
        unset($_SESSION['senha']);
        header("Location: index.php");
    }
 
    include_once('../config.php');
?> 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/Controle.css">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">    
    <title>Controle de Autores</title>
</head>
<body>
<?php
    include('./navbar.php');
?> 
   
    <div class="titulo">
        <h1>Controle de <span>Autores<span></h1>
    </div>
<div class="container">
    <a class="button-group" href="./CadastrarAutores.php">
        <button class="btn-green"><img src="../public/img/adicionarUsuario.png" alt="Cadastrar"></button>
        <button class="btn-white">Cadastrar</button>
    </a>

    <a class="button-group"  href="./ConsultarAutores.php">
        <button class="btn-green"><img src="../public/img/procurar 1.png" alt="Livros"></button>
        <button class="btn-white">Consultar</button>
    </a>
    

     
<div class="logoindex">
    <img src="../public/img/controleDeAutores.svg" alt="logo index" id="ilustracao">  
</div>

<div class="poliglota">
    <img src="../public/img/Polygon.png" alt="polygon">
</div>

<div class="OpenBook">
    <img src="../public/img/OpenBook2.png" alt="OpenBook">
</div>

</div>
</body>
</html>

