<?php
    session_start();
    if(!isset($_SESSION['usuario']) == true and !isset($_SESSION['senha']) == true)
    {
        unset($_SESSION['usuario']); 
        unset($_SESSION['senha']);
        header("Location: index.php");
    }
 
    include_once('../config.php');

   
    $id = $_GET['id'];

 
    $sql = "DELETE FROM TbUsuarios WHERE id = '$id'";

    if (mysqli_query($conexao, $sql)) {
        header("Location: consultarUsuarios.php");
    } else {
        echo "Erro ao excluir registro: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
?>
