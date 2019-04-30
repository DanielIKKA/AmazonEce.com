<?php
    if (file_exists($_FILES['pic1']['tmp_name']) || is_uploaded_file($_FILES['pic1']['tmp_name']))
    {
        $pic = 'pic';
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );
        if($db_found)
        {
            $SQL ="SELECT MAX(id) FROM item";
            $result = mysqli_query($db_handle, $SQL);
            if($result)
            {
                while($db_field = mysqli_fetch_row($result))
                {
                    $id_last_order = $db_field[0];
                }
            }
        }

        for($i = 1; $i<5;$i++)
        {
            $pic = "pic" . $i;
            if(isset($_FILES[$pic]))
            {
                $extensions = array('.png', '.gif', '.jpg', '.jpeg','.mp4','.avi');
                $extension = strrchr($_FILES[$pic]['name'], '.');

                if(in_array($extension, $extensions)) //Si l'extension est dans le tableau
                {
                    $dossier = "C:\wamp64\www\AmazonECE\Assets\BDD_Images/";

                    //Formatage du nom du fichier
                    $fichier = $id_last_order . "_" . $i.$extension;


                    if(move_uploaded_file($_FILES[$pic]['tmp_name'], $dossier . $fichier))
                    {
                        $SQL = ("UPDATE item SET " .$pic ."=\"" .$fichier. "\" WHERE item.id=".$id_last_order);
                        if(mysqli_query($db_handle, $SQL))
                        {
                            echo "Upload réussie";
                        }
                        else
                        {
                            echo "Echec de l'ajout à la base";
                        }
                    }
                    else
                        echo "Echec de l'upload" ;
                }

            }
        }
    }else
        echo "Vous devez ajouter au moins une photo";


