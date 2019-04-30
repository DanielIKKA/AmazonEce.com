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
                if(!isset($_POST['background']))
                    $SQL = "INSERT INTO user(type,surname,firstname,adress,email,password) VALUES(\"" . $type ."\",\"" . $surname ."\",\"" . $firstname."\",\"" . $adress ."\",\"" . $email ."\",\"" . $password ."\")";
                else
                    $SQL = "INSERT INTO user(type,surname,firstname,adress,email,password,background) VALUES(\"" . $type ."\",\"" . $surname ."\",\"" . $firstname."\",\"" . $adress ."\",\"" . $email ."\",\"" . $password ."\",\"" . $_POST['background'] ."\")";

                if(mysqli_query($db_handle, $SQL))
                {
                    echo "Ajout à la base de donnée OK<br/>";
                    //upload de la photo
                    if (file_exists($_FILES['photo']['tmp_name']) || is_uploaded_file($_FILES['photo']['tmp_name']))
                    {
                        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                        $extension = strrchr($_FILES['photo']['name'], '.');


                        if(in_array($extension, $extensions)) //Si l'extension est dans le tableau
                        {
                            $dossier = "C:\wamp64\www\AmazonEce.com\Assets\Users_photo/";

                            //Formatage du nom du fichier
                            $fichier = $email.$extension;



                            if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier))
                            {

                                $SQL = ("UPDATE user SET photo=\"" .$fichier. "\" WHERE user.email=\"" .$email. "\"");
                                if(mysqli_query($db_handle, $SQL))
                                {
                                    echo "Telechargement de l'image OK";
                                }else
                                {
                                    echo "Echec de l'upload 1 <br/>".$SQL;
                                }
                            }else
                                echo "Echec de l'upload 2 <br/>" ;
                        }
                    }else echo "Echec de l'ajout de l'image : fichier non trouvé<br/>";
                }
                else
                {
                    echo "echec de l'inscription<br/>";
                    echo $SQL."<br/>";
                    echo mysqli_error($db_handle);
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
