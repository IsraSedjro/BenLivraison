<?php

    //session_start();

    //var_dump($_SESSION['user_info'][0]['email']);

    //require 'app/core/view/accueil.php';
    //require 'function_accueil.php';



    if(isset($_POST['validate'])) {

        if(
            isset($_POST['description']) && !empty($_POST['description']) &&
            isset($_POST['execution_date']) && !empty($_POST['execution_date']) &&
            isset($_POST['recovery_place']) && !empty($_POST['recovery_place']) &&
            isset($_POST['recovery_phone']) && !empty($_POST['recovery_phone']) &&
            isset($_POST['delivery_place']) && !empty($_POST['delivery_place']) &&
            isset($_POST['delivery_phone']) && !empty($_POST['delivery_phone']) 
        ) {
            $description = $_POST['description'];
            $execution_date = $_POST['execution_date'];
            $recovery_place = $_POST['recovery_place'];
            $recovery_phone = $_POST['recovery_phone'];
            $delivery_place = $_POST['delivery_place'];
            $delivery_phone = $_POST['delivery_phone'];

            $email = $_SESSION['user_info'][0]['email'];  

            require_once '../model/model.php';

            $model = new Model();

            $table = 'livraison';
            $fields = 'description, recovery_place, recovery_phone, delivery_place, delivery_phone, execution_date, email';
            $values = '?,?,?,?,?,?,?';
            $data = array($description, $recovery_place, $recovery_phone, $delivery_place, $delivery_phone, $execution_date, $email);

            $result = $model -> add($table, $fields, $values, $data);

            //var_dump($result);

            echo '<script>alert("Demande publiée avec succès")</script>';

            header('location: accueil.php');
        }
    }

?>