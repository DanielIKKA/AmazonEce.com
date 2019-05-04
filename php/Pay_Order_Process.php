<?php
    include "Fonctions_panier.php";
    $info_bank = false;
    $info_perso = false;
    $bank_match = false;
    $id_last_purchase = 0;

    if(isset($_POST['surname']) AND isset($_POST['firstname']) AND isset($_POST['adress']) AND isset($_POST['city'])and isset($_POST['country']) and isset($_POST['postal_code'])AND isset($_POST['tel']))
    {
        $info_perso = true;
    }else echo "Il manque des infos personnelles";

    if(isset($_POST['type']) AND isset($_POST['number']) AND isset($_POST['name']) AND isset($_POST['expiracy_date'])and isset($_POST['security_code']))
    {
        $info_bank = true;
    }else echo "Il manque des infos bancaires";

    if($info_bank and $info_perso)
    {
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $street = $_POST['adress'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postal_code = $_POST['postal_code'];
        $tel = $_POST['tel'];

        $item_id_list = items_id_toString();

        $price = total_price();

        $type = $_POST['type'];
        $card_number = $_POST['number'];
        $name_on_card = $_POST['name'];
        $expiracy_date = $_POST['expiracy_date'];
        $security_code = $_POST['security_code'];

        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );

        if($db_found)
        {

           $SQL = "INSERT INTO adress(street,city,country,postal_code) VALUES(\"".$street."\",\"".$city."\",\"".$country."\",\"".$postal_code."\")";
           mysqli_query($db_handle, $SQL);

            $SQL ="SELECT MAX(id) FROM adress";
            $result = mysqli_query($db_handle, $SQL);
            if($result)
            {
                while($db_field = mysqli_fetch_row($result))
                {
                    $id_last_adress = $db_field[0];
                }
            }


            $SQL ="SELECT * from payment_info WHERE number=\"" . $card_number. "\"";
            $result = mysqli_query($db_handle, $SQL);

            while ($db_field = mysqli_fetch_assoc($result))
            {
                if($db_field['type'] == $type and $db_field['name'] == $name_on_card and $db_field['expiracy_date'] == $expiracy_date and $db_field['security_code'] == $security_code)
                {
                    $bank_match=true;
                }
                else
                {
                    echo "Informations bancaires erronées<br/>" ;
                }
            }

            if($bank_match)
            {
                $buyer_email = $_SESSION['user']['email'];
                $SQL ="INSERT INTO purchase(buyer_email,card_number,adress_id,item_id_list,price) VALUES(\"" . $buyer_email ."\",\"" . $card_number ."\",\"" . $id_last_adress ."\",\"" . $item_id_list ."\",\"" . $price ."\")";
                mysqli_query($db_handle, $SQL);
            }
        }

    }

