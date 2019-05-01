<?php

    $info_bank = false;
    $info_perso = false;

    if(isset($_POST['surname']) AND isset($_POST['firstname']) AND isset($_POST['adress']) AND isset($_POST['city'])and isset($_POST['country']) and isset($_POST['postal_code'])AND isset($_POST['tel']))
    {
        $info_perso = true;
    }else echo "Il manque des infos personelles";

    if(isset($_POST['type']) AND isset($_POST['number']) AND isset($_POST['name']) AND isset($_POST['expiracy_date'])and isset($_POST['security_code']))
    {
        $info_bank = true;
    }else echo "Il manque des infos bancaires";

    if($info_bank and $info_perso)
    {
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $adress = $_POST['adress'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postal_code = $_POST['postal_code'];
        $tel = $_POST['tel'];

        $type = $_POST['type'];
        $number = $_POST['number'];
        $name = $_POST['name'];
        $expiracy_date = $_POST['expiracy_date'];
        $security_code = $_POST['security_code'];

        require '../../../config.php';
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );

        if($db_found)
        {
            $SQL ="SELECT * from payment_info WHERE number=\"" . $number. "\"";
            $result = mysqli_query($db_handle, $SQL);

            while ($db_field = mysqli_fetch_assoc($result))
            {

                if($db_field['type'] == $type and $db_field['name'] == $name and $db_field['expiracy_date'] == $expiracy_date and $db_field['security_code'] == $security_code)
                {
                    echo "Informations bancaires OK<br/>";
                    //A rajouter : email de l'acheteur à recup dans la session
                    //           : Liste des id des items achetés à recupérer dans le panier (ou la session)
                    //           : Prix de la commande à recuperer dans le panier (ou la session)
                    //Il faut enlever de la table item les objets achetés à ce moment là
                    $SQL ="INSERT INTO  purchase(card_number,adress,city,postal_code,contact_number,country,surname,firstname) VALUES(\"" . $number ."\",\"" . $adress ."\",\"" . $city ."\",\"" . $postal_code ."\",\"" . $tel ."\",\"" . $country ."\",\"" . $surname ."\",\"" . $firstname ."\")";
                    if(mysqli_query($db_handle, $SQL))
                    {
                        echo "Commande enregistrée<br/>";
                    }
                    else echo "echec de la requete : ".$SQL ."<br/>Erreur :" . mysqli_error($db_handle);
                }
                else
                {
                    echo "Informations bancaires erronées<br/>" ;
                }
            }
        }
    }

