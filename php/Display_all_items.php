<?php
    include "headerTemplate.php";
    displayHeader();
    include "fonctions_admin.php";
    ?>

<table>
    <tr>
        <th>Nom du produit</th>
        <th>Vendeur</th>
        <th>Photo</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Catégorie</th>
    </tr>



<?php

    if(isset($_GET['action']))
    {
        switch ($_GET['action'])
        {
            Case "remove_user" :
                remove_item($_GET['id']);
                break;
        }
    }

    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
    $database = "amazonece";
    $db_found = mysqli_select_db( $db_handle, $database );

    if($db_found)
    {
        $SQL = "SELECT * FROM item ORDER BY category";
        $result = mysqli_query($db_handle,$SQL);
        while($db_field = mysqli_fetch_assoc($result))
        {
            echo "<tr>
                       <td>".$db_field['name']."</td>
                       <td>".$db_field['seller_email']."</td>
                       <td><img width='100' height='100' src=\"../Assets/BDD_Images/".$db_field['pic1']."\"></td>
                       <td>".$db_field['description']."</td>
                       <td>".$db_field['price']."€"."</td>
                       <td>".$db_field['category']."</td>";
                       //<td><a href=\"panier.php?action=add&amp;id=".$db_field['id']."\">Ajouter au panier</a></td>
                   echo"<td><a href=\"Display_all_items.php?action=remove_item&amp;id=".$db_field['id']."\">Supprimer</a></td>
                  </tr>";
        }
        echo "<form method='post' action='Sell_Item_Form.php'><input type='submit' value='Ajouter un objet'></form>";
    }
    ?>
</table>

<?php include "footerTemplate.php";?>
