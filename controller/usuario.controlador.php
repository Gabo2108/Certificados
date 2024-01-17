<?php
if ($peticionAjax) {
    require_once "../model/usuario.modelo.php";
} else {
    require_once "./model/usuario.modelo.php";
}
class UsuarioControlador extends UsuarioModelo
{
    public function CtrInsertarUsuario(){
        
        $nombre = mainModel::limpiar_cadena($_POST['nuevo']);
        $apellido = mainModel::limpiar_cadena($_POST['apellido']);
        $Dni = mainModel::limpiar_cadena($_POST['DNI']);
        $passw =  mainModel::limpiar_cadena($_POST['pasw']) ;
        $curso =  mainModel::limpiar_cadena($_POST['curso']) ;
        $rol= mainModel:: limpiar_cadena($_POST["rol"]);
        $datos=['nombre'=>$nombre,'apellido'=>$apellido,'dni'=>$Dni,'passw'=>$passw,'curso'=> $curso,'rol'=>$rol,];
        $insertar = UsuarioModelo::MdlInsertarUsuario($datos);
        return ($insertar->rowCount() >= 1) ? true : false;
    }
    public function CtrActualizarUsuario(){ 
        $nombre = mainModel::limpiar_cadena($_POST['nombre']);
        $apellido = mainModel::limpiar_cadena($_POST['apellido']);
        $pass= mainModel::limpiar_cadena($_POST['pasw']); 
        $curso= mainModel::limpiar_cadena($_POST['curso']);
        $rol= mainModel::limpiar_cadena($_POST['rol']);
        $user_id = $_POST['user_id'] ;
        $datos=['nombre'=>$nombre,'apellido'=>$apellido,'pasw'=>$pass,'curso'=>$curso,'rol'=>$rol,'id'=>$user_id];
        $respuesta = UsuarioModelo::MdlActualizarUsuario($datos);
        return ($respuesta->rowCount() >= 1) ? true : false;
    }
      public function CtrEliminarUsuario()
     {
        $user_id = $_POST['del_id'] ;
        $respuesta= mainModel::ejecutar_consulta_simple("DELETE FROM tbl_docente WHERE id_docente= $user_id");
        return ($respuesta->rowCount() >= 1) ? true : false;
     }
   
}