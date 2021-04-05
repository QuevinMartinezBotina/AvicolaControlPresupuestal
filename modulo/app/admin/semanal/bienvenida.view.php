<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Entrada de Datos de Usuario</title>
</head>

<body>

    <div class="contai  ner-fluid mx-md-1">

        <div class="">

            <div class="d-flex justify-content-center">






            </div>

        </div>

        <div class="row mt-5 d-flex justify-content-center mb-5">
            <div class="container-fluid contenedor-guardar-usuarios  pl-md-5 pt-md-4 col-md-10">

                <div class="row mb-3 border p-3">

                    <div class="col-12 my-3">
                        <h3 class="text-center">Gastos actuales</h3>
                    </div>

                    <div class="col-md-4 ">
                        <p>Planta: <?php echo number_format($_SESSION["plantatotal"], 2, ",", "."); ?></p>
                    </div>




                    <div class="col-md-4 ">
                        <p>Logistica: <?php echo number_format($_SESSION["logisticatotal"], 2, ",", "."); ?></p>

                    </div>

                    <div class="col-md-4  ">
                        <p>Adobo: <?php echo number_format($_SESSION["adobototal"], 2, ",", "."); ?></p>

                    </div>



                </div>

                <div class="row my-5 border p-3">

                    <?php

                    /* Aquí inicializamos las varibles para que en caso de no exitir valores en la base de daots no nos salgan errores */
                    $_SESSION["presupuestoLogistica"] = 0;
                    $_SESSION["presupuestoPlanta"] = 0;
                    $_SESSION["presupuestoAdobo"] = 0;

                    /* foreach para hacer recorrido de la base de datos y scaar valor de cada presupuesto por area */

                    foreach ($presupuestos as $presupuesto) {


                        if (substr($presupuesto["centro_costo"], 0, 3) == "NPP" | substr($presupuesto["centro_costo"], 0, 3) == "npp") {

                            $_SESSION["presupuestoPlanta"] = $presupuesto["presupuesto"];
                        } elseif (substr($presupuesto["centro_costo"], 0, 3) == "NPL" | substr($presupuesto["centro_costo"], 0, 3) == "npl") {

                            $_SESSION["presupuestoLogistica"] = $presupuesto["presupuesto"];
                        } elseif (substr($presupuesto["centro_costo"], 0, 3) == "NPA" | substr($presupuesto["centro_costo"], 0, 3) == "npa") {

                            $_SESSION["presupuestoAdobo"] = $presupuesto["presupuesto"];
                        }
                    }

                    ?>


                    <!-- Aquí mostramos las variables con los resultados del recorrido -->
                    <div class="col-12">

                        <h3 class="text-center mb-4">Presupuestos</h3>

                    </div>

                    <dvi class="col-md-4">



                        <p>Planta: <?php echo number_format($_SESSION["presupuestoPlanta"], 2, ",", "."); ?></p>

                    </dvi>

                    <dvi class="col-md-4">

                        <p>Logistica: <?php echo number_format($_SESSION["presupuestoLogistica"], 2, ",", "."); ?></p>

                    </dvi>

                    <dvi class="col-md-4">

                        <p>Adobo: <?php echo number_format($_SESSION["presupuestoAdobo"], 2, ",", "."); ?></p>

                    </dvi>
                </div>

                <div class="row border  mb-5 p-3">
                    <div class="col-md-12">
                        <h3 class="text-center mb-4">Cuanto Queda</h3>
                    </div>

                    <dvi class="col-md-4">


                        <p>Planta: <?php
                                    /*Aqui hacemos la resta para saber si estamos gastando mas de lo que presupuestado  */
                                    $controlPresupuestoPlanta = $_SESSION["presupuestoPlanta"] - $_SESSION["plantatotal"];
                                    echo number_format($controlPresupuestoPlanta, 2, ",", ".");

                                    ?></p>

                        <?php
                        /* Apartado de los correos */

                        /* Para planta */
                        $listaControlCorreos = new semanaDao();

                        $ListaCorreos = $listaControlCorreos->listaControlCorreos();

                        $fecha = getdate();

                        /*   print_r($fecha); */

                        $fechaActual = $fecha['year'] . "-" . $fecha['mon'] . "-" . $fecha['mday'];



                        /*  $insertar = new semanaDao();
                        $insertarGastos = $insertar->insertarControlCorreo($_SESSION['plantatotal'], '1', $fechaCompleta); */


                        foreach ($ListaCorreos as $correo) {

                            /*   $correo['id'] = '0'; */

                            /*    if ($correo['id'] == '0') {
                                echo "no hay nada sadasd";

                                $insertar = new semanaDao();
                                $insertarGastos = $insertar->insertarControlCorreo($_SESSION['plantatotal'], '1', $fechaCompleta);

                                $correo['id'] = $correo['id'];
                            } */
                            if (substr($correo["centro_costo"], 0, 3) == "1") {/* Determinamos de que centro de costo se trata */

                                /* Aqui declaramos las variables que vamso a utilzar del centro de costo correspondiente */
                                $id = $correo["id"];
                                $sum_gastos = $correo["sum_gastos"];
                                $centro_costo = $correo["centro_costo"];
                                $fechabaseDatos = $correo["fecha"];

                                /*   $idControlCorreo . "<br>sum gasos " . $sum_gastos . " " . $centro_costo . " " . $fecha; */

                                echo "Total planta: " . $_SESSION['plantatotal'] . " suma gastos: " . $sum_gastos;
                                /* Lueog pasamso a hacer condicionales para determinar si enviamos correo o no */
                                if ($sum_gastos > $_SESSION['presupuestoPlanta']) {
                                    echo "<br>Usted entro a apartaod dodne gastos es mayor a presupusto " . " " . $sum_gastos . " " . $_SESSION['presupuestoPlanta'];
                                    if ($_SESSION['plantatotal'] > $sum_gastos) {
                                        echo "<br> Usted entro al apartado donde el gasto actuAL es mayor al gasto en tabla";
                                        require_once '../../correo.php';

                                        $sum_gastos = $_SESSION["plantatotal"];

                                        $actulizarControlCorreo = new semanaDao();

                                        $actualizar = $actulizarControlCorreo->actualizarControlCorreos($id, $sum_gastos, $fechaActual);
                                    } else if ($sum_gastos = $_SESSION['plantatotal']) {
                                        echo  "<br>Usted entro al apartado dodne gastaos de tabla es igual a gastos actuales<br>";
                                    }
                                }
                            }
                        }


                        ?>


                    </dvi>

                    <dvi class="col-md-4">


                        <p>Logistica: <?php
                                        $controlPresupuestoPlanta = $_SESSION["presupuestoLogistica"] - $_SESSION["logisticatotal"];
                                        echo number_format($controlPresupuestoPlanta, 2, ",", "."); ?></p>

                    </dvi>

                    <dvi class="col-md-4">

                        <p>Adobo: <?php
                                    $controlPresupuestoAdobo = $_SESSION["presupuestoAdobo"] - $_SESSION["adobototal"];
                                    echo number_format($controlPresupuestoAdobo, 2, ",", "."); ?></p>



                    </dvi>


                </div>
            </div>




        </div>

    </div>

</body>

</html>