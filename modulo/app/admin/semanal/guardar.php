<?php
require_once '../../../modelo/semanadao.php';
$dao = new semanaDao();
if (isset($_POST['boton'])) {

    if ($_POST['boton'] == 'guardar') {


        if (
            isset($_POST['fecha']) & isset($_POST['articulo'])  & isset($_POST['valor_total'])  & isset($_POST['area'])  & isset($_POST['proveedor'])
            & isset($_POST['detalles'])
        ) {

            $fecha = htmlspecialchars($_POST['fecha']);
            $articulo = htmlspecialchars($_POST['articulo']);
            $valor_total = htmlspecialchars($_POST['valor_total']);
            $area = htmlspecialchars($_POST['area']);
            $proveedor = htmlspecialchars($_POST['proveedor']);
            $detalles = htmlspecialchars($_POST['detalles']);





            if (empty($fecha) | empty($articulo) | empty($valor_total) | empty($area) | empty($proveedor) | empty($detalles)) {
                $mensaje = "Campo Vacio";
            } else {


                $mensaje = $dao->insertar($fecha, $articulo, $valor_total, $area, $proveedor, $detalles);
            }
        }
    } else if ($_POST['boton'] == 'limpiar') {


        $fecha = "";
        $articulo = "";
        $valor_total = "";
        $area = "";
        $proveedor = "";
        $detalles = "";
    }
}

require_once 'vistaguardar.php';
