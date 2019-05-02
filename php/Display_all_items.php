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
    session_start();

    require '../../../config.php';
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
                       <td>".$db_field['category']."</td>
                       <td><a href=\"panier.php?action=add&amp;id=".$db_field['id']."&amp;price=".$db_field['price']."&amp;photo=".$db_field['pic1']."&amp;description=".addslashes($db_field['description'])."&amp;name=".addslashes($db_field['name'])."\">Ajouter au panier</a></td>
                  </tr>";
        }
    }
    ?>
</table>
