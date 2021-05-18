<?php

session_start();
include_once("conexao.php");

$enviar = filter_input(INPUT_POST, 'enviar',FILTER_SANITIZE_STRING);

if($enviar)
{
    $usuario = filter_input(INPUT_POST, 'usuario',FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING);

        if((!empty($usuario)) and (!empty($senha)))
        {
            // echo password_hash($senha, PASSWORD_DEFAULT);

            $result_usuario = "SELECT id, nome, email, senha FROM usuarios WHERE usuario = '$usuario' limit 1 ";

            $resulta_usuario = mysqli_query($conn, $result_usuario);

            if($resulta_usuario)
            {
                $row_usuario = mysqli_fetch_assoc($resulta_usuario);
                    if(password_verify($senha, $row_usuario['senha']))
                    {
                        $_SESSION['id'] = $row_usuario['id'];
                        $_SESSION['nome'] = $row_usuario['nome'];
                        $_SESSION['email'] = $row_usuario['email'];
                        
                        header("location: administrativo.php");
                        
                    } else 
                        {
                            $_SESSION['msg'] = 'Senha incorreta';
                             header("location: login.php");
                        }
            }

        }else 
            {
                $_SESSION['msg'] = 'Login incorreto';
                header("location: login.php");
            }

} else 
    {
        $_SESSION['msg'] = "Página não encontrada";
        header("location: login.php");
    }