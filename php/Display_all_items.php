<?php
session_start();
    include "headerTemplate.php";
    displayHeader();
    include "fonctions_admin.php";
    ?>

<table>
    <tr>
        <th>Nom du produit</th>
        <th>Photo</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Catégorie</th>
        <th>Section</th>
    </tr>



<?php

    if(isset($_POST['new_priority_level']))
    {
        change_priority_type($_POST['id'],$_POST['new_priority_level']);
    }

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
                       <td><img width='100' height='100' src=\"../Assets/BDD_Images/".$db_field['pic1']."\"></td>
                       <td>".$db_field['description']."</td>
                       <td>".$db_field['price']."€"."</td>
                       <td>".$db_field['category']."</td>
                       <td>
                            <form method='post' action='Display_all_items.php'>
                                <select name='new_priority_level' id='new_priority_level'>
                                    <option value=\"".$db_field['priority_level']."\" selected='selected'>".$db_field['priority_level']."</option>
                                    <option value='VenteFlash'>Vente Flash</option>
                                    <option value='NotreSelection'>Notre Sélection</option>
                                    <option value='TopVente'>Top Vente</option>
                                    <option value='Aucune'>Aucune</option>
                                </select>
                                <input type='hidden' value='".$db_field['id']."' name='id' id='id'>
                                <input type='submit' value='Changer'>
                            </form></td>";


                   echo"<td><a class='input_btn pink' href=\"Display_all_items.php?action=remove_item&amp;id=".$db_field['id']."\">Supprimer</a></td>
                  </tr>";
        }
        echo "<form method='post' action='Sell_Item_Form.php'><input type='submit' value='Ajouter un objet'></form>";
    }
    ?>
</table>

<?php include "footerTemplate.php";?>
