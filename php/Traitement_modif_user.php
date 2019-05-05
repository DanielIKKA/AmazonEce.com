<?php session_start();

if(isset($_POST['email']) AND isset($_POST['surname']) AND isset($_POST['firstname']) AND isset($_POST['password']) and isset($_POST['password_confirm'])    and isset($_POST['tel'])) {
    $adress_info = false;
    $bank_info = false;
    $adress_modified = true;
    $bank_modified = true;
    $info_modified = true;
    if ($_POST['password'] == $_POST['password_confirm']) {
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $tel = $_POST['tel'];

        //if (isset($_POST['street']) and isset($_POST['postal_code']) and isset($_POST['city']) and isset($_POST['country'])) {
            $street = $_POST['street'];
            $postal_code = $_POST['postal_code'];
            $city = $_POST['city'];
            $country = $_POST['country'];
            $adress_info = true;
        //}


        //if (isset($_POST['card_number']) and isset($_POST['card_type']) and isset($_POST['security_code']) and isset($_POST['name'])) {
            $card_number = $_POST['card_number'];
            $card_type = $_POST['card_type'];
            $security_code = $_POST['security_code'];
            $name_on_card = $_POST['name'];
            $expiracy_date = $_POST['expiracy_date'];
        //}

        require '../../../config.php';
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $database = "amazonece";
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {

            $SQL = "SELECT * from user where user.email=\"" . $email . "\"";
            $result = mysqli_query($db_handle, $SQL);
            while ( $db_field = mysqli_fetch_assoc($result))
            {
                $id_old_adress = $db_field['adress_id'];
                $old_card_number = $db_field['card_number'];
                if($db_field['surname']==$surname and $db_field['firstname']==$firstname and $db_field['tel']==$tel and $db_field['password']==$password )
                {
                    $info_modified = false;
                }
            }

            $SQL = "SELECT * from payment_info where payment_info.number=\"" . $old_card_number . "\"";
            $result = mysqli_query($db_handle, $SQL);
            while ( $db_field = mysqli_fetch_assoc($result))
            {
                if($db_field['type']==$card_type and $db_field['expiracy_date']==$expiracy_date and $db_field['security_code']==$security_code and $db_field['name']==$name_on_card)
                {
                    $bank_modified = false;
                }
            }

            $SQL = "SELECT * from adress where adress.id=\"" . $id_old_adress . "\"";
            $result = mysqli_query($db_handle, $SQL);
            while ( $db_field = mysqli_fetch_assoc($result))
            {
                if($db_field['street']==$street and $db_field['city']==$city and $db_field['postal_code']==$postal_code and $db_field['country']==$country)
                {
                    $adress_modified = false;
                }
            }

            if($info_modified)
            {
                $SQL="UPDATE user SET firstname=\"".$firstname."\",surname=\"".$surname."\",password=\"".$password."\",tel=\"".$tel."\" WHERE user.email=\"".$email."\"";
                mysqli_query($db_handle,$SQL);
            }

            if($adress_modified)
            {
                $SQL="UPDATE adress SET street=\"".$street."\",city=\"".$city."\",postal_code=\"".$postal_code."\",country=\"".$country."\" WHERE adress.id=\"".$id_old_adress."\"";
                mysqli_query($db_handle,$SQL);
                echo $SQL;
            }

            if($bank_modified)
            {
                $SQL="UPDATE payment_info SET type=\"".$card_type."\",expiracy_date=\"".$expiracy_date."\",security_code=\"".$security_code."\",name=\"".$name_on_card."\" WHERE payment_info.number=\"".$old_card_number."\"";
                mysqli_query($db_handle,$SQL);
                echo $SQL;
            }

            }
        }
    }

header("Location:Compte.php");
exit;
