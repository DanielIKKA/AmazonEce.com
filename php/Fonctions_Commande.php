<?php
    include "FeatureTemplate.php";

    function display_purchase_items($id)
    {
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );
        if($db_found)
        {
            $SQL = "SELECT * FROM purchase WHERE purchase.id=\"".$id."\"";
            $result = mysqli_query($db_handle,$SQL);
            while($db_field = mysqli_fetch_assoc($result))
            {
                $item_id_list =$db_field['item_id_list'];
                $items = explode("_",$item_id_list);
                for ($i=0;$i<count($items);$i++)
                {
                    $SQL = "SELECT * FROM item WHERE item.id=\"".$items[$i]."\"";
                    $result = mysqli_query($db_handle,$SQL);
                    while($db_field = mysqli_fetch_assoc($result))
                    {
                        feature_normal($db_field['name'],"../Assets/BDD_Images/".$db_field['pic1'],$db_field['price']);
                    }
                }
            }
        }
    }

    function display_infos($id)
    {
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $database = "amazonece";
        $db_found = mysqli_select_db($db_handle, $database);
        if ($db_found) {

            $buyer_email = $_SESSION['user']['email'];
            $SQL = "SELECT * FROM user WHERE user.email=\"" . $buyer_email . "\"";
            $result = mysqli_query($db_handle, $SQL);
            while ($db_field = mysqli_fetch_assoc($result)) {
                $firstname = $db_field['firstname'];
                $surname = $db_field['surname'];
                $contact_number = $db_field['tel'];
            }

            $SQL = "SELECT * FROM purchase WHERE purchase.id=\"".$id."\"";
            $result = mysqli_query($db_handle,$SQL);
            while($db_field = mysqli_fetch_assoc($result))
            {
                $card_number =$db_field['card_number'];
                $card_number_discret = substr($card_number, 0, -12);
                $card_number_discret = $card_number_discret . " **** **** ****";
                $adress_id = $db_field['adress_id'];
            }


            $SQL = "SELECT * FROM adress WHERE adress.id=\"" . $adress_id . "\"";
            $result = mysqli_query($db_handle, $SQL);
            while ($db_field = mysqli_fetch_assoc($result)) {
                $street = $db_field['street'];
                $city = $db_field['city'];
                $postal_code = $db_field['postal_code'];
                $country = $db_field['country'];
            }

            $SQL = "SELECT * FROM payment_info WHERE payment_info.number=\"".$card_number."\"";
            $result = mysqli_query($db_handle,$SQL);
            while($db_field = mysqli_fetch_assoc($result))
            {
                $card_type = $db_field['type'];
                $name_on_card = $db_field['name'];
                $expiracy_date = $db_field['expiracy_date'];
                $security_code = $db_field['security_code'];
            }
        }

        echo "<div>";
        echo $firstname ." ". $surname;
        echo "<br/>". $buyer_email;
        echo "<br/>". $contact_number;
        echo "<div/>";

        echo "<div>";
        echo $street;
        echo "<br/>". $city." ".$postal_code;
        echo "<br/>". $country;
        echo "<div/>";

        echo "<div>";
        echo $card_type;
        echo "<br/>". $card_number_discret;
        echo "<br/>". $name_on_card;
        echo "<br/>". $expiracy_date;
        echo "<br/>". $security_code;
        echo "<div/>";

    }

    function partial_display($id)
    {

    }

    function get_last_purchase()
    {
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );
        $SQL ="SELECT MAX(id) FROM purchase";
        $result = mysqli_query($db_handle, $SQL);
        if($result)
        {
            while($db_field = mysqli_fetch_row($result))
            {
                return $db_field[0];
            }
        }
    }
