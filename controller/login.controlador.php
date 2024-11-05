<?php
if ($peticionAjax) {
	require_once "../model/login.modelo.php";
} else {
	require_once "./model/login.modelo.php";
}
class LoginControlador extends LoginModelo
{
	public function CtrIniciarSession()
	{
		$usuario = mainModel::limpiar_cadena($_POST['user']);
		$password = mainModel::limpiar_cadena($_POST['pass']);
		$datosLogin = ["usuario" => $usuario, "password" => $password];
		$respuesta = LoginModelo::MdlIniciarSession($datosLogin);
		if ($respuesta->rowCount() == 1) {
			$row = $respuesta->fetch();
			session_start(["name" => "UIC"]);
			$_SESSION['apellido'] = $row['doc_apellido'];
			$_SESSION['nombre'] = $row['doc_nombre'];
			$_SESSION['rol'] = $row['id_rol'];
			$_SESSION['id']= $row['id_docente'];
			($_SESSION['rol'] == "1")?$url = SERVERURL . "general/": $url = SERVERURL . "dashboard/";
			return $urllocation = '<script> window.location = "' . $url. '"</script>';

		}else{
			echo '<script> Swal.fire("Error", "Credenciales Incorrectas!", "warning");</script>';
			}
			
	}

	public function CtrCerrarSession()
	{
		session_destroy();
		return header("location:" . SERVERURL . "login/");
	}
}
