<?php

require_once '../../../modelo/semanadao.php';
$dao = new semanaDao();
$dao->EliminarTodo();

require_once 'mostrar.php';
