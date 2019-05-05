<?php session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['id']))
{
    $id = $_POST['id'];
}

echo $id;

require '../../../config.php';
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
$database = "amazonece";
$db_found = mysqli_select_db( $db_handle, $database );
if($db_found)
{
    $SQL = "SELECT * FROM purchase WHERE purchase.id=\"".$id."\"";
    $result = mysqli_query($db_handle,$SQL);
    while($db_field = mysqli_fetch_assoc($result))
    {
        $buyer_email = $db_field['buyer_email'];
        $price = $db_field['price'];
        $card_number = $db_field['card_number'];
        $card_number_discret = substr($card_number, 0, -12);
        $card_number_discret = $card_number_discret . " **** **** ****";
        $adress_id = $db_field['adress_id'];
    }

    $SQL = "SELECT * FROM user WHERE user.email=\"" . $buyer_email . "\"";
    $result = mysqli_query($db_handle, $SQL);
    while ($db_field = mysqli_fetch_assoc($result)) {
        $firstname = $db_field['firstname'];
        $surname = $db_field['surname'];
        $contact_number = $db_field['tel'];
    }

    $SQL = "SELECT * FROM adress WHERE adress.id=\"" . $adress_id . "\"";
    $result = mysqli_query($db_handle, $SQL);
    while ($db_field = mysqli_fetch_assoc($result)) {
        $street = $db_field['street'];
        $city = $db_field['city'];
        $postal_code = $db_field['postal_code'];
        $country = $db_field['country'];
    }

    $SQL = "SELECT * FROM payment_info WHERE payment_info.number=\"".$card_number."\"";
    $result = mysqli_query($db_handle,$SQL);
    while($db_field = mysqli_fetch_assoc($result))
    {
        $card_type = $db_field['type'];
        $name_on_card = $db_field['name'];
        $expiracy_date = $db_field['expiracy_date'];
        $security_code = $db_field['security_code'];
    }
}

$msg = "Bonjour ".$firstname." ".$surname.",\nVoici le récapitulatif de votre commande n°".$id." d'un montant total de ".$price."€.\n Merci de vérifier que vos informations de contact, de livraison et de paiement sont exactes\n\n".$firstname." ".$surname."\n\nADRESSE DE LIVRAISON\n".$contact_number."\n\n".$street." ".$city." ".$postal_code." ". $country."\n\nPAIEMENT :\nNuméro de carte: ".$card_number_discret."\nType de carte: ". $card_type."\nNom sur la carte: ".$name_on_card."\nDate d'expiration:".$expiracy_date."\n\nVous pouvez retouvez le détails des articles achetés sur notre site, dans la section Mon Compte.\n\nMerci de votre commande sur AmazonEce.com !";

/* The main PHPMailer class. */
require 'C:\wamp64\www\PHPMailer-master\src\PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'C:\wamp64\www\PHPMailer-master\src\SMTP.php';

require 'C:\wamp64\www\PHPMailer-master\src\Exception.php';

require "C:/wamp64/apps/phpmyadmin4.8.4/vendor/autoload.php";


$mail = new PHPMailer(TRUE);

/* SMTP parameters. */

/* Tells PHPMailer to use SMTP. */
$mail->isSMTP();

$mail->SMTPDebug = 2;

/* SMTP server address. */
$mail->Host = 'smtp.gmail.com';

/* Set the SMTP port. */
$mail->Port = 587;

$mail->SMTPSecure = 'tls';

/* Use SMTP authentication. */
$mail->SMTPAuth = TRUE;


$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

/* SMTP authentication username. */
$mail->Username = 'arnaud.emprin@gmail.com';

/* SMTP authentication password. */
$mail->Password = 'arnemp92500';

$mail->CharSet = 'utf-8';


$mail->setFrom('arnaud.emprin@gmail.com');

/* Add a recipient. */
$mail->addAddress($buyer_email);

/* Set the subject. */
$mail->Subject = 'RECAPITULATIF COMMANDE n°'.$id;

/* Set the mail message body. */
$mail->Body = $msg;


/* Finally send the mail. */
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //header("Location:Commande.php");
    exit;
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}



?>

<script type="javascript">
    print("hey");
    window.location.href = "Commande.php";
</script>
