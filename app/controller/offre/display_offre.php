<?php 

    //if(isset($_POST['num_livraison'])) var_dump($_POST['num_livraison']);

    $num_livraison = $_POST['num_livraison'];
    
    require '../model/model.php';

    //$model = new Model();

    $model = new Model();

    $display = $model -> display_offre_for_one_livraison($num_livraison);

    //var_dump($display);

?>