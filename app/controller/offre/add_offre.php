<?php

    //$num_livraison = $_POST['num_livraison'];

    //var_dump($num_livraison);

    if(isset($_POST['validation']))
    {

        $num_livraison = $_POST['numero_livraison'];

        //var_dump($num_livraison);
    

        if(isset($_POST['amount']) && !empty($_POST['amount']))
        {

            $description = htmlspecialchars($_POST['description-offre']);
            $amount = htmlspecialchars($_POST['amount']);

            require '../model/model.php';

            $model = new Model();

            $table = 'livreur';
            $field = 'id_livreur';
            $search_field = 'email'; 
            $value = array($_SESSION['user_info'][0]['email']);

            $id = $model -> read_filter_once($table, $field, $search_field, $value) -> fetch();
            
            $id_livreur = $id['id_livreur'][0];

            //var_dump($$_SESSION['user_info'][0]['email']);

            $table = 'offre';
            $fields = 'description, amount, id_livreur, num_livraison';
            $values = '?,?,?,?';
            $data = array($description, $amount, $id_livreur, $num_livraison);

            //var_dump($description);
            //var_dump($id_livreur);
            //var_dump($num_livraison);
            //var_dump($amount);

            $model -> add($table, $fields, $values, $data);

            echo "<script>alert('Votre offre a été bien soumise.')</script>";
            



        }
    }

    

?>

