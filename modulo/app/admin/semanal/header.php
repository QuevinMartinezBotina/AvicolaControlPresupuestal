<div class=" col-12 ">
  <ul class="nav nav-pills mb-3">
    <li class="nav-item">
      <a class="nav-link  bordes p-3
      <?php
      if ($action == "mostrar") echo "active";
      ?>
      " href="?action=mostrar">Lista Gastos</a>
    </li>

    <li class="nav-item">
      <a class="nav-link bordes p-3
      <?php
      if ($action == "guardarpresupuesto") echo "active";
      ?>
      " href="?action=guardarpresupuesto">Control Presupuesto</a>
    </li>

    <li class="nav-item">
      <a class="nav-link bordes p-3
      
      <?php
      if ($action == "guardar") echo "active";
      ?> 
      " href="?action=guardar">Agregar</a>
    </li>
  </ul>
</div>