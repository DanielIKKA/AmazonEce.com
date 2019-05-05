<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier des informations personnelles</title>
    <?php include ("headerTemplate.php") ; ?>
</head>
<body>
<!-- import the header template -->
<?php displayHeader();

if(isset($_POST['email']))
{
    $email = $_POST['email'];
}

require '../../../config.php';
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
$database = "amazonece";
$db_found = mysqli_select_db( $db_handle, $database );
if($db_found)
{
    $SQL = "SELECT * FROM user WHERE user.email=\"".$email."\"";
    $result = mysqli_query($db_handle,$SQL);
    while($db_field = mysqli_fetch_assoc($result))
    {
        $adress_id = $db_field['adress_id'];
        $card_number = $db_field['card_number'];
        $tel = $db_field['tel'];
        $password = $db_field['password'];
        $surname = $db_field['surname'];
        $firstname = $db_field['firstname'];
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
    <form method=\"post\" action=\"Traitement_modif_user.php\">
    <section class='item_section_vertical'>
        <h1 class='title_section'>Informations générales</h1>
             <input type='hidden' value='".$email."' name=\"email\" id=\"email\">
             <label for=\"surname\">Nom </label><input type=\"text\" name=\"surname\" id=\"surname\" value='".$surname."'><br/>
             <label for=\"firstname\">Prenom </label><input type=\"text\" name=\"firstname\" id=\"firstname\"value='".$firstname."'><br/>
             <label for=\"tel\">Numero de telephone de contact</label><input type=\"text\" name=\"tel\" id=\"tel\" value='".$tel."'><br/>
             <label for=\"password\">Mot de passe</label><input type=\"password\" name=\"password\" id=\"password\" value='".$password."'><br/>
             <label for=\"password_confirm\">Confirmation du mot de passe</label><input type=\"password\" name=\"password_confirm\" id=\"password_confirm\" value='".$password."'><br/>
    </section>
    <hr class='horizontal_separator_item'/>";

if($adress_id == null)
{
    echo "
<section class='item_section_vertical'>
    <h1 class='title_section'>Adresse de livraison</h1>
        <label for=\"street\">Adresse </label><input type=\"text\" name=\"street\" id=\"street\"><br/>
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
        <label for=\"street\">Adresse </label><input type=\"text\" name=\"street\" id=\"street\" value='".$street."'><br/>
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
        <select name=\"card_type\">
            <option value=\"Visa\">Visa</option>
            <option value=\"MasterCard\">MasterCard</option>
            <option value=\"AmericanExpress\">AmericanExpress</option>
        </select>
        <label for=\"card_number\">Numero de la carte </label><input type=\"text\" name=\"card_number\" id=\"card_number\"><br/>
        <label for=\"name\">Nom sur la carte </label><input type=\"text\" name=\"name\" id=\"name\"><br/>
        <label for=\"expiracy_date\">Date d'expiration </label><input type=\"date\" name=\"expiracy_date\" id=\"expiracy_date\"><br/>
        <label for=\"security_code\">Code de sécurité</label><input type=\"text\" name=\"security_code\" id=\"security_code\"><br/><br/>
        <input class='input_btn' type=\"submit\" value=\"Enregistrer les modifications\">
</section>
<hr class='horizontal_separator_item'/>
    ";
}else
{
    echo "
    <section class='item_section_vertical'>
    <h1 class='title_section'>Informations bancaires</h1>
        <select name=\"card_type\">
            <option value=\"Visa\">Visa</option>
            <option value=\"MasterCard\">MasterCard</option>
            <option value=\"AmericanExpress\">AmericanExpress</option>
        </select>
        <label for=\"card_number\">Numero de la carte </label><input type=\"text\" name=\"card_number\" id=\"card_number\" value='".$card_number."'><br/>
        <label for=\"name\">Nom sur la carte </label><input type=\"text\" name=\"name\" id=\"name\" value='".$name_on_card."'><br/>
        <label for=\"expiracy_date\">Date d'expiration </label><input type=\"date\" name=\"expiracy_date\" id=\"expiracy_date\" value='".$expiracy_date."'><br/>
        <label for=\"security_code\">Code de sécurité</label><input type=\"text\" name=\"security_code\" id=\"security_code\" value='".$security_code."'><br/><br/>
        <input class='input_btn' type=\"submit\" value=\"Enregistrer les modifications\">
</section>
<hr class='horizontal_separator_item'/>
    ";
}

echo "</form>";


?>


