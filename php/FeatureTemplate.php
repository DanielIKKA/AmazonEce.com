<?php
    echo "<link rel='stylesheet' type='text/css' href='../Css/FeatureStyleSheet.css'>";

    function feature_normal($name , $pic1, $price) {
        $price = $price."€";
        echo " 
            <div id='wrapper_template'>
                <div class='wrapper_feature'>
                    <img class='cover' id='item1' src='$pic1' alt=''>
                    <h1 class='price_feature' id='item2'>$price</h1>            
                </div>
                <h1 class='title_feature'>$name</h1>
            </div>";

    }
?>