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
        $querry = "SELECT * FROM item WHERE category=\"".$category."\" AND priority_level=\"".$priority_level."\"";
        $result = mysqli_query($db_handle,$querry);
        if($result) {
            while ($fetch = mysqli_fetch_assoc($result))
            {
                feature_normal($fetch['name'], "../Assets/BDD_Images/".$fetch['pic1'], $fetch['price']);
            }
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
        $querry = "SELECT * FROM `purchase` WHERE `buyer_email` ="."'".$user."'";
        $result = mysqli_query($db_handle,$querry);
        if($result and $fetch = mysqli_fetch_assoc($result)) {
            $pic = explode("_",$fetch['item_id_list']);
            feature_command($fetch['ID'], "../Assets/BDD_Images/".$pic[0]."_1.png", count($fetch['ID'])+1, $fetch['price']);
            while ($fetch = mysqli_fetch_assoc($result))
            {
                $pic = explode("_",$fetch['item_id_list']);
                feature_command($fetch['ID'], "../Assets/BDD_Images/".$pic[0]."_1.png", count($fetch['ID'])+1, $fetch['price']);
            }
        } else {
            echo "<h1 class='title_section important_text'>Vous n'avez pas passé de commande le moment</h1>";
        }
    }
}


/**
 * @param $name
 * @param $pic1
 * @param $price
 */
function feature_normal($name , $pic1, $price) {
    $price = $price."€";
    echo " 
        <div id='wrapper_template'>
            <div class='wrapper_feature'>
                <a class='rect_hover' href='#'>
                    <h1>Voir</h1>
                </a>
                <img class='contain item1' src='$pic1' alt=''>
                <h1 class='price_feature'>$price</h1>            
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
                <a class='rect_hover' href='#'>
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
?>