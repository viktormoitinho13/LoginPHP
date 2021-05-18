<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login API</title>
</head>

<body>

    <h2>Área restrita</h2>
    <?php
            if(isset($_SESSION['msg']))
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            if(isset($_SESSION['msgcadastro']))
            {
                echo $_SESSION['msgcadastro'];
                unset($_SESSION['msgcadastro']);
            }
        ?>

    <form action="validar.php" method="POST">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" placeholder="Digite seu usuário">
        <br /><br />

        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Digite a sua senha">
        <br /><br />

        <input type="submit" name="enviar" value="enviar">

        <h4>Você não possuí uma conta?</h4>

        <a href="cadastrar.php">Criar conta</a>

    </form>

</body>

</html>