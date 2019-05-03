<?php
    session_start();
    include "headerTemplate.php";
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
                require '../../../config.php';
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
                            $photo = $db_field['pic1    '];

                        }
                    }else echo $SQL;
                }
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
        }
    }

    ?>

<table width="1000">
    <tr>
        <td>Votre panier</td>
    </tr>
    <tr>
        <th>Nom du produit</th>
        <th>Photo</th>
        <th>Description</th>
        <th>Quantité</th>
        <th>Prix Unitaire</th>
        <th>Action</th>
    </tr>

    <?php
    if(creation_panier())
    {
        $nbArticles=count($_SESSION['panier']['id']);
        if ($nbArticles <= 0)
            echo "<tr><td>Votre panier est vide </td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {

                /*echo "<td><a href=\"panier.php?action=add_quantity&amp;id=".$_SESSION['panier']['id'][$i]."\">+1</a></td>";
                echo "<td><a href=\"panier.php?action=remove_quantity&amp;id=".$_SESSION['panier']['id'][$i]."\">-1</a></td>";
                echo "<td><a href=\"panier.php?action=delete&amp;id=".$_SESSION['panier']['id'][$i]."\">Supprimer du panier</a></td>";
                echo "</tr>";*/
                feature_normal($_SESSION['panier']['name'][$i],"../Assets/BDD_Images/".$_SESSION['panier']['photo'][$i],$_SESSION['panier']['price'][$i]);
            }

            echo "<td colspan=\"2\">";
            echo "<br/>Total : ".total_price()."€";
            echo "<form method=\"post\" action=\"Payment_Form.php\" enctype=\"multipart/form-data\">
                    <input type=\"submit\" value=\"Passer la commande\"/>
                  </form>";
            echo "</td></tr>";
        }
    }
    ?>
</table>