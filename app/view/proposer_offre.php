<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../session_verification.php';
require_once '../controller/deconnexion.php';

require_once '../controller/offre/add_offre.php';

//var_dump($_POST['num_livraison']);
//include('../../includes/head.php'); 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../../includes/head.php'); ?>
    <title>Proposer offre</title>
</head>

<body>

    <?php include('../../includes/nav.php'); ?>

    <div class="container">

        <div class="form-container">

            <form action="" method="post">

                <input type="hidden" name="numero_livraison" value="<?php echo $_POST['num_livraison'] ?>">

                <div class="form-group">
                    <label for="description-offre" class="form-label">Description de l'offre</label>
                    <textarea class="form-control" name="description-offre" id="description-offre" style="height: 100px"></textarea>
                </div>

                <div class="form-group">
                    <label for="amount" class="form-label">Prix</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="amount" id="amount" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">FCFA</span>
                    </div>
                </div>

                <button type="submit" class="btn bt" name="validation">Valider</button>
                <button type="button" class="btn bt-annuler">Annuler</button>

            </form>

        </div>

    </div>














</body>

</html>