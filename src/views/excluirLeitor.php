<?php
   
    if (isset($_GET['id_leitor'])) {
        $id_leitor = $_GET['id_leitor'];

       
        include_once('../config.php');

      
        $sql = "DELETE FROM TbLeitores WHERE id_leitor = $id_leitor";

      
        if (mysqli_query($conexao, $sql)) {
          
            header("Location: consultarLeitores.php?message=Leitor excluído com sucesso!");
        } else {
            echo "Erro ao excluir leitor: " . mysqli_error($conexao);
        }

        mysqli_close($conexao);
    } else {
        echo "Nenhum ID de leitor fornecido para excluir";
    }
?>
