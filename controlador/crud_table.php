<?php
include 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre =   (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$Dni = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
$pass = (isset($_POST['pasw'])) ? $_POST['pasw'] : '';
$curso = (isset($_POST['curso'])) ? $_POST['curso'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$fecha_inicio = (isset($_POST['fecha_inicio'])) ? $_POST['fecha_inicio'] : '';
$fecha_fi = (isset($_POST['fecha_fin'])) ? $_POST['fecha_fin'] : '';
$inicio = strtotime($fecha_inicio); //Convierte el string a formato de fecha en php
$fin = strtotime($fecha_fi); //Convierte el string a formato de fecha en php
$inicio = date('Y-m-d', $inicio); //Lo comvierte a formato de fecha en MySQL
$fin = date('Y-m-d', $fin); //Lo comvierte a formato de fecha en MySQL
$codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : '';
$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
$idocente = (isset($_POST['elemto'])) ? $_POST['elemto'] : '';



switch ($opcion) {
    case 1:
        $consulta = "INSERT INTO usuarios (username, first_name, last_name, gender, password, status) VALUES('$username', '$first_name', '$last_name', '$gender', '$password', '$status') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM usuarios ORDER BY user_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "UPDATE tbl_estudiante SET est_nombre='$nombre', est_apellido='$apellido', 
        est_fecha_inicio='$inicio', est_fecha_fin='$fin'
         WHERE id_estudiante='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT *  FROM tbl_estudiante as e, tbl_curso as c, tbl_docente as d where  
        e.id_curso=c.id_curso and  c.id_curso=d.id_curso and d.id_docente= '$idocente' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:
        $consulta = "DELETE FROM tbl_estudiante WHERE id_estudiante='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
    case 4:
        $consulta = "SELECT *  FROM tbl_estudiante as e, tbl_curso as c, tbl_docente as d where  
        e.id_curso=c.id_curso and  c.id_curso=d.id_curso and d.id_docente= '$idocente' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta = "SELECT * FROM tbl_estudiante as e, tbl_curso as c,tbl_tipo as t 
        where e.id_curso=c.id_curso and c.id_tipo=t.id_tipo";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 6:
        $consulta = "SELECT * FROM tbl_curso as c,tbl_tipo as t 
        where c.id_tipo=t.id_tipo";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 7;
        $consulta = "UPDATE tbl_curso SET cur_nombre='$nombre', cur_codigo='$codigo', 
        id_tipo='$tipo' WHERE id_curso='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM tbl_curso as c,tbl_tipo as t 
        where c.id_tipo=t.id_tipo";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 8:
        $consulta = "DELETE FROM tbl_curso WHERE id_curso='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
    case 9:
        $consulta = "INSERT INTO tbl_curso (cur_nombre, cur_codigo,cur_horas, id_tipo)
         VALUES('$nombre', '$codigo', '$horas', '$tipo') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM tbl_curso ORDER BY user_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 10:
        $consulta = "SELECT * FROM tbl_docente as d,tbl_rol as r, tbl_curso as c
        where d.id_rol=r.id_rol and c.id_curso=d.id_curso";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 11:
        $consulta = "INSERT INTO tbl_docente (doc_nombre, doc_apellido,doc_cedula,doc_contrasenia, id_curso,id_rol)
        VALUES('$nombre', '$apellido', '$Dni', '$pass','$curso','$rol') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM tbl_docente ORDER BY user_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 12:
        $consulta = "UPDATE tbl_docente SET doc_nombre='$nombre', doc_apellido='$apellido', 
        id_curso='$curso', id_rol='$rol' WHERE id_docente='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
    case 13:
        $consulta = "DELETE FROM tbl_docente WHERE id_docente='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$conexion = null;
