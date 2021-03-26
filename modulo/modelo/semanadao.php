<?php

include 'conexion.php';

class semanaDao extends Conexion
{



  /* -----------INSERTAR UNA SEMANA-------------- */

  public function insertar($fecha, $articulo, $valor_total, $centro_costo, $proveedor, $detalles)
  {
    $mensaje = "";
    try {
      $conexion = Conexion::conectar();
      $sql = "INSERT INTO mantenimiento(id, fecha ,articulo, valor_total, centro_costo,proveedor, detalles) 
      VALUES (NULL, :fecha ,:articulo, :valor_total, :centro_costo, :proveedor, :detalles);";

      $stmt = $conexion->prepare($sql);

      $stmt->bindParam(":fecha", $fecha);
      $stmt->bindParam(":articulo", $articulo);
      $stmt->bindParam(":valor_total", $valor_total);
      $stmt->bindParam(":centro_costo", $centro_costo);
      $stmt->bindParam(":proveedor", $proveedor);
      $stmt->bindParam(":detalles", $detalles);



      $stmt->execute();
      $fila = $stmt->rowCount();
      $mensaje = "Se guardo con exito!!";
    } catch (PDOException $e) {

      if ($e->errorInfo[1] == 1062) {
        $mensaje = "día Existe!!";
        // duplicate entry, do something else
      } else {
        // an error other than duplicate entry occurred
        echo $e->errorInfo[1];
      }
    }
    return $mensaje;
  }

  /* -----------INSERTAR UN presupuesto-------------- */

  public function insertarPresupuesto($centro_costo, $presupuesto)
  {
    $mensaje = "";
    try {
      $conexion = Conexion::conectar();
      $sql = "INSERT INTO presupuesto(centro_costo, presupuesto) VALUES ( :centro_costo , :presupuesto);";

      $stmt = $conexion->prepare($sql);

      $stmt->bindParam(":centro_costo", $centro_costo);
      $stmt->bindParam(":presupuesto", $presupuesto);

      $stmt->execute();
      $fila = $stmt->rowCount();
      $mensaje = "Se guardo con exito!!";
    } catch (PDOException $e) {

      if ($e->errorInfo[1] == 1062) {
        $mensaje = "Ya Existe!!";
        // duplicate entry, do something else
      } else {
        // an error other than duplicate entry occurred
        echo $e->errorInfo[1];
      }
    }
    return $mensaje;
  }


  /* ----------------LISTA DE SEMANAS ---------------------*/
  public function lista()
  {
    $conexion = Conexion::conectar();
    $sql = "SELECT * FROM mantenimiento order by id asc;";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $array;
  }


  /* ----------------LISTA DE PRESUPUESTO POR CENTROS ---------------------*/
  public function listaPresupuesto()
  {
    $conexion = Conexion::conectar();
    $sql = "SELECT * FROM presupuesto order by  centro_costo asc;";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $array;
  }


  /*   public function listausuario($numid)
  {
    $conexion = Conexion::conectar();
    $sql = "SELECT * FROM usuario where numid=:numid order by numid asc;";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(":numid", $numid);
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $array;
  } */



  /* ---------------ACTUALIZAR UN SEMANA-------------------------- */
  public function actualizar($id, $fecha, $articulo, $valor_total, $centro_costo, $proveedor, $detalles)
  {

    $mensaje = "";
    try {

      $conexion = Conexion::conectar();
      $sql = "UPDATE mantenimiento SET fecha=:fecha, articulo=:articulo, valor_total=:valor_total, centro_costo=:centro_costo, proveedor=:proveedor, detalles=:detalles
       where id=:id ;";
      $stmt = $conexion->prepare($sql);

      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":fecha", $fecha);
      $stmt->bindParam(":articulo", $articulo);
      $stmt->bindParam(":valor_total", $valor_total);
      $stmt->bindParam(":centro_costo", $centro_costo);
      $stmt->bindParam(":proveedor", $proveedor);
      $stmt->bindParam(":detalles", $detalles);

      $stmt->execute();
      $mensaje = "Se actualizo con exito!!";
    } // fin de try

    catch (PDOException $e) {

      $mensaje = "Problemas al Actualizar Consulte con el Administrador del Sistema!!";
    } // fin del catch

    return $mensaje;
  } // fin del metodo       



  /* ----------------ELIMINAR UNA SEMANA------------------ */

  public function eliminar($id)
  {
    $mensaje = "";
    try {

      $conexion = Conexion::conectar();
      $sql = "DELETE from mantenimiento WHERE id=:id;";
      $stmt = $conexion->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      $mensaje = "Eliminó con Exito";
    } // fin del try

    catch (PDOException $e) {
      $mensaje = "Problemas al Eliminar consulte con el administrador";
    } // fin del catch

    return $mensaje;
  } // fin del metodo eliminarUsuario

  public function EliminarTodo()
  {
    $mensaje = "";
    try {

      $conexion = Conexion::conectar();
      $sql = "DELETE from mantenimiento ;";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $mensaje = "Eliminó con Exito";
    } // fin del try

    catch (PDOException $e) {
      $mensaje = "Problemas al Eliminar consulte con el administrador";
    } // fin del catch

    return $mensaje;
  } // fin del metodo eliminarUsuario


  /*  public function eliminarUsuarios()
  {
    $mensaje = "";
    try {

      $conexion = Conexion::conectar();
      $sql = "delete from usuario";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $mensaje = "Eliminó, Usuarios con Exito";
    } // fin del try

    catch (PDOException $e) {
      $mensaje = "Problemas al Eliminar consulte con el administrador";
    } // fin del catch

    return $mensaje;
  } */ // fin del metodo eliminarUsuario



}// fn de clase