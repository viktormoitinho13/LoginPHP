<?php
    session_start(); // iniciar a sessão
    ob_start(); // limpar a memória
    $cadastrar = filter_input(INPUT_POST, 'cadastrar', FILTER_SANITIZE_STRING);
    if($cadastrar)
    {
        include_once 'conexao.php';
        $dados_cadastro = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $dados_cadastro['senha'] = password_hash($dados_cadastro['senha'], PASSWORD_DEFAULT);

        $result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES 
        (
            ' ".$dados_cadastro['nome']." ',
            ' ".$dados_cadastro['email']." ',
            ' ".$dados_cadastro['usuario']." ',
            ' ".$dados_cadastro['senha']." '
        )    ";

        $resultado_usuario = mysqli_query($conn, $result_usuario);

        if(mysqli_insert_id($conn))
        {
            $_SESSION['msgcadastro'] = "Usuário cadastrado com suscesso";
            header("location:login.php");


        }else 
            {
                $_SESSION['msg'] = "Erro ao cadastrar usuário";
            }
    }


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login API - cadastro</title>
</head>

<body>

    <h2>Cadastro</h2>
    <?php
            if(isset($_SESSION['msg']))
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>

    <form action="" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" placeholder="Digite seu nome">
        <br /><br />

        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Digite seu e-mail">
        <br /><br />


        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" placeholder="Digite seu usuario">
        <br /><br />

        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Digite a sua senha">
        <br /><br />

        <input type="submit" name="cadastrar" value="cadastrar">
        <br /><br />

        Lembrou?<a href="login.php">Clique aqui</a>para logar.



    </form>

</body>

</html>