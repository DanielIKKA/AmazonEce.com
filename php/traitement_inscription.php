<? session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Crée un compte </title>
    <?php include ("headerTemplate.php") ; ?>
    <link rel="stylesheet" type="text/css" href="../Css/InscriptionStylesheet.css">
</head>
<body>
<!-- import the header template -->
<?php displayHeader(); ?>

<!-- main body home page -->
<main>
    <div class="main_wrapper">
        <div class="sign_in">
<?php
    if(isset($_POST['surname']) AND isset($_POST['firstname']) AND isset($_POST['email'])and isset($_POST['password']) and isset($_POST['password_confirm'])AND isset($_POST['user_type'])and isset($_POST['background']) and isset($_POST['tel']))
    {
        $adress_info = false;
        $bank_info = false;
        if($_POST['password'] == $_POST['password_confirm'])
        {
            $surname = $_POST['surname'];
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user_type = $_POST['user_type'];
            $background = $_POST['background'];

            if(isset($_POST['street'])and isset($_POST['postal_code'])and isset($_POST['city'])and isset($_POST['country']))
            {
                $street = $_POST['street'];
                $postal_code = $_POST['postal_code'];
                $city = $_POST['city'];
                $country = $_POST['country'];
                $adress_info = true;
            }


            if(isset($_POST['card_number'])and isset($_POST['card_type'])and isset($_POST['security_code'])and isset($_POST['name']))
            {
                $card_number = $_POST['card_number'];
                $card_type = $_POST['card_type'];
                $security_code = $_POST['security_code'];
                $name = $_POST['name'];
                $expiracy_date = $_POST['expiracy_date'];
                if($card_number!="" and $card_type!="" and $security_code!="" and $name!="")
                    $bank_info = true;
            }

            require '../../../config.php';
            $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
            $database = "amazonece";
            $db_found = mysqli_select_db( $db_handle, $database );

            if($db_found)
            {
                if($adress_info)
                {
                    $SQL="INSERT INTO adress(street,postal_code,city,country)VALUES(\"".$street."\",\"".$postal_code."\",\"".$city."\",\"".$country."\")";
                    mysqli_query($db_handle,$SQL);
                    $SQL ="SELECT MAX(id) FROM adress";
                    $result = mysqli_query($db_handle, $SQL);
                    if($result)
                    {
                        while($db_field = mysqli_fetch_row($result))
                        {
                            $id_last_adress = $db_field[0];
                        }
                    }
                }

                if($bank_info)
                {
                    $SQL ="INSERT INTO payment_info(number,type,security_code,name,expiracy_date) VALUES(\"".$card_number."\",\"".$card_type."\",\"".$security_code."\",\"".$name."\",\"".$expiracy_date."\")";
                    if(!mysqli_query($db_handle,$SQL))
                    {
                        echo $SQL."<br/>";
                        echo mysqli_error($db_handle);
                    }


                }


                if($adress_info and !$bank_info)
                {
                    $SQL = "INSERT INTO user(type,surname,firstname,adress_id,email,password,background) VALUES(\"" . $user_type ."\",\"" . $surname ."\",\"" . $firstname."\",\"" . $id_last_adress ."\",\"" . $email ."\",\"" . $password ."\",\"" . $_POST['background'] ."\")";
                }

                if(!$adress_info and $bank_info)
                {
                    $SQL = "INSERT INTO user(type,surname,firstname,card_number,email,password,background) VALUES(\"" . $user_type ."\",\"" . $surname ."\",\"" . $firstname."\",\"" . $card_number ."\",\"" . $email ."\",\"" . $password ."\",\"" . $_POST['background'] ."\")";
                }

                if($adress_info and $bank_info)
                {
                    $SQL = "INSERT INTO user(type,surname,firstname,adress_id,card_number,email,password,background) VALUES(\"" . $user_type ."\",\"" . $surname ."\",\"" . $firstname."\",\"" . $id_last_adress ."\",\"" . $card_number ."\",\"" . $email ."\",\"" . $password ."\",\"" . $_POST['background'] ."\")";
                }

                if(!$adress_info and !$bank_info)
                {
                    $SQL = "INSERT INTO user(type,surname,firstname,email,password,background) VALUES(\"" . $user_type ."\",\"" . $surname ."\",\"" . $firstname."\",\"" . $email ."\",\"" . $password ."\",\"" . $_POST['background'] ."\")";
                }




                if(mysqli_query($db_handle, $SQL))
                {
                    echo "<h1 class='sign_in_title'>Inscription réussie</h1>";
                    $_SESSION['user']= array();
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['type'] = $user_type;
                    $_SESSION['user']['surname'] = $surname;
                    $_SESSION['user']['firstname'] = $firstname;
                    $_SESSION['user']['background'] =  $background;

                    //upload de la photo
                    if (file_exists($_FILES['photo']['tmp_name']) || is_uploaded_file($_FILES['photo']['tmp_name']))
                    {
                        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                        $extension = strrchr($_FILES['photo']['name'], '.');


                        if(in_array($extension, $extensions)) //Si l'extension est dans le tableau
                        {
                            $dossier = "C:\wamp64\www\AmazonEce.com\Assets\Users_photo/";

                            //Formatage du nom du fichier
                            $fichier = $email.$extension;



                            if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier))
                            {

                                $SQL = ("UPDATE user SET photo=\"" .$fichier. "\" WHERE user.email=\"" .$email. "\"");
                                if(!mysqli_query($db_handle, $SQL))
                                {
                                    echo "Echec de l'upload de la photo<br/>".$SQL;
                                }
                            }else
                                echo "Echec de l'upload de la photo<br/>" ;
                        }
                    }else echo "Echec de l'ajout de l'image : fichier non trouvé<br/>";
                }
                else
                {
                    echo "<h1>echec de l'inscription</h1><br/>";
                    echo $SQL."<br/>";
                    echo mysqli_error($db_handle);
                }

            }
        }
        else
        {
            echo "Les mots de passe ne sont pas identiques";
        }

    }
    else
    {
        echo "Veuillez remplir tous les champs";
    }
    ?>
        </div>
    </div>
</main>
<?php include "footerTemplate.php";
