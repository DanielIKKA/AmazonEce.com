<?php

    if(isset($_POST['surname']) AND isset($_POST['firstname']) AND isset($_POST['adress']) AND isset($_POST['email'])and isset($_POST['password']) and isset($_POST['password_confirm'])AND isset($_POST['type']))
    {
        if($_POST['password'] == $_POST['password_confirm'])
        {
            $surname = $_POST['surname'];
            $firstname = $_POST['firstname'];
            $adress = $_POST['adress'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $type = $_POST['type'];

            require '../../../config.php';
            $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
            $database = "amazonece";
            $db_found = mysqli_select_db( $db_handle, $database );
            if($db_found)
            {
                $SQL = "INSERT INTO user(type,surname,firstname,adress,email,password) VALUES(\"" . $type ."\",\"" . $surname ."\",\"" . $firstname."\",\"" . $adress ."\",\"" . $email ."\",\"" . $password ."\")";
                if(mysqli_query($db_handle, $SQL))
                {
                    echo "Inscription réussie";
                }
                else
                {
                    echo "echec de l'inscription";
                    echo $SQL;
                }

            }
        }
        else
        {
            echo "Les mots de passe ne sont pas identiques";
        }

    }
    else
    {
        echo "Veuillez remplir tous les champs";
    }
