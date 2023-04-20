<?php

    session_start();

    

    if(isset($_POST['connexion'])) {

        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once '../model/model.php';

            $model = new Model();
             
            $table = 'client';
            $fields = '*';
            $search_field = 'email';
            $data = array($email);

            $query = $model -> read_filter_once($table, $fields, $search_field, $data);
            $pass = $query->fetch();

           

            if($pass) {
                if($pass['password'] == sha1($password)) {
                    require_once '../../utils/methods.php';
                    $info = array([
                            'email' => $email, 
                            'lastname' => $pass['lastname'], 
                            'firstname' => $pass['firstname'],
                            'gender' => $pass['gender'],
                            'telephone' => $pass['telephone'],
                            'address' => $pass['address'],
                            'date_joined' => $pass['date_joined'],
                            'balance_portefeuille' => $pass['balance_portefeuille'],
                            'role' => $pass['role']
                        ]);
                
                    authenticate($info);

                    //var_dump($_SESSION['user_info']);
                    //echo '<script>alert("Bienvenue")</script>';

                    if (!headers_sent()) {
                        header('Location: ../view/accueil.php');
                        exit;
                    } else {
                        error_log('Erreur de redirection: les en-têtes ont déjà été envoyés, veuillez vérifier votre code.');
                    }
                }
                else echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect")</script>';
            }
            else echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect")</script>';

        }

        
    }

?>