<?php
    include "FeatureTemplate.php";
    require '../../../config.php';

    function total_display($id)
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
                $buyer_email = $db_field['buyer_email'];
                $firstname = $db_field['firstname'];
                $surname = $db_field['surname'];
                $contact_number = $db_field['contact_number'];
                $price = $db_field['price'];
                $item_id_list =$db_field['item_id_list'];
                $card_number =$db_field['card_number'];
                $adress_id = $db_field['adress_id'];
            }
            $SQL = "SELECT * FROM adress WHERE adress.id=\"".$adress_id."\"";
            $result = mysqli_query($db_handle,$SQL);
            while($db_field = mysqli_fetch_assoc($result))
            {
                $street = $db_field['street'];
                $city = $db_field['city'];
                $postal_code = $db_field['postal_code'];
                $country = $db_field['country'];
            }
        }

        echo "<section class='item_section_vertical'>";
        echo "<h1 class=title_section>Commande</h1>";
        echo $firstname . " " . $surname ."<br/>";
        echo $buyer_email . " " . $contact_number. "<br/>";
        echo $street . " " . $city. " ".$postal_code." ".$country." <br/>";
        $items = explode("_",$item_id_list);
        for ($i=0;$i<$items.count();$i++)
        {
            $SQL = "SELECT * FROM item WHERE item.id=\"".$items[$i]."\"";
            $result = mysqli_query($db_handle,$SQL);
            while($db_field = mysqli_fetch_assoc($result))
            {
                feature_normal($db_field['name'],$db_field['pic1'],$db_field['price']);
            }
        }
        echo "</section>";



    }

    function partial_display($id)
    {

    }
