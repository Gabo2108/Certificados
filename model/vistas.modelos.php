<?php

class VistasModelo
{
    protected function MdlMostrarVistas($vistas)
    {
        $listaBlanca = ["dashboard","salir","404","permiso","general","estudiantes","usuarios","cursos","files"];
        if (in_array($vistas, $listaBlanca)) {
            if (is_file("./view/content/" . $vistas . "-view.php")) {
                $contenido = "./view/content/" . $vistas . "-view.php";
            } else {
                $contenido = "login";
            }
        } elseif ($vistas == "login") {
            $contenido = "login";
        } elseif ($vistas == "index") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
