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

                                    /* Aquí hacemos la verificación de si se paso del presupuesto para poder enviar un correo avisando de esto*/



                                    if ($_SESSION["plantatotal"] > $_SESSION["presupuestoPlanta"]) {
                                        /* header("location:http://localhost/ControlPresupuestal/modulo/app/correo.php"); */
                                        /* header('location:mostrar.php'); */

                                        $comprobanteEnvioCorreo = 0;
                                        $_SESSION["comprobanteCambioTotal"] = 0;

                                        if ($_SESSION["plantatotal"] > $_SESSION["comprobanteCambioTotal"]) {

                                            $dao = new semanaDao();
                                            $Ccosto = $dao->listaCcosto();
                                            $tam = sizeof($Ccosto);

                                            /* require '../../correo.php'; */
                                            $_SESSION["comprobanteCambioTotal"] = $_SESSION["plantatotal"];
                                            echo "     " . $_SESSION["comprobanteCambioTotal"];
                                        }
                                    }

                                    ?></p>


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