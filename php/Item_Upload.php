<?php
    include "headerTemplate.php";
    include "Fonctions_Commande.php";
    displayHeader();

    if(isset($_POST['category']) AND isset($_POST['name']) AND isset($_POST['price']) AND isset($_POST['description']))
    {

        $category = $_POST['category'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        /*if($category == "Livres" and !isset($_POST['author']))
        {
            $go = false;
            echo "Champ manquant : auteur";
        }

        if($category == "Vetements")
        {
            if(!isset($_POST['gender']));
            {
                $go = false;
                echo "Champ manquant : genre ou taille";
            }
        }*/





        require '../../../config.php';
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );

        if($db_found)
        {

            $seller_email = $_SESSION['user']["email"];
            if(!isset($_POST['author']) and !isset($_POST['gender']) and !isset($_POST['size']))
                $SQL = "INSERT INTO item(seller_email, name, description, price, category) VALUES(\"".$seller_email."\",\"" . $name . "\", \"" . $description . "\",\"" . $price . "\",\"" . $category . "\")";
            else if(isset($_POST['author']))
            {
                $SQL = "INSERT INTO item(seller_email, name, description, price, category,author) VALUES(\"".$seller_email."\",\"" . $name . "\", \"" . $description . "\",\"" . $price . "\",\"" . $category . "\",\"" . $_POST['author'] . "\")";
            }
            else if(isset($_POST['size']) and isset($_POST['gender']))
            {
                $SQL = "INSERT INTO item(seller_email, name, description, price, category,gender,size) VALUES(\"".$seller_email."\",\"" . $name . "\", \"" . $description . "\",\"" . $price . "\",\"" . $category . "\",\"" . $_POST['gender'] . "\",\"" . $_POST['size'] . "\")";
            }






            if (mysqli_query($db_handle, $SQL)) {
                echo "Ajout à la base de données validé";
                include "Upload_Pics.php";
            } else {
                echo "L'ajout à la base de donnée à échoué";
            }
        }
    }
    else
    {
        echo "Base de données introuvable";
    }

    include "footerTemplate.php";?>






