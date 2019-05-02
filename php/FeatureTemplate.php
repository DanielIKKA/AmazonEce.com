<?php
    echo "<link rel='stylesheet' type='text/css' href='../Css/FeatureStyleSheet.css'>";

    function feature($name , $pic1, $price) {
        echo " 
            <div class='wrapper_feature'>
                <img class='cover' id='item1' src='$pic1' alt=''>
                <h1 class='title_feature' id='item2'>$price</h1>
                
            </div>";
    }
?>