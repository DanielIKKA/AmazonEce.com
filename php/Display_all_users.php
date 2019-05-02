<?php
      include "headerTemplate.php";
      include "Fonctions_gestion_users.php";
      displayHeader();?>
<table>
    <tr>
        <th>Type</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Photo</th>
        <th>Background</th>
    </tr>


<?php

    if(isset($_GET['action']))
    {
        switch ($_GET['action'])
        {
            Case "remove_user" :
                remove_user($_GET['email']);
        }
    }

    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
    $database = "amazonece";
    $db_found = mysqli_select_db( $db_handle, $database );

    if($db_found)
    {
        $SQL = "SELECT * FROM user ORDER BY type";
        $result = mysqli_query($db_handle,$SQL);
        while($db_field = mysqli_fetch_assoc($result))
        {
            echo "<tr>
                       <td>".$db_field['type']."</td>
                       <td>".$db_field['firstname']."</td>
                       <td>".$db_field['surname']."</td>
                       <td>".$db_field['email']."</td>
                       <td>".$db_field['adress']."</td>
                       <td>".$db_field['tel']."</td>
                       <td><img width='50' height='50' src=\"../Assets/Users_photo/".$db_field['photo']."\"></td>
                       <td>".$db_field['background']."</td>";
                        //if($_SESSION['type'] == admin)
            echo "<td><a href=\"Display_all_users.php?action=remove_user&amp;email=".$db_field['email']."\">Supprimer</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
<?php include "footerTemplate.php";?>
