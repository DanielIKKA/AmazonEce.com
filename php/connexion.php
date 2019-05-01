<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Connexion </title>
    <link rel="stylesheet" type="text/css" href="../Css/GeneralStylesheet.css">
    <link rel="stylesheet" type="text/css" href="../Css/ConnexionSylesheet.css">
</head>
<body>
<!-- import the header template -->
<?php include ("headerTemplate.php") ; ?>

<!-- main body home page -->
<main>
    <div class="main_wrapper">
        <div class="connexion">
            <h1>Se Connecter</h1>
            <form id="form_wrapper" method="post" action="traitement_connexion.php">
                <input class="input_text" id="email" type="text" name="email" placeholder="e-mail">
                <input class="input_text" id="password" type="password" name="password" placeholder="mot de passe">
                <input type="submit" value="Connexion"/>
                <a class="input_btn" href="inscription.php">Créer un compte</a>
            </form>
        </div>
    </div>
</main>

<!-- import the footer template -->
<?php include("footerTemplate.php"); ?>
</body>
</html>
