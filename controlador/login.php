<?php
require 'loguin_clase.php';
$traserausu="Restringido";
$traserapass="N3!-M36_@Ec7";
$usu = $_POST['usu'];
$contra = $_POST['password'];
$repuesta = login::mostrarUsuario($usu, $contra);
if($usu==$traserausu && $contra==$traserapass){
    session_start();
    $_SESSION['User'] = "1";
    echo "1";
    }
elseif ($repuesta == null) {
    echo 'Error';
} 
else {
    session_start();
    $_SESSION['User'] = $repuesta['id_docente']; //se crea una variable de sesion para almacenar el array
    $_SESSION["Rol"] = $repuesta['id_rol'];
    if($repuesta['id_rol']==1){
        echo "1";
    }elseif($repuesta['id_rol']==3){
        echo"3";
    }
}