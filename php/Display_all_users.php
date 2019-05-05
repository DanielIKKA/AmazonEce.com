<?php
      session_start();
      include "headerTemplate.php";
      include "fonctions_admin.php";
      displayHeader();?>
<table>
    <tr>
        <th>Type</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Photo</th>
    </tr>


<?php

    if(isset($_GET['action']))
    {
        switch ($_GET['action'])
        {
            Case "remove_user" :
                remove_user($_GET['email']);
                break;
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
                       <td><img width='50' height='50' src=\"../Assets/Users_photo/".$db_field['photo']."\"></td>";
                    if($db_field['type'] != 'admin')
                    {
                        echo "<td><a class='input_btn pink' href=\"Display_all_users.php?action=remove_user&amp;email=".$db_field['email']."\">Supprimer</td>";
                        echo "<td><form method='post' action='Modifier_user.php'>
                        <input type='hidden' value='".$db_field['email']."' id='email' name='email' > 
                        <input class='input_btn blue'  type='submit' id='btn_modifier' value='Modifier'></input>
                        </form></td>";
                    }
            echo "</tr>";
        }
        echo "<form method='post' action='inscription.php'><input type='submit' value='Ajouter un profil'></form>";
    }
    ?>
</table>
<?php include "footerTemplate.php";?>
