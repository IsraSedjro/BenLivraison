<?php

    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../session_verification.php';
    require_once '../controller/deconnexion.php';

    //require '';

    $id_offre = $_POST['id_offre'];
    $amount = $_POST['amount'];
    //var_dump($id_offre);
    //var_dump($amount);

    require '../controller/offre/save_recovery_code.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../includes/head.php'); ?>
    <title>Code de récupération</title>
    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
</head>
<body>
    
    <?php 
        include('../../includes/nav.php');
    ?>

    <div class="container mt-5">

        <div class="form-container mt-5">

            <form action="" method="post">

                <div class="form-group">
                    <label for="recovery_key" class="form-label">Entrez un code de récupération pour le livreur.</label>
                    <input type="text" class="form-control" name="recovery_key" id="recovery_key"></input type="text">
                </div>

                <input type="hidden" name="id_offre" value="<?php echo $id_offre; ?>">

                <input type="hidden" name="amount" value="<?php echo $amount; ?>">

                <button type="submit" name="payer_offre" class="btn bt" id="pay-btn">Payer l'offre</button>

            </form>


            <!--<form action="" method="POST">
                <input type="hidden" name="field" value="test">

                <div class="form-group">
                    <label for="recovery_key" class="form-label">Entrez un code de récupération pour le livreur.</label>
                    <input type="text" class="form-control" name="recovery_key" id="recovery_key">
                </div>

                <input type="hidden" name="id_offre" value="<?php //echo $id_offre; ?>">

                <input type="hidden" name="amount" value="<?php //echo $amount; ?>">

                <script
                    src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                    data-public-key="pk_sandbox_C6TJiPQZgTDLu4U4JAQ7Xxso"
                    data-button-text="Payer l'offre"
                    data-button-class="btn bt"
                    data-transaction-amount="1000"
                    data-transaction-description="Transaction description"
                    data-currency-iso="XOF">
                </script>
            </form> -->



        </div>

        <!-- <button class="btn bt-modifier" id="pay-btn">Payer l'offre</button> -->

    </div>


    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">

        FedaPay.init('#pay-btn', { public_key : 'pk_sandbox_C6TJiPQZgTDLu4U4JAQ7Xxso' });

    </script> 


</body>
</html>