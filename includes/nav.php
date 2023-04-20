<nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#"><span><strong>BenLivraison</strong></span></a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">

                    <?php 
                    
                        if($_SESSION['user_info'][0]['role'] == 0 || $_SESSION['user_info'][0]['role'] == 1) 
                        {  
                    ?>
                            <li class="nav-item"><a class="menu" href="accueil.php">Mes demandes</a></li>

                            <?php 
                                if($_SESSION['user_info'][0]['role'] == 1) 
                                {
                            ?>
                                <li class="nav-item"><a class="menu" href="demandes_disponibles.php">Demandes disponibles</a></li>
                            <?php
                                }
                                if($_SESSION['user_info'][0]['role'] == 0) 
                                {
                            ?>
                                <li class="nav-item"><a class="menu" href="form_livreur.php">Devenir livreur</a></li>
                            <?php
                                }
                            ?>
                    <?php 
                        }
                    ?>

                </ul> 

                <form action="" method="post" class="">
                    <i class="fa-solid fa-wallet" style="color: #132762;"></i><button class="btn btn-primary btnav" id="portefeuille" type="submit">Portefeuille</button>
                </form>
                &nbsp
                <form action="../controller/deconnexion.php" method="post" class="">
                    <button class="btn btn-primary btnav deconnexion" id="deconnexion" type="submit" name="deconnexion">Déconnexion</button>
                </form>
                &nbsp
                <button style="display: flex; align-items: center;" id="profil">
                    <i class="material-icons material-symbols-outlined">account_circle</i> &nbsp
                    <span><?php echo $_SESSION['user_info'][0]['firstname'];?></span>
                </button>

            </div>
        </div>
    </nav>