<?php 
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../session_verification.php';
    require_once '../controller/deconnexion.php';

    require_once '../controller/accueil/add_demande.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../../includes/head.php'); ?>
    <title>Ajout de demande</title>
</head>

<body>

    <?php include('../../includes/nav.php'); ?>

    <div class="container">

        <form action="" method="POST" class="form-container">

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" placeholder="Décrivez un peu la demande" name="description" id="description" style="height: 100px"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recovery_place" class="form-label">Lieu de récupération</label>
                        <input type="text" class="form-control" id="recovery_place" name="recovery_place" placeholder="Entrez le lieu de récupération">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recovery_phone" class="form-label">Numéro de récupération</label>
                        <input type="text" class="form-control" id="recovery_phone" name="recovery_phone" placeholder="Entrez le numéro de récupération">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="delivery_place" class="form-label">Lieu de livraison</label>
                        <input type="text" class="form-control" id="delivery_place" name="delivery_place" placeholder="Entrez le lieu de livraison">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="delivery_phone" class="form-label">Numéro de livraison</label>
                        <input type="text" class="form-control" id="delivery_phone" name="delivery_phone" placeholder="Entrez le numéro de livraison">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="execution_date" class="form-label">Date d'exécution</label>
                <input type="date" class="form-control" id="execution_date" name="execution_date">
            </div>

            <button type="submit" class="btn bt" name="validate">Valider</button>


        </form>

    </div>


    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>