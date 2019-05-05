<?php
    echo "<link rel='stylesheet' type='text/css' href='../Css/FeatureStyleSheet.css'>";
    require '../../../config.php';

/**
 * @param $category
 * @param $priority_level
 */
function display_item($category, $priority_level) {

    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
    $database = "amazonece";
    $db_found = mysqli_select_db( $db_handle, $database );

    if($db_found) {
        if ($priority_level == null) {
            $querry = "SELECT * FROM item WHERE category=\"".$category."\"";
        } else {
            $querry = "SELECT * FROM item WHERE category=\"".$category."\" AND priority_level=\"".$priority_level."\"";
        }

        $result = mysqli_query($db_handle,$querry);
        if($result and $fetch = mysqli_fetch_assoc($result)) {
            if($fetch['priority_level'] == "VenteFlash") {
                feature_flash($fetch['id'], $fetch['name'], "../Assets/BDD_Images/".$fetch['pic1'], $fetch['price']);
            } else {
                feature_normal($fetch['id'], $fetch['name'], "../Assets/BDD_Images/".$fetch['pic1'], $fetch['price']);
            }
            while ($fetch = mysqli_fetch_assoc($result))
            {
                if($fetch['priority_level'] == "VenteFlash") {
                    feature_flash($fetch['id'], $fetch['name'], "../Assets/BDD_Images/".$fetch['pic1'], $fetch['price']);
                } else {
                    feature_normal($fetch['id'], $fetch['name'], "../Assets/BDD_Images/".$fetch['pic1'], $fetch['price']);
                }
            }
        } else {
            no_item($priority_level);
        }
    }
}

/**
 * @param $user
 */
function display_commands($user) {
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
    $database = "amazonece";
    $db_found = mysqli_select_db( $db_handle, $database );


    if($db_found) {
        $querry = "SELECT * FROM purchase WHERE purchase.buyer_email ="."'".$user."'";
        $result = mysqli_query($db_handle,$querry);
        if($result and $fetch = mysqli_fetch_assoc($result)) {
            $id_items = explode("_",$fetch['item_id_list']);

            $SQL = "SELECT * FROM item WHERE item.id=\"".$id_items[0]."\"";
            $result2 = mysqli_query($db_handle,$SQL);
            while($db_field = mysqli_fetch_assoc($result2))
            {
                $pic = $db_field['pic1'];
            }
            feature_command($fetch['ID'], "../Assets/BDD_Images/".$pic, count($id_items), $fetch['price']);
            while ($fetch = mysqli_fetch_assoc($result))
            {
                $id_items = explode("_",$fetch['item_id_list']);
                $SQL = "SELECT * FROM item WHERE item.id=\"".$id_items[0]."\"";
                $result2 = mysqli_query($db_handle,$SQL);
                while($db_field = mysqli_fetch_assoc($result2))
                {
                    $pic = $db_field['pic1'];
                }
                feature_command($fetch['ID'], "../Assets/BDD_Images/".$pic, count($id_items), $fetch['price']);
            }
        } else {
            echo "<h1 class='title_section important_text'>Vous n'avez pas passé de commande le moment</h1>";
        }
    }
}
function display_sell($user) {
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
    $database = "amazonece";
    $db_found = mysqli_select_db( $db_handle, $database );


    if($db_found) {
        $querry = "SELECT * FROM item WHERE item.seller_email ="."'".$user."'";
        $result = mysqli_query($db_handle,$querry);
        if($result and $fetch = mysqli_fetch_assoc($result))
        {
            feature_normal($fetch['id'],$fetch['name'],"../Assets/BDD_Images/" .$fetch['pic1'],$fetch['price']);
            while ($fetch = mysqli_fetch_assoc($result))
            {
                feature_normal($fetch['id'],$fetch['name'],"../Assets/BDD_Images/" .$fetch['pic1'],$fetch['price']);
            }

        }
        else
            {
            echo "<h1 class='title_section important_text'>Vous n'avez rien vendu</h1>";
        }

}
}

/**
 * @param $name
 * @param $pic1
 * @param $price
 */
function feature_normal($id, $name , $pic1, $price) {
    $price = $price."€";
    echo " 
        <div id='wrapper_template'>
            <div class='wrapper_feature'>
                <a class='rect_hover' href='description.php?id=".$id."'>
                    <h1>Voir</h1>
                </a>
                <img class='contain item1' src='$pic1' alt=''>
                <h1 class='price_feature'>$price</h1>            
            </div>
            <h1 class='title_feature'>$name</h1>
        </div>";

}

function feature_flash($id, $name , $pic1, $price) {
    $reduc = ($price*0.8)."€";
    $price = $price."€";
    echo "
        <div id='wrapper_template'>      
            <div class='wrapper_feature'>
                <a class='rect_hover' href='description.php?id=".$id."'>
                    <h1>Voir</h1>
                </a>
                <img class='contain item1' src='$pic1' alt=''>
                <h1 class='price_feature'><span class='rayer'>$price</span><span class='important_text'> $reduc</span></h1>            
            </div>
            <h1 class='title_feature'>$name</h1>
        </div>";

}

/**
 * @param $id
 * @param $pic1
 * @param $number_of_articles
 * @param $price
 */
function feature_command($id , $pic1, $number_of_articles, $price) {
    $price = $price."€";
        echo "
        <div id='wrapper_template'>
            <div class='wrapper_feature'>
                <a class='rect_hover' href='Commande.php?id=".$id."'>
                    <h1>Détails</h1>
                </a>";

        if ($number_of_articles == 1 ){
            echo"<h1 class='price_feature'>$number_of_articles article</h1>";
        } else {
            echo"<h1 class='price_feature'>$number_of_articles articles</h1>";
        }
        echo"   <h1 class='number_articles_text'>Total: $price</h1>  
                <img class='contain item1' src='$pic1' alt='picture of first article'>
            </div>
            <h1 class='title_feature'><span class='bold_text'>no.</span>$id</h1>
        </div>";

}

function no_item($section) {
    switch ($section) {
        case "VenteFlash":
            echo"<h1 class='title_feature center'>Pas de ventes flash pour le moment.</h1>";
            break;
        case "NotreSelection":
            echo"<h1 class='title_feature center'>Pas de selection particulière de notre part pour le moment.</h1>";
            break;
        case "TopVente":
            echo"<h1 class='title_feature center'>Pas de top vente pour le moment.</h1>";
            break;

    }
}
?>