<?php session_start();
include "headerTemplate.php";
include "FeatureTemplate.php";
    displayHeader();

    ?>
<main>
    <div class="main_wrapper">

<?php

$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
$database = "amazonece";
$db_found = mysqli_select_db( $db_handle, $database );

$adress_set = false;
$bank_set = false;

if($db_found)
{
    $SQL = "SELECT * FROM user WHERE user.email=\"" . $_SESSION['user']['email'] ."\"";
    $result = mysqli_query($db_handle, $SQL);

    while ($db_field = mysqli_fetch_assoc($result))
    {
        $firstname = $db_field['firstname'];
        $surname = $db_field['surname'];
        $photo = $db_field['photo'];
        $password = $db_field['password'];
        $adress_id = $db_field['adress_id'];
        $card_number = $db_field['card_number'];
    }

    $SQL = "SELECT * FROM adress WHERE adress.id=\"" . $adress_id ."\"";
    $result = mysqli_query($db_handle, $SQL);
    while ($db_field = mysqli_fetch_assoc($result))
    {
        $adress_set = true;
        $street = $db_field['street'];
        $city = $db_field['city'];
        $country = $db_field['country'];
        $postal_code = $db_field['postal_code'];
    }

    $SQL = "SELECT * FROM payment_info WHERE payment_info.number=\"" . $card_number ."\"";
    $result = mysqli_query($db_handle, $SQL);
    while ($db_field = mysqli_fetch_assoc($result))
    {
        $bank_set = true;
        $card_type = $db_field['type'];
        $name_on_card = $db_field['name'];
        $expiracy_date = $db_field['expiracy_date'];
        $security_code = $db_field['security_code'];
    }


}

$card_number_discret = substr($card_number, 0, -12);
$card_number_discret = $card_number_discret . " **** **** ****";
?>
<section class="item_section_vertical">
    <h1 class="title_section">Gestion du compte</h1>
<?php
//Informations communes à tous les types de profils
echo "<img width='100' height='100' src='../Assets/Users_photo/".$photo."'>";
echo "Nom : ". $surname ."";
echo "Prenom : ". $firstname;
echo "Email : ". $_SESSION['user']['email'];

if($adress_set)
{
    echo "Adresse : ". $street . " " . $city . " " . $postal_code . " " . $country;
}
else{
    //fonction pour ajouter une adresse
}

if($bank_set)
{
    echo "Informations bancaires : <br/>";
    echo "Numéro de carte : " . $card_number_discret;
    echo "<br/>Type :".$card_type;
    echo "<br/>Nom sur la carte :".$name_on_card;
    echo "<br/>Date d'expiration :".$expiracy_date;
    echo "<br/>Code de sécurité :".$security_code;
}
else{
    //fonction pour ajouter des infos
}
echo "<form method='post' action=''><input type='submit' value='Modifier'></form>";
?>
</section>

<?php
function display_purchase()
{
    echo "<hr class=\"horizontal_separator_item\"/>";
    echo "<section class=item_section_vertical>";
    echo "<h1 class='title_section'>Mes commandes</h1>";
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
    $database = "amazonece";
    $db_found = mysqli_select_db( $db_handle, $database );
    if($db_found)
    {
        $SQL ="SELECT * FROM purchase WHERE purchase.buyer_email=\"".$_SESSION['user']['email']."\"";
        $result = mysqli_query($db_handle,$SQL);
        while($db_field = mysqli_fetch_assoc($result))
            {
                //fonction d'affichage de commande
            }
    }
    echo "</section>";
}

function display_seller()
{

}


function display_admin()
{
    display_purchase();
    echo "<hr class=\"horizontal_separator_item\"/>";
    echo "<section class=item_section_vertical>";
    echo "<h1 class='title_section'>Administrateur</h1>";
    echo "<form method='post' action='Display_all_items.php'><input type='submit' value='Gestion des articles'></form>";
    echo "<form method='post' action='Display_all_users.php'><input type='submit' value='Gestion des utilisateurs'></form>";
    echo "</section>";
}


if(isset($_SESSION['user']['type']))
{
    switch ($_SESSION['user']['type'])
    {
        Case "admin":
            display_admin();
            break;
        Case "seller":
            display_seller();
            break;
    }
}

?>
    </div>
</main>

<?php
include "footerTemplate.php";


