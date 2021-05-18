<?php
    session_start(); // iniciar a sessão
    ob_start(); // limpar a memória
    $cadastrar = filter_input(INPUT_POST, 'cadastrar', FILTER_SANITIZE_STRING);
    if($cadastrar)
    {
        include_once 'conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        
        $result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
                        '" .$dados['nome']. "',
                        '" .$dados['email']. "',
                        '" .$dados['usuario']. "',
                        '" .$dados['senha']. "'
                        )";
        $resultado_usario = mysqli_query($conn, $result_usuario);
        if(mysqli_insert_id($conn)){
            $_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
            header("Location: login.php");
        }else{
            $_SESSION['msg'] = "Erro ao cadastrar o usuário";
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
