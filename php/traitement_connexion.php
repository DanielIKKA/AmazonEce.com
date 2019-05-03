<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Connexion </title>
    <?php include ("headerTemplate.php") ; ?>
    <link rel="stylesheet" type="text/css" href="../Css/ConnexionSylesheet.css">
</head>
<body>
<!-- import the header template -->
<?php displayHeader(); ?>

<!-- main body home page -->
<main>
    <div class="main_wrapper">
        <div class="connexion">



<?php
    if(isset($_POST['email']) AND isset($_POST['password']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $worked = false;

        require '../../../config.php';
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
        $database = "amazonece";
        $db_found = mysqli_select_db( $db_handle, $database );
        if($db_found)
        {
            $SQL = "SELECT * FROM user WHERE email=\"" . $email."\"";
            $result = mysqli_query($db_handle, $SQL);

                while ($db_field = mysqli_fetch_assoc($result))
                {
                    $worked = true;
                    if($db_field['password'] == $password)
                    {
                        echo "<h1>Connexion réussie</h1>";
                        echo "<h1>Bienvenue, ".$db_field['firstname'].". Content de vous revoir !</h1>";
                        $_SESSION['user']= array();
                        $_SESSION['user']['email'] = $db_field['email'];
                        $_SESSION['user']['type']= $db_field['type'];
                        $_SESSION['user']['surname'] = $db_field['surname'];
                        $_SESSION['user']['firstname'] = $db_field['firstname'];
                        $_SESSION['user']['background'] = $db_field['background'];
                    }
                    else
                    {
                        echo "Mot de passe incorrect" ;
                    }
                }

                if(!$worked)
                {
                    echo "Adresse email ou mot de passe incorrect";
                }

        }
        else
            echo "Database not found";
    }
    ?>
        </div>
    </div>
</main>
<?php
include "footerTemplate.php";
set_background();
