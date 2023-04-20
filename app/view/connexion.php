<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../controller/connexion.php';

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../includes/head.php'); ?>
    <title>Page de connexion</title>
</head>
<body>
    
    <div class="container"> <br><br>
        <h1>Connexion à votre compte <span class="orange">BenLivraison</span></h1>
        <!-- <div class="partie"><a href="#">Partie 1</a></div> -->
        <div class="form-container">

            <form action="../controller/connexion.php" method="POST" >
                <!-- Nom et prénom -->
                <!-- pseudo -->
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre email" required>
                </div>
                
                <!-- Email -->
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre password" required>
                </div>
                
                <button type="submit" class="btn bt" name="connexion">Se connecter</button>

                <p class="para-inscription-connexion">Nouveau sur BenLivraison, <a href="inscription.php" class="link-inscription-connexion">inscrivez-vous</a>.</p>
            </form>

        </div>
    </div>

</body>
</html>