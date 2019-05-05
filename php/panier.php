<?php
    session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Panier </title>
    <?php include("headerTemplate.php"); ?>
</head>
<body>
<?php
    displayHeader();
    include "Fonctions_panier.php";
    include "FeatureTemplate.php";

    $erreur = false;

    if(isset($_GET['action']))
        $action = $_GET['action'];


    if(isset($_GET['id']))
        $id = $_GET['id'];


    if(!$erreur and isset($_GET['action']))
    {
        switch ($action)
        {
            Case "add" :
                $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
                $database = "amazonece";
                $db_found = mysqli_select_db( $db_handle, $database );
                if($db_found)
                {
                    $SQL = "SELECT * FROM item WHERE item.id=\"".$id."\"";
                    $result = mysqli_query($db_handle,$SQL);
                    if($result)
                    {
                        while ($db_field = mysqli_fetch_assoc($result))
                        {
                            $price = $db_field['price'];
                            $name = $db_field['name'];
                            $description = $db_field['description'];
                            $photo = $db_field['pic1'];
                            $priority_type = $db_field['priority_level'];
                        }
                    }else echo $SQL;
                }
                if($priority_type == "VenteFlash")
                    $price = $price * 0.8;

                add($id,$price,$photo,$description,$name);
                break;
            Case "delete" :
                delete($id);
                break;
            Case "add_quantity":
                add_quantity($id);
                break;
            Case "remove_quantity":
                remove_quantity($id);
                break;
            Case "clear" :
                clear_cart();
                break;
        }
    }

    ?>

    <?php
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
    $database = "amazonece";
    $db_found = mysqli_select_db( $db_handle, $database );
    echo "<main><div class='main_wrapper'>";
    echo"<h1 class='title'>Votre Panier</h1>";
    echo "<section class='item_section_vertical'>";
    echo"<div class='features_scroll'>";
    if(creation_panier())
    {
        $nbArticles=count($_SESSION['panier']['id']);
        if ($nbArticles <= 0)
            echo "<tr><td>Votre panier est vide </td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {

                $SQL = "Select * from item where item.id=\"".$_SESSION['panier']['id'][$i]."\"";
                $result = mysqli_query($db_handle,$SQL);
                if($result) {
                    while ($db_field = mysqli_fetch_assoc($result)) {
                        $priority_level = $db_field['priority_level'];
                        $price = $db_field['price'];
                    }
                    if ($priority_level == "VenteFlash")
                    {
                        feature_flash($_SESSION['panier']['id'][$i], $_SESSION['panier']['name'][$i], "../Assets/BDD_Images/" . $_SESSION['panier']['photo'][$i], $price);
                        //echo "<a class='input_btn blue' href='panier.php?action=add&amp;id=".$_SESSION['panier']['id'][$i]."'>Ajouter</a>";
                    }
                    else
                    {
                        feature_normal($_SESSION['panier']['id'][$i], $_SESSION['panier']['name'][$i], "../Assets/BDD_Images/" . $_SESSION['panier']['photo'][$i], $_SESSION['panier']['price'][$i]);
                        //echo "<a class='input_btn blue' href='panier.php?action=add&amp;id=".$_SESSION['panier']['id'][$i]."'>Ajouter</a>";
                    }
                }
            }

            echo "</div>";
            echo "<a class='input_btn pink' href='panier.php?action=clear&amp;'>Vider le panier</a>";
            echo "<h1 class='title_section'>Total : ".total_price()."€<h1/>";
            echo "<form method=\"post\" action=\"Payment_Form.php\" enctype=\"multipart/form-data\">
                    <input class='input_btn blue' type='submit' value=\"Passer la commande\"/>
                  </form>";
            echo"</section></div></main></body>";
        }
    }
    ?>