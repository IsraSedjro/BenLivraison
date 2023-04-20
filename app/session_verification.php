<?php

    if(empty($_SESSION['user_info'][0]['email']))
    {
        echo "
            <script>
                alert('Vous devez vous connecter.'),
                window.location = 'connexion.php';
            </script>
        ";
    }

?>