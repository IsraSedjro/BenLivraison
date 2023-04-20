<?php 

//var_dump($_POST['num_livraison']);

    function read_one_livraison($num_livraison)
    {
        require '../model/model.php';

        $model = new Model();

        $table = 'livraison';
        $fields = 'description, execution_date';
        $search_field = 'num_livraison';
        $value = array($num_livraison);

        $request = $model -> read_filter_once($table, $fields, $search_field, $value) -> fetch();

        //var_dump($display['execution_date']);

        return $request;
    }

?>
