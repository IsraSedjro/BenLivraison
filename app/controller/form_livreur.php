<?php

    // Vérifier si le formulaire a été soumis
    if(isset($_POST['soumettre-form'])) 
    {

        $allowed_extensions = array('jpg', 'jpeg', 'png');

        // Définir les variables pour les images

        $profil_picture = $_FILES["picture"]["name"];
        $profil_picture_tmp = $_FILES["picture"]["tmp_name"];
        $profil_picture_error = $_FILES["picture"]["error"];

        $photo_identity_piece = $_FILES["photo_identity_piece"]["name"];
        $photo_identity_piece_tmp = $_FILES["photo_identity_piece"]["tmp_name"];
        $photo_identity_piece_error = $_FILES["photo_identity_piece"]["error"];
        
        $photo_residence_proof = $_FILES["photo_residence_proof"]["name"];
        $photo_residence_proof_tmp = $_FILES["photo_residence_proof"]["tmp_name"];
        $photo_residence_proof_error = $_FILES["photo_residence_proof"]["error"];

        $photo_ifu = $_FILES["photo_ifu"]["name"];
        $photo_ifu_tmp = $_FILES["photo_ifu"]["tmp_name"];
        $photo_ifu_error = $_FILES["photo_ifu"]["error"];


        if($profil_picture_error === 0 && $photo_identity_piece_error === 0 && $photo_residence_proof_error === 0 && $photo_ifu_error === 0) 
        {

            $profil_picture_extension = strtolower(pathinfo($profile_picture, PATHINFO_EXTENSION));
            $photo_identity_piece_extension = strtolower(pathinfo($photo_identity_piece, PATHINFO_EXTENSION));
            $photo_residence_proof_extension = strtolower(pathinfo($photo_residence_proof, PATHINFO_EXTENSION));
            $photo_ifu_extension = strtolower(pathinfo($photo_ifu, PATHINFO_EXTENSION));

            if(in_array($profil_picture_extension, $allowed_extensions) && in_array($photo_identity_piece_extension, $allowed_extensions) && in_array($photo_residence_proof_extension, $allowed_extensions) && in_array($photo_ifu_extension, $allowed_extensions)) 
            {
                $uploads_dir = "../uploads/";

                // Déplacer les images téléchargées vers le dossier d'upload
                move_uploaded_file($profil_picture_tmp, $uploads_dir.basename($profil_picture));
                move_uploaded_file($photo_identity_piece_tmp, $uploads_dir.basename($photo_identity_piece));
                move_uploaded_file($photo_residence_proof_tmp, $uploads_dir.basename($photo_residence_proof));
                move_uploaded_file($photo_ifu_tmp, $uploads_dir.basename($photo_ifu));


                // Récupérer les données du formulaire
                $type = $_POST['type'];
                $num_identity_piece = $_POST['num_identity_piece'];
                $expiration_date = $_POST['expiration_date'];
                $num_residence_proof = $_POST['num_residence_proof'];
                $num_ifu = $_POST['num_ifu'];

                $email = $_SESSION['user_info'][0]['email'];

                require_once '../model/model.php';
                $model = new Model();

                // Préparer et exécuter la requête d'insertion

                $table = 'client';
                $fields = 'photo_identity_piece, photo_ifu, photo_residence_proof, profil_picture, type_identity_piece, num_residence_proof, num_ifu, num_identity_piece, expiration_date_piece, email';
                $values = '?,?,?,?,?,?,?,?,?,?';
                $data = array($photo_identity_piece, $photo_ifu, $photo_residence_proof, $profil_picture, $type, $num_residence_proof, $num_ifu, $num_identity_piece, $expiration_date, $email);

                $model -> add($table, $fields, $values, $data);

                echo "<script>alert('Informations soumis avec succès.')</script>";

            }
            else {
                echo "<script>alert('Type de fichier non valide !')</script>";
                exit();
            }

        } 
        else 
        {
            echo "<script>alert('Il y a eu une erreur.')</script>";
        }

    }       

?>






