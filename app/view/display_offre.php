<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//if (isset($_POST['num_livraison'])) var_dump($_POST['num_livraison']);

require_once '../session_verification.php';
require_once '../controller/deconnexion.php';

require_once '../controller/offre/display_offre.php';

require_once '../controller/offre/read_one_livraison.php';

//var_dump($_SESSION['user_info'][0]['email']);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../../includes/head.php'); ?>
    <title>Afficher offres</title>
</head>

<body>

    <?php include('../../includes/nav.php'); ?>


    <section class="container mt-5">

        <?php
            //$result = read_one_livraison($_POST['num_livraison']);
        ?>

        <div class="row" id="demande">
            <div class="col-md-6">
                <p>
                    <strong>Description : </strong>
                    <?php
                        //echo $result['description'];
                    ?>
                </p>
            </div>
            <div class="col-md-6">
                <p class="text-right">
                    <strong>Date d'exécution : </strong>
                    <?php
                    //echo $result['execution_date'];
                    ?>
                </p>
            </div>
            <div class="col-md-6"></div>
        </div>


        <div class="container mt-5">

            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Livreur</th>
                        <th scope="col">Description</th>
                        <th scope="col">Prix</th>
                        <th scope="col" class="">Opérations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $number = 1;
                    while ($row = $display->fetch()) {
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $description = $row['description'];
                        $amount = $row['amount'];
                        $id_offre = $row['id_offre'];
                    ?>

                        <tr>
                            <td><?php echo $firstname . ' ' . $lastname; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><?php echo $amount; ?></td>
                            <td>
                                <form action="code_recuperation.php" method="post" class="">
                                    <input type="hidden" name="id_offre" value="<?php echo $id_offre; ?>">
                                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                    <button class="btn bt-modifier">Accepter</button>
                                </form> 
                            </td>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>

            </table>

        </div>




    </section>



    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>