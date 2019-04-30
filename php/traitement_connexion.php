<?php

    if(isset($_POST['email']) AND isset($_POST['password']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $worked = false;

        require '../../../config.php';
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );
        if($db_found)
        {
            $SQL = "SELECT * FROM user WHERE email=\"" . $email."\"";
            $result = mysqli_query($db_handle, $SQL);

                while ($db_field = mysqli_fetch_assoc($result))
                {
                    $worked = true;
                    if($db_field['password'] == $password)
                    {
                        echo "Bienvenue ". $db_field['firstname'];
                        //$_SESSION['email']= $_POST['email'];
                        //$_SESSION['type']= $_POST['type'];

                    }
                    else
                    {
                        echo "Mot de passe incorrect" ;
                    }
                }

                if(!$worked)
                {
                    echo "Adresse email ou mot de passe incorrect";
                }

        }
        else
            echo "Database not found";
    }
