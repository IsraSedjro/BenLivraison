<?php

    if(isset($_POST['deconnexion'])) {

        session_destroy();
        header('location: ../../index.php');

    }

?>