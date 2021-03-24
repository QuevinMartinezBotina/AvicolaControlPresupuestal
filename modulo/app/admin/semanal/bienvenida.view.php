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


                <form action="?action=guardarpresupuesto" method="POST" class="container contenedor-guardar-usuarios  pl-md-5 pt-md-4">

                    <div class="row">
                        <div class="col-md-11 ">

                            <?php
                            if (empty($mensaje) == false) {

                                echo "<div class='alert alert-warning alert-dismissible fade show '>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            " . $mensaje . "</div>";
                            }
                            ?>


                        </div>

                        <div class="col-md-6">

                            <label>Centro de costo</label>
                            <input type="text" name="centro_costo" class="form-control p-1 " value="<?php if (isset($centro_costo)) {
                                                                                                        echo $centro_costo;
                                                                                                    } ?>">
                        </div>

                        <div class="col-md-5 mx-md-2">

                            <label>Presupuesto </label>
                            <input type="number" name="presupuesto" class="form-control p-1" value="<?php if (isset($presupuesto)) {
                                                                                                        echo $presupuesto;
                                                                                                    } ?>">
                        </div>





                    </div>

                    <br>
                    <center>
                        <button type="submit" name="boton" value="guardar" class="btn btn-primary my-4 p-2 mx-2">
                            <i class="fas fa-check"></i> Guardar
                        </button>
                        <button type="submit" name="boton" value="limpiar" class="btn btn-warning my-2 p-2">
                            <i class="fas fa-trash"></i> Limpiar
                        </button>
                    </center>
                </form>



            </div>

        </div>

        <div class="row mt-5 d-flex justify-content-center mb-5">
            <div class="container contenedor-guardar-usuarios  pl-md-5 pt-md-4 col-md-10">

                <div class="row mb-3 border p-3">

                    <div class="col-12 my-3">
                        <h3 class="text-center">Recibido</h3>
                    </div>

                    <div class="col-md-5 mr-1 ">
                        <p>Gasto actual de Planta: <?php echo number_format($_SESSION["plantatotal"], 2, ",", "."); ?></p>
                    </div>




                    <div class="col-md-5 mr-1 ">
                        <p>Gasto actual de Logistica: <?php echo number_format($_SESSION["logisticatotal"], 2, ",", "."); ?></p>

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
            </div>




        </div>

    </div>

</body>

</html>