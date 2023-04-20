<?php

    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../session_verification.php';
    require_once '../controller/deconnexion.php';

    require_once '../controller/form_livreur.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../includes/head.php'); ?>
    <title>Devenir livreur</title>
</head>
<body>
    
    <?php include('../../includes/nav.php'); ?>

    <div class="container"> <br><br>
        <div class="titre">
            <h1><span class="orange">BenLivraison</span></h1>
            <p>Renseignez ces informations pour devenir livreur.</p>
        </div>
        
        <!-- <div class="partie"><a href="#">Partie 1</a></div> -->
        <div class="form-container">

            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Type de la pièce d'identité -->

                <div class="form-group">
                    <label for="picture">Photo de profile:</label>
                    <input type="file" class="form-control" name="picture" id="picture" placeholder="Entrez une photo de vous." required>
                </div>

                <div class="form-group">
                    <label for="type">Type de votre pièce d'identité :</label>
                    <select class="form-select" aria-label="Default select example" name="type" id="type">
                        <option value="Passport">Passport</option>
                        <option selected value="Carte Nationale d'identité">Carte Nationale d'identité</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="num_identity_piece">Numéro de la pièce d'identité :</label>
                            <input type="text" class="form-control" name="num_identity_piece" id="num_identity_piece" placeholder="Entrez le numéro de votre pièce d'identité" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="expiration_date">Date d'expiration de la pièce d'identité :</label>
                            <input type="date" class="form-control" name="expiration_date" id="expiration_date" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo_identity_piece">Photo de la pièce d'identité :</label>
                    <input type="file" class="form-control" name="photo_identity_piece" id="photo_identity_piece" placeholder="Entrez une photo de votre pièce d'identité (recto vesso sur la même photo)" required>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="num_attestation_proof">Numéro l'attestation de résidence:</label>
                            <input type="text" class="form-control" name="num_residence_proof" id="num_attestation_proof" placeholder="Entrez le numéro de votre attestation de résidence" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="photo_attestation_proof">Photo de l'attestation de résidence' :</label>
                            <input type="file" class="form-control" name="photo_residence_proof" id="photo_attestation_proof" placeholder="Entrez une photo de votre pièce d'identité (recto vesso sur la même photo)" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-xm-12">
                        <div class="form-group">
                            <label for="num_ifu">Numéro de l'IFU :</label>
                            <input type="text" class="form-control" name="num_ifu" id="num_ifu" placeholder="Entrez le numéro de votre IFU" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="photo_ifu">Photo de votre ifu:</label>
                            <input type="file" class="form-control" name="photo_ifu" id="photo_ifu" placeholder="Entrez une photo de votre IFU" required>
                        </div>
                    </div>
                </div>
 
                <button type="submit" name="soumettre-form" class="btn bt" >Soumettre</button>
            </form>

        </div>
    </div>

</body>
</html>