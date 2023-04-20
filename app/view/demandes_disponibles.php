<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../session_verification.php';
require_once '../controller/deconnexion.php';

require_once '../controller/accueil/display_demande.php';
require_once '../controller/offre/add_offre.php'
//var_dump($_SESSION['user_info'][0]['email']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../../includes/head.php'); ?>
    <title>Demandes disponibles</title>
</head>

<body>

    <?php include('../../includes/nav.php'); ?>

    <div class="container mt-5">

        <!-- <h1 style="font-size: xlarge;"> Demandes disponibles </h1>

        <a class="btn bt mt-5" href="add_demande.php">Faire une nouvelle demande</a> -->

        <div id="displayDataTable" class="mt-3">

            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Client</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date d'exécution</th>
                        <th scope="col" class="">Opérations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $display = read_demande_livreur();

                    while ($row = $display->fetch()) {
                        $num_livraison = $row['num_livraison'];
                        $date_created = $row['date_created'];
                        $description = $row['description'];
                        $recovery_place = $row['recovery_place'];
                        $recovery_phone = $row['recovery_phone'];
                        $delivery_place = $row['delivery_place'];
                        $delivery_phone = $row['delivery_phone'];
                        $execution_date = $row['execution_date'];
                        $fistname = $row['firstname'];
                        $lastname = $row['lastname'];
                    ?>
                        <tr>
                            <td><?php echo $fistname . ' ' . $lastname; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><?php echo $execution_date; ?></td>
                            <td>
                                <!-- Bouton pour voir les détails de la demande -->
                                <form action="" method="post" class="voir-plus-form">
                                    <button type="button" name="voir-plus" value="<?php echo $num_livraison; ?>" class="voir-plus" data-bs-toggle="modal" data-bs-target="#modal_details<?php echo $number; ?>">
                                        Voir plus
                                    </button>
                                </form>
                                <!-- Bouton pour proposer une offre -->
                                <form action="proposer_offre.php" method="post" class="voir-plus-form">
                                    <button type="submit" class="btn bt-modifier" name="proposer_offre" >
                                        Proposer une offre
                                    </button>
                                    <input type="hidden" name="num_livraison" value="<?php echo $num_livraison; ?>">
                                </form>
                            </td>
                            <td>
                                <!-- Modal Détails de la demande -->
                                <div class=" modal fade" id="modal_details<?php echo $number; ?>" tabindex="-1" aria-labelledby="modal_details<?php echo $number; ?>_Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h3 class="modal-title fs-5" id="modal_details<?php echo $number; ?>_Label">Détails de la demande</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body mt-4">

                                                <table class="table table-borderless">

                                                    <tr>
                                                        <td><strong>Auteur</strong></td>
                                                        <td><?php echo $firstname . ' ' . $lastname; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Description</strong></td>
                                                        <td><?php echo $description; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date d'exécution</strong></td>
                                                        <td><?php echo $execution_date; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Lieu de récupération</strong></td>
                                                        <td><?php echo $recovery_place; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Numéro de récupération</strong></td>
                                                        <td><?php echo $recovery_phone; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Lieu de livraison</strong></td>
                                                        <td><?php echo $delivery_place; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Numéro de livraison</strong></td>
                                                        <td><?php echo $delivery_phone; ?></td>
                                                    </tr>

                                                </table>

                                            </div>

                                            <div class="modal-footer">
                                                <!-- Bouton pour proposer une offre -->

                                                <form action="proposer_offre.php" method="POST" class="voir-plus-form">
                                                    <button type="submit" name="proposer_offre" class="btn bt-modifier">
                                                        Proposer une offre
                                                    </button>
                                                    <input type="hidden" name="num_livraison" value="<?php echo $num_livraison; ?>">
                                                </form>
                                                <button type="button" class="btn bt-annuler" data-bs-dismiss="modal">Fermer</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>


                        </tr>
                    <?php
                        $number++;
                    }
                    ?>

                </tbody>
            </table>

        </div>

    </div>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>