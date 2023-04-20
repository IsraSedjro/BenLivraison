<?php 
    
    // Function to read the "livraisons" for a client.
    function read_demande_client() 
    {
        require_once '../model/model.php';
        //require_once 'app/utils/methods.php';

        $model = new Model();

        //var_dump($model);

        $email = $_SESSION['user_info'][0]['email'];


        $table = 'livraison';
        $fields = '*';
        $search_field = 'email';
        $value = array($email);


        $display = $model -> read_filter_once($table, $fields, $search_field, $value);

        return $display;
    }


    // Function to read all "livraisons" available.
    function read_demande_livreur()
    {
        require_once '../model/model.php';
        //require_once 'app/utils/methods.php';

        $model = new Model();

        //var_dump($model);

        $table1 = 'client';
        $table2 = 'livraison';
        $fields = 'firstname, lastname, num_livraison, date_created, description, recovery_place, recovery_phone, delivery_place, delivery_phone, execution_date'; 
        $value = 'email';  

        $display = $model -> read_jointure($table1, $table2, $fields, $value);

        return $display;
    }

?>