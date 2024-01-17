<?php
require_once "./model/vistas.modelos.php";
class vistaControlador extends VistasModelo
{
	public function ctrMostrarPlantilla()
	{
		return require_once 'view/plantilla.php';
	}
	public function ctrMostrarVistas()
	{	
		if (isset($_GET["views"])) {
			$ruta = explode("/", $_GET["views"]);
			$respuesta = VistasModelo::MdlMostrarVistas($ruta[0]);
		} else {
			$respuesta = "login";
		}
		return $respuesta;
	}
}
