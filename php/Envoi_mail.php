<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['id']))
{
    $id = $_POST['id'];
}

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
        $item_id_list =$db_field['item_id_list'];
        $items = explode("_",$item_id_list);
        for ($i=0;$i<count($items);$i++)
        {
            $SQL = "SELECT * FROM item WHERE item.id=\"".$items[$i]."\"";
            $result = mysqli_query($db_handle,$SQL);
            while($db_field = mysqli_fetch_assoc($result))
            {
                feature_normal($db_field['name'],"../Assets/BDD_Images/".$db_field['pic1'],$db_field['price']);
            }
        }
    }
}

$msg = "";

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




$mail->setFrom('arnaud.emprin@gmail.com');

/* Add a recipient. */
$mail->addAddress('ludovic.fritel@gmail.com');

/* Set the subject. */
$mail->Subject = 'Force';

/* Set the mail message body. */
$mail->Body = 'There is a great disturbance in the Force.';


/* Finally send the mail. */
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

?>