<?php
    include_once('../config.php');

  
    if (isset($_GET['id_emprestimo'])) {
      
        $id_emprestimo = $_GET['id_emprestimo'];

       
        $sql = "DELETE FROM TbEmprestimos WHERE id_emprestimo = $id_emprestimo";

    
        if (mysqli_query($conexao, $sql)) {
            echo "Empréstimo excluído com sucesso.";
            header("Location: consultarEmprestimos.php?message=Empréstimo excluído com sucesso");
        } else {
            echo "Erro ao excluir empréstimo: " . mysqli_error($conexao);
        }

       
        if (mysqli_query($conexao, $sql)) {
        
            header("Location: consultarEmprestimos.php?message=Empréstimo excluído com sucesso!");
        } else {
            echo "Erro ao excluir o emprestimo: " . mysqli_error($conexao);
        }


        mysqli_close($conexao);
    } else {
        echo "Nenhum ID de empréstimo fornecido.";
    }
?>
