<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> ECEamazon.com </title>
    <link rel="stylesheet" type="text/css" href="../Css/GeneralStylesheet.css">
    <link rel="stylesheet" type="text/css" href="../Css/HomeStylesheet.css">
</head>
<body>
<!-- import the header template -->
<?php include ("headerTemplate.php") ; ?>

<!-- main body home page -->
<main>
    <div id="main_wrapper">
        <div class="connexion">
            <form method="post" action="traitement_connexion.php">
                <label for="email">Votre email </label><input type="text" name="email" id="email"><br/>
                <label for="password">Votre mot de passe </label><input type="password" name="password" id="password"><br/>
                <p><br/><input type="submit" value="Se connecter"/></p>
            </form>
        </div>
    </div>

</main>

<!-- import the footer template -->
<?php include("footerTemplate.php"); ?>
</body>
</html>
