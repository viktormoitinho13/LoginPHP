<?php

session_start();

if(!empty($_SESSION['id']))
{
    echo "ola ".$_SESSION['nome'] ;

    echo "<br /> <a href='sair.php'><button>Sair</button></a>";
} else 
    {
        $_SESSION['msg'] = "Área restrita";
        header("location:login.php");
    }