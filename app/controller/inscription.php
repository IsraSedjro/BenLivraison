<?php

    if(isset($_POST['inscription'])) {

        if(
            isset($_POST['lastname']) && !empty($_POST['lastname']) &&
            isset($_POST['firstname']) && !empty($_POST['firstname']) &&
            isset($_POST['gender']) && !empty($_POST['gender']) &&
            isset($_POST['telephone']) && !empty($_POST['telephone']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['password']) && !empty($_POST['password']) &&
            isset($_POST['confirm_password']) && !empty($_POST['confirm_password']) &&
            isset($_POST['adress']) && !empty($_POST['adress'])
        
        ) {

            require_once '../model/model.php';

            $model = new Model();

            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $gender = $_POST['gender'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $adress = $_POST['adress'];


            $table_verify = 'client';
            $fields_verify = '*';
            $search_field_verify = 'email';
            $value_verify = array($email);

            $query = $model -> read_filter_once_verify($table_verify, $fields_verify, $search_field_verify, $value_verify);

            if($query) {
                echo "<script>alert(\"Email déjà utilisé !\")</script>";
                exit();
            }


            // Vérification de l'unicité des mots de passe

            if ($password === $confirm_password) {

                $table = 'client';
                $fields = 'email, lastname, firstname, gender, telephone, address, password';
                $values = '?,?,?,?,?,?,?';
                $data = array($email, $lastname, $firstname, $gender, $telephone, $adress, sha1($password));

                $model -> add($table, $fields, $values, $data);

                echo '<script>alert("Votre compte a été crée avec succes")</script>';

                //header('location: connexion.php');
            } 
            else 
            {
                echo '<script>alert("Mots de passe non identiques.")</script>';
                //header('location: inscription.php');
            }
        }
        else echo '<script>alert("Erreur ! Tous les champs sont requis")</script>';

    }

?>