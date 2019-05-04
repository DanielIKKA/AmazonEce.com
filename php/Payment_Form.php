<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Informations et Paiement </title>
    <?php include ("headerTemplate.php") ; ?>
</head>
<body>
<!-- import the header template -->
<?php displayHeader();

require '../../../config.php';
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
$database = "amazonece";
$db_found = mysqli_select_db( $db_handle, $database );
if($db_found)
{
    $SQL = "SELECT * FROM user WHERE user.email=\"".$_SESSION['user']['email']."\"";
    $result = mysqli_query($db_handle,$SQL);
    while($db_field = mysqli_fetch_assoc($result))
    {
        $adress_id = $db_field['adress_id'];
        $card_number = $db_field['card_number'];
        $tel = $db_field['tel'];
    }
    $SQL ="SELECT * FROM adress WHERE adress.id=\"".$adress_id."\"";
    $result = mysqli_query($db_handle,$SQL);
    while($db_field = mysqli_fetch_assoc($result))
    {
        $street = $db_field['street'];
        $postal_code = $db_field['postal_code'];
        $city = $db_field['city'];
        $country = $db_field['country'];
    }
    $SQL ="SELECT * FROM payment_info WHERE payment_info.number=\"".$card_number."\"";
    $result = mysqli_query($db_handle,$SQL);
    while($db_field = mysqli_fetch_assoc($result))
    {
        $card_type = $db_field['type'];
        $security_code = $db_field['security_code'];
        $expiracy_date = $db_field['expiracy_date'];
        $name_on_card = $db_field['name'];
    }



}

echo "
    <form method=\"post\" action=\"Commande.php\">
    <section class='item_section_vertical'>
        <h1 class='title_section'>Informations générales</h1>
             <label for=\"surname\">Nom </label><input type=\"text\" name=\"surname\" id=\"surname\" value='".$_SESSION['user']['surname']."'><br/>
             <label for=\"firstname\">Prenom </label><input type=\"text\" name=\"firstname\" id=\"firstname\"value='".$_SESSION['user']['firstname']."'><br/>
             <label for=\"tel\">Numero de telephone de contact</label><input type=\"text\" name=\"tel\" id=\"tel\" value='".$tel."'><br/>
    </section>
    <hr class='horizontal_separator_item'/>";

if($adress_id == null)
{
    echo "
<section class='item_section_vertical'>
    <h1 class='title_section'>Adresse de livraison</h1>
        <label for=\"adress\">Adresse </label><input type=\"text\" name=\"adress\" id=\"adress\"><br/>
        <label for=\"city\">Ville </label><input type=\"text\" name=\"city\" id=\"city\"><br/>
        <label for=\"postal_code\">Code postal </label><input type=\"text\" name=\"postal_code\" id=\"postal_code\"><br/>";
        include "Country_list.php";
        echo "</section>
              <hr class='horizontal_separator_item'/>";
}
else
{
    echo "
    <section class='item_section_vertical'>
    <h1 class='title_section'>Adresse de livraison</h1>
        <label for=\"adress\">Adresse </label><input type=\"text\" name=\"adress\" id=\"adress\" value='".$street."'><br/>
        <label for=\"city\">Ville </label><input type=\"text\" name=\"city\" id=\"city\" value='".$city."'><br/>
        <label for=\"postal_code\">Code postal </label><input type=\"text\" name=\"postal_code\" id=\"postal_code\" value='".$postal_code."'><br/>";
        include "Country_list.php";
        echo "</section>
              <hr class='horizontal_separator_item'/>";
}

if($card_number==null)
{
    echo "
    <section class='item_section_vertical'>
    <h1 class='title_section'>Informations bancaires</h1>
        <select name=\"type\">
            <option value=\"Visa\">Visa</option>
            <option value=\"MasterCard\">MasterCard</option>
            <option value=\"AmericanExpress\">AmericanExpress</option>
        </select>
        <label for=\"number\">Numero de la carte </label><input type=\"text\" name=\"number\" id=\"number\"><br/>
        <label for=\"name\">Nom sur la carte </label><input type=\"text\" name=\"name\" id=\"name\"><br/>
        <label for=\"expiracy_date\">Date d'expiration </label><input type=\"date\" name=\"expiracy_date\" id=\"expiracy_date\"><br/>
        <label for=\"security_code\">Code de sécurité</label><input type=\"text\" name=\"security_code\" id=\"security_code\"><br/><br/>
        <input type=\"submit\" value=\"Passer la commande\">
</section>
<hr class='horizontal_separator_item'/>
    ";
}else
{
    echo "
    <section class='item_section_vertical'>
    <h1 class='title_section'>Informations bancaires</h1>
        <select name=\"type\">
            <option value=\"Visa\">Visa</option>
            <option value=\"MasterCard\">MasterCard</option>
            <option value=\"AmericanExpress\">AmericanExpress</option>
        </select>
        <label for=\"number\">Numero de la carte </label><input type=\"text\" name=\"number\" id=\"number\" value='".$card_number."'><br/>
        <label for=\"name\">Nom sur la carte </label><input type=\"text\" name=\"name\" id=\"name\" value='".$name_on_card."'><br/>
        <label for=\"expiracy_date\">Date d'expiration </label><input type=\"date\" name=\"expiracy_date\" id=\"expiracy_date\" value='".$expiracy_date."'><br/>
        <label for=\"security_code\">Code de sécurité</label><input type=\"text\" name=\"security_code\" id=\"security_code\" value='".$security_code."'><br/><br/>
        <input type=\"submit\" value=\"Passer la commande\">
</section>
<hr class='horizontal_separator_item'/>
    ";
}

echo "</form>";


?>


