<?php
    echo "<link rel='stylesheet' type='text/css' href='../Css/FeatureStyleSheet.css'>";

/**
 * @param $category
 * @param $priority_level
 */
function display_item($category, $priority_level) {
        require '../../../config.php';
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
    function feature_normal($name , $pic1, $price) {
        $price = $price."€";
        echo " 
            <div id='wrapper_template'>
                <div class='wrapper_feature'>
                    <img class='contain item1' src='$pic1' alt=''>
                    <h1 class='price_feature'>$price</h1>            
                </div>
                <h1 class='title_feature'>$name</h1>
            </div>";

    }
?>