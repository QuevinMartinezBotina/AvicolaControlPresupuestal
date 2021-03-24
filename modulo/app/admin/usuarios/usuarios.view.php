<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../css/estilos-menu.css">
    <link rel="stylesheet" href="../../../../css/pushbar.css">
    <link rel="stylesheet" href="../../../../css/estilos.usuarios.css">

    <!-- Icono -->
    <link rel="icon" href="../../../../img/icono.ico" type="image/png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Usuarios</title>
</head>

<body>
    <div class="contenedor">
        <!-- <header>
			<h1>FalconMasters</h1>
			<h2>Lorem Ipsum Premium Store</h2>
		</header> -->
        <main>
            <nav>

                <div class="row">

                    <div class="col-2">

                        <!-- Boton menú -->

                        <button class="boton-para-menu p-3 " data-pushbar-target="pushbar-menu"><i class="fas fa-bars"></i></button>


                    </div>

                    <div class="col-9 d-flex justify-content-end ml-1">
                        <a href="../../cerrar.php" class="d-flex align-self-center">Cerrar Sesión</a>
                    </div>
                </div>

            </nav>


            <!-- Contenido Menú -->
            <div data-pushbar-id="pushbar-menu" class="pushbar pushbar-menu " data-pushbar-direction="left">


                <nav class="">
                    <div class="row">
                        <div class="col-12">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <img class=" img-fluid my-2" src="../../../../img/profile-blue.svg" alt="" style="height: 100px;">
                                <p class="pb-2 text-center">Administrador</p>
                                <hr>
                                <a class=" nav-link p-3 " href="contenido.php"><i class="fas fa-home icono"></i> Inicio</a>

                                <a class=" nav-link p-3 " href="../productos/productos.php"><i class="fas fa-server icono"></i> Productos</a>
                                <a class=" nav-link p-3 active " href="#"><i class="fas fa-users icono"></i> Usuarios</a>
                                <a class=" nav-link p-3" href="../proveedores/proveedores.php"><i class="fas fa-truck icono"></i> Proveedores</a>
                                <a class=" nav-link p-3" href="../cargos/cargos.php"><i class="fa fa-address-card icono"></i> Cargos</a>
                                <a class=" nav-link p-3" href="../categorias/categorias.php"><i class="fa fa-cubes icono"></i> Categorías</a>
                                <a class=" nav-link p-3" href="../sucursales/sucursales.php"><i class="fa fa-building icono"></i> Sucursales</a>
                                <a class=" nav-link p-3" href="../empleados/empleados.php"><i class="fa fa-male icono" ></i> Empleados</a>
                                <a class=" nav-link p-3" href="../movimientos/movimientos.php"><i class="fa fa-shopping-basket icono" ></i> Compras y Ventas</a>
                                <a class=" nav-link p-3 " href="../empresa/empresa.php"><i class="fa fa-building icono"></i> Empresa</a>






                            </div>
                        </div>

                    </div>
                </nav>
            </div>


            <!-- SECIONES -->
            <section class="productos ">

                <div class="col-12">
                    <div class="tab-content" id="v-pills-tabContent">


                        <!--*************** INVENTARIO********** -->
                        <div class="tab-pane fade show active texto	" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="text-center texto-usuarios p-2 ">Usuarios</h1>
                                    <!-- ***OPCIONES DENTRO DE Inventario (CRUD)** -->

                                    <div>

                                        <?php



                                        if (isset($_GET['action'])) {

                                            if ($_GET['action'] == "actualizar") {

                                                $action = "mostrar";
                                            } else {
                                                $action = $_GET['action'];
                                            }
                                        } else {
                                            $action = "inicio";
                                        }

                                        require_once "header.php";

                                        ?>
                                    </div>

                                    <div class="container-fluid">

                                        <?php

                                        require_once "../../../ruta/routing.php";

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>












                    </div>
                </div>

            </section>
        </main>


    </div>

    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script src="../../../../js/pushbar.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
        var nbsp = new Pushbar({
            blur: true,
            overlay: true,
            nbsp
        });
    </script>

</body>

</html>