<?php

    require_once '../model/model.php';

    $model = new Model();

    $table = 'client';
    $field = '*';

    $read = $model -> read($table, $field);


?>