
 <?php
    include_once('../config.php');
    session_start();
    if(!isset($_SESSION['usuario']) == true and !isset($_SESSION['senha']) == true)
    {
        unset($_SESSION['usuario']); //destroi qualquer variável que tenha esse valor
        unset($_SESSION['senha']);
        header("Location: index.php");
    }
 

?> 


 <?php
   
    $id = $_GET['id'];

    
    $sql = "SELECT * FROM TbUsuarios WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($resultado);
    
    if (isset($_POST['submit'])) {
    $usuario = mysqli_real_escape_string($conexao, $_POST['nome_usuario']);
    $nome_completo = mysqli_real_escape_string($conexao, $_POST['nome_completo']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $cargo = mysqli_real_escape_string($conexao, $_POST['tipo_perfil']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    
    $confirmar_senha = $_POST['confirmar_senha'];
    if ($senha !== $confirmar_senha) {
        echo "<p class='msgPHP'>As senhas não correspondem.</p>";
        exit;
    }

    
    $sql = "UPDATE TbUsuarios SET usuario = '$usuario', nome_usuario = '$nome_completo', cpf = '$cpf', email = '$email', telefone = '$telefone', cargo = '$cargo', senha = '$senha' 
    WHERE id = '$id'";
    $resultado =    $resultado = mysqli_query($conexao, $sql);
    header("Location: consultarUsuarios.php");
}

   
   ?> 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/cadastrarUsuarios.css">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    

    <title>Editar Usuário</title>
</head>

<body>
 <?php
    include('navbar.php');
?> 
    <div class="container">
            <form action="EditarUsuario.php?id=<?php echo $id; ?>" method="POST" class="form">
                <h1>Editar <span>Usuário</span></h1>
                <div class="form-row">
                    <div class="left">
                        <label for="nome_completo" class="Nome">Nome Completo:</label>
                        <input type="text" id="nome_completo" name="nome_completo" required autocomplete="off" value="<?php echo $row['nome_usuario']; ?>">
                    
                        <label for="cpf" class="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" required autocomplete="off" value="<?php echo $row['cpf']; ?>">
                    
                        <label for="telefone" class="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" required autocomplete="off" value="<?php echo $row['telefone']; ?>">
                
                        <label for="email" class="email">E-mail:</label>
                        <input type="text" id="email" name="email" required autocomplete="off" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="right">
                        <label for="nome_usuario" class="Usuario">Nome de Usuário:</label>
                        <input type="text" id="nome_usuario" name="nome_usuario" required autocomplete="off" value="<?php echo $row['usuario']; ?>">

                        <label for="senha" class="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required autocomplete="off" value="<?php echo $row['senha']; ?>">

                    
                        <label for="confirmar_senha" class="ConfirmarSenha">Confirmar Senha:</label>
                        <input type="password" id="confirmar_senha" name="confirmar_senha" required autocomplete="off" value="<?php echo $row['senha']; ?>">
                    
                        <label for="tipo_perfil"  class="perfil">Tipo de Perfil:</label> <br>
                            <select id="tipo_perfil" name="tipo_perfil">
                                <option value="Administrador" <?php if ($row['cargo'] == 'Administrador') echo 'selected'; ?>>Administrador</option>
                                <option value="Bibliotecário" <?php if ($row['cargo'] == 'bibliotecario') echo 'selected'; ?>>Bibliotecário</option>
                            </select>
                    </div>
                </div>
                <div class="centered-button">
                    <input id="btnLogin" class="button" name="submit" type="submit" value="Atualizar"></input>
                </div>
            </form>

    </div>
    <div class="img">
        <img src="../public/img/cadastroDeUsuarios.svg">
    </div>
</body>
</html>
