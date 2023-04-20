<?php 
        
    //if(isset($id_offre)) var_dump($id_offre);
    //if(isset($amount)) var_dump($amount);

        if(isset($_POST['recovery_key']) && !empty($_POST['recovery_key'])) 
        {
            $recovery_key = htmlspecialchars($_POST['recovery_key']);

            //var_dump($recovery_key);

            require '../model/model.php';
            $model = new Model();

            $table = 'offre';
            $field = 'recovery_key';
            $search_field = 'id_offre';
            $data = array($recovery_key, $id_offre);

            if($model -> update($table, $field, $search_field, $data)) {
                echo "<script>alert('Clé de récupération bien ajoutée.')</script>";
            }

        }

?>


