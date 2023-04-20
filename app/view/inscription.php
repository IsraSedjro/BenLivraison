<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../controller/inscription.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../includes/head.php'); ?>
    <title>Inscription</title>
</head>
<body>
    
    <div class="container"> <br><br>
        <h1>Créez votre compte <span class="orange">BenLivraison</span></h1>
        <!-- <div class="partie"><a href="#">Partie 1</a></div> -->
        <div class="form-container">

            <form action="" method="POST">
                <!-- Nom et prénom -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Nom :</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Entrez votre nom" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Prénom :</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Entrez votre prénom" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gender">Genre :</label>
                    <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                        <option selected value="Masculin">Masculin</option>
                        <option value="Féminin">Féminin</option>
                    </select>
                </div>

                <!-- Numéro de téléphone -->
                <div class="form-group">
                    <label for="telephone">Numéro de téléphone :</label>
                    <input type="telephone" class="form-control" name="telephone" id="telephone" placeholder="Entrez votre numéro de téléphone" required>
                </div>
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre email" required>
                </div>

                <!-- Password -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Mot de passe:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm_password">Confirmer le mot de passe:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmez le mot de passe">
                            </div>
                        </div>
                    </div>    
                </div>
            
                <!-- Adresse -->
                <div class="form-group">
                    <label for="adress">Adresse :</label>
                    <input type="text" class="form-control" name="adress" id="adress" placeholder="Entrez votre adesse (Département, commune, arrondissement)" required>
                </div>

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn bt" name="inscription">S'inscrire</button>
                    </div>
                    <div class="col-8">
                        
                            <?php 
                                //if (isset($success_msg)) { 
                                     //echo '<div class="alert alert-info" role="alert">'.$success_msg.'</div>'; 
                                //} 
                            ?>
                            
                        
                    </div>
                </div>


                <p class="para-inscription-connexion">Avez-vous déjà un compte ? <a href="connexion.php" class="link-inscription-connexion">Connectez-vous</a>.</p>

                
            </form>

        </div>
    </div>
    <!-- Chargement des scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- <script>

        $(function() {
            const passwordInput = $("#password");
            const confirmPasswordInput = $("#confirm-password");
            const showPasswordCheckbox = $("#show-password");

            showPasswordCheckbox.click(function() {
                const type = showPasswordCheckbox.prop("checked") ? "text" : "password";
                passwordInput.attr("type", type);
                confirmPasswordInput.attr("type", type);
            });
        });

    </script> -->

    


</body>
</html>