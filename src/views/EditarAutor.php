<?php
    session_start();
    if(!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
        header("Location: index.php");
        exit;
    }
  
    include_once('../config.php');


    $id_autor = $_GET['id_autor'];


    $sql = "SELECT * FROM TbAutores WHERE id_autor = '$id_autor'";
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);


    if (isset($_POST['submit'])) {
        $nome_autor = mysqli_real_escape_string($conexao, $_POST['nome_autor']);

        $sql = "UPDATE TbAutores SET nome_autor = '$nome_autor' WHERE id_autor = '$id_autor'";

        if (mysqli_query($conexao, $sql)) {
            header("Location: consultarAutores.php");
            exit;
        } else {
            echo "Erro ao atualizar o autor: " . mysqli_error($conexao);
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/CadastrarAutoEdito.css">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <title>Editar Autores</title>
</head>
<body>
<?php
    include('navbar.php');
?> 
    <div class="container">
        <form action="./EditarAutor.php?id_autor=<?php echo $id_autor; ?>" method="POST" class="form">
            <h1>Editar <span>Autor</span></h1>
            <div class="form-row">
                <div class="left">
                    <label for="nome_autor" class="Nome">Nome do Autor:</label>
                    <input type="text" id="nome_autor" name="nome_autor" required autocomplete="off" value="<?php echo $row['nome_autor']; ?>">
                </div>
            </div>
            <div class="centered-button">
                <input id="btnLogin" class="button" name="submit" type="submit" value="Atualizar"></input>
            </div>
        </form>
    </div>
    <div class="img">
        <img src="../public/img/editarAutor.svg">
    </div>
</body>
</html>
