<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../session_verification.php';
require_once '../controller/deconnexion.php';

require_once '../controller/accueil/display_demande.php';

//var_dump($_SESSION['user_info'][0]['email']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../../includes/head.php'); ?>
    <title>Accueil</title>
</head>

<body>

    <?php include('../../includes/nav.php'); ?>

    <div class="container">

        <?php

        if ($_SESSION['user_info'][0]['role'] != 3 && $_SESSION['user_info'][0]['role'] != 2) {

        ?>

            <section class="container mt-5" id="presenter-portefeuille">

                <div class="row">

                    <div class="col-md-8">
                        <span id="montant">
                            <span style="margin-bottom: 0;"><strong>0.0 F</strong></span> <br>
                            <span style="margin-bottom: 0;">Portefeuille</span>
                        </span>
                    </div>

                    <div id="transaction" class="col-md-4">

                        <div class="row">
                            <div class="col-md-6 text-right">
                                <span id="historique">
                                    <span style="margin-bottom: 0;">
                                        <i class="material-icons material-symbols-outlined">rotate_left</i>
                                    </span> <br>
                                    <span style="margin-bottom: 0;">Historique</span>
                                </span>
                            </div>

                            <div class="col-md-6 text-right">
                                <span id="recharger">
                                    <span style="margin-bottom: 0;">
                                        <i class="material-icons material-symbols-outlined">add</i>
                                    </span> <br>
                                    <span style="margin-bottom: 0;">Recharger</span>
                                </span>
                            </div>
                        </div>

                    </div>

                </div>

            </section>



            <a class="btn bt mt-5" href="add_demande.php">Faire une nouvelle demande</a>

            <div id="d isplayDataTable" class="mt-3">

                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Numéro</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date d'exécution</th>
                            <th scope="col" class="">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $display = read_demande_client();

                        $number = 1;

                        while ($row = $display->fetch()) {
                            $num_livraison = $row['num_livraison'];
                            $date_created = $row['date_created'];
                            $description = $row['description'];
                            $recovery_place = $row['recovery_place'];
                            $recovery_phone = $row['recovery_phone'];
                            $delivery_place = $row['delivery_place'];
                            $delivery_phone = $row['delivery_phone'];
                            $execution_date = $row['execution_date'];
                        ?>
                            <tr>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $execution_date; ?></td>
                                <td>
                                    <form action="display_offre.php" method="post" class="voir-offre">
                                        <input type="hidden" name="num_livraison" value="<?php echo $num_livraison; ?>">
                                        <button class="btn bt-modifier afficher-offre">Voir les offres</button>
                                    </form>
                                    <button class="btn bt-supprimer">Supprimer</button>
                                    <!-- <input type="hidden" id="numero" value="<?php //echo $number; 
                                                                                    ?>"> -->
                                </td>
                            </tr>
                            <!-- <tr class="offre">
                            <td colspan="4">
                                <div class="container" id="offre<?php //echo $number; 
                                                                ?>">
                                    <table class="table table-borderless">

                                        <thead>
                                            <tr>
                                                <th scope="col">Livreur</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col" class="">Opérations</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </td>
                        </tr> -->



                        <?php
                            $number++;
                        }
                        ?>

                    </tbody>

                </table>

            </div>

        <?php
        } else 
        {
            require_once '../controller/admin/count_users.php';
            //require_once '../controller/admin/display_users.php';
        ?>


            <section class="container mt-5">

                <div class="row" id="count">
                    <div class="col-md-4 col-sm-6 text-center">
                        <?php  
                            $count = new Count();
                            $result = $count -> count_all_users();
                            //var_dump($result);
                        ?>
                        <div class="count div-vert">
                            <h1 class="h1-size">Nombre d'utilisateurs</h1>
                            <span><?php echo $result['nbr']; ?></span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 text-center">
                        <?php  
                            //$response = $count -> count_clients();
                            //var_dump($response);
                        ?>
                        <div class="count div-bleu">
                            <h1 class="h1-size">Nombre de clients</h1>
                            <span>1000<?php //echo $response['nbr']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 text-center">
                        <?php  
                            //$res = $count -> count_livreurs();
                            //var_dump($response);
                        ?>
                        <div class="count div-orange">
                            <h1 class="h1-size">Nombre de livreurs</h1>
                            <span>1000<?php //echo $res['nbr']; ?></span>
                        </div>
                    </div>
                </div>

                <div class=" container mt-5">
                    <button class="btn bt-modifier admin-affichage" id="utilisateurs">Liste de tous les utilisateurs</button>
                    <button class="btn bt-modifier admin-affichage" id="clients">Liste des clients</button>
                    <button class="btn bt-modifier admin-affichage" id="livreurs">Liste des livreurs</button>

                    <div id="div-utilisateurs" class="container mt-5">
                        La div des utilisateurs.
                    </div>
                    <div id="div-clients" class="container mt-5">
                        La div des clients.
                    </div>
                    <div id="div-livreurs" class="container mt-5">
                        La div des livreurs.
                    </div>


                </div>

            </section>


        <?php
        }
        ?>

    </div>




    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>


    <script>
        
        let utilisateurs = document.getElementById("utilisateurs");
        let div_utilisateur = document.getElementById("div-utilisateurs");

        let clients = document.getElementById("clients");
        let div_clients = document.getElementById("div-clients");

        let livreurs = document.getElementById("livreurs");
        let div_livreurs = document.getElementById("div-livreurs");


        utilisateurs.addEventListener("click", function() {
            if (div_utilisateur.style.display === "none") {
                div_utilisateur.style.display = "block";
            } else {
                div_utilisateur.style.display = "none";
            }
        });

        clients.addEventListener("click", function() {
            if (div_clients.style.display === "none") {
                div_clients.style.display = "block";
            } else {
                div_clients.style.display = "none";
            }
        });

        livreurs.addEventListener("click", function() {
            if (div_livreurs.style.display === "none") {
                div_livreurs.style.display = "block";
            } else {
                div_livreurs.style.display = "none";
            }
        });







        document.getElementById("montant").addEventListener("click", function() {
            window.location.href = "http://www.example.com/page-suivante";
        });
        document.getElementById("historique").addEventListener("click", function() {
            window.location.href = "http://www.example.com/page-suivante";
        });
        document.getElementById("recharger").addEventListener("click", function() {
            window.location.href = "http://www.example.com/page-suivante";
        });
        document.getElementById("profil").addEventListener("click", function() {
            window.location.href = "http://www.example.com/page-suivante";
        });
    </script>



</body>

</html>