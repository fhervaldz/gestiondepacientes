<?php

function usuario_autenticado(){
    //Si el usuario no existe entonces:
    if(!revisar_usuario()){
        //Se le llevara a login.php para que se registre.
        // echo $_SESSION['usuario'];
        header('Location:index.php');
        exit();
    }

}
function revisar_usuario(){
    return isset( $_SESSION['usuario']);
}
session_start();
usuario_autenticado();