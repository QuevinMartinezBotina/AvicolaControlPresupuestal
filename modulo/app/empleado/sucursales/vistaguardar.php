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

    <div class="container-fluid mx-md-1  ">

        <div class="">

            <div class="d-flex justify-content-center  ">


                <form action="?action=guardar" method="post" class="container contenedor-guardar-usuarios animacion-lateral pl-md-5 pt-md-4">

                    <div class="row">
                        <div class="col-11 mx-1">

                            <?php
                            if (empty($mensaje) == false) {

                                echo "<div class='alert alert-warning alert-dismissible fade show'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            " . $mensaje . "</div>";
                            }
                            ?>


                        </div>

                        <div class="col-md-2 ">

                            <label>ID Sucursal</label>
                            <input type="num" name="idsucursal" class="form-control" value="<?php if (isset($idsucursal)) {
                                                                                                echo $idsucursal;
                                                                                            } ?>">
                        </div>

                        <div class="col-md-3 mx-2">

                            <label>Nombre Sucursal</label>
                            <input type="text" name="nomsucursal" class="form-control" value="<?php if (isset($nomsucursal)) {
                                                                                                echo $nomsucursal;
                                                                                            } ?>">
                        </div>

                        
                        <div class="col-md-4 mr-2 ">

                            <label>Direcci??n</label>
                            <input type="text" name="direccion" class="form-control" value="<?php if (isset($direccion)) {
                                                                                                echo $direccion;
                                                                                            } ?>">
                        </div>

                        
                        <div class="col-md-2 ">

                            <label>Ciudad</label>
                            <input type="text" name="ciudad" class="form-control" value="<?php if (isset($ciudad)) {
                                                                                                echo $ciudad;
                                                                                            } ?>">
                        </div>




                    </div>


                    <br>
                    <center>
                        <button type="submit" name="boton" value="guardar" class="btn btn-primary my-2 p-2 mx-2">
                            <i class="fas fa-check"></i> Guardar
                        </button>
                        <button type="submit" name="boton" value="limpiar" class="btn btn-warning my-2 p-2">
                            <i class="fas fa-trash"></i> Limpiar
                        </button>
                    </center>
                </form>

                
            </div>
        </div>

    </div>

</body>

</html>