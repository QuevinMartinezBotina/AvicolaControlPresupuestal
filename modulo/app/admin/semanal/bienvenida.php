<?php

require_once '../../../modelo/semanadao.php';

/* para consultar presupuestos */

$dao = new semanaDao();
$presupuestos = $dao->listaPresupuesto();
$tam = sizeof($presupuestos);

/* Guardar un presupuesto nuevo */

$dao = new semanaDao();
if (isset($_POST['boton'])) {

    if ($_POST['boton'] == 'guardar') {


        if (
            isset($_POST['centro_costo']) & isset($_POST['presupuesto'])
        ) {

            $centro_costo = htmlspecialchars($_POST['centro_costo']);
            $presupuesto = htmlspecialchars($_POST['presupuesto']);

            if (empty($centro_costo) | empty($presupuesto)) {
                $mensaje = "Campo Vacio";
            } else {


                $mensaje = $dao->insertarPresupuesto($centro_costo, $presupuesto);
            }
        }
    } else if ($_POST['boton'] == 'limpiar') {


        $centro_costo = "";
        $presupuesto = "";
    }
}



require_once 'bienvenida.view.php';
