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

                            <label>ID Producto</label>
                            <input type="num" name="id_producto" class="form-control" value="<?php if (isset($id_producto)) {
                                                                                                    echo $id_producto;
                                                                                                } ?>">
                        </div>

                        <div class="col-md-3 mx-2">

                            <label>Nombre Producto</label>
                            <input type="text" name="nom_producto" class="form-control" value="<?php if (isset($nom_producto)) {
                                                                                                    echo $nom_producto;
                                                                                                } ?>">
                        </div>


                        <div class="col-md-3 mr-2 ">

                            <label>Precio</label>
                            <input type="num" name="pre_producto" class="form-control" value="<?php if (isset($pre_producto)) {
                                                                                                    echo $pre_producto;
                                                                                                } ?>">
                        </div>


                        <div class="col-md-3 ">

                            <label>Cantidad</label>
                            <input type="num" name="cant_producto" class="form-control" value="<?php if (isset($cant_producto)) {
                                                                                                    echo $cant_producto;
                                                                                                } ?>">
                        </div>


                        <div class="col-md-3 mr-2">



                            <label for="">ID Categoria</label>
                            <select name="id_categoria" class="form-control">
                                <option value="0">seleccione una categoria</option>
                                <?php

                                include "conexion.php";
                                $cnx = conexion::conectar();
                                $sql = "SELECT id_categoria, nomcategoria FROM categoria";
                                $stmt = $cnx->prepare($sql);
                                $stmt->execute();
                                $filas = $stmt->fetchAll(PDO::FETCH_OBJ);

                                foreach ($filas as $i) {

                                ?>

                                    <option value="<?php print($i->id_categoria); ?>"><?php print($i->nomcategoria); ?></option>


                                <?php
                                }

                                ?>

                            </select><br>


                        </div>

                        <div class="col-md-8 ">

                            <label>Detalles </label>
                            <input type="text" name="deta_producto" class="form-control" value="<?php if (isset($deta_producto)) {
                                                                                                    echo $deta_producto;
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