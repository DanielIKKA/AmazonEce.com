<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Crée un compte </title>
    <link rel="stylesheet" type="text/css" href="../Css/GeneralStylesheet.css">
    <link rel="stylesheet" type="text/css" href="../Css/InscriptionStylesheet.css">
</head>
<body>
<!-- import the header template -->
<?php include ("headerTemplate.php") ; ?>

<!-- main body home page -->
<main>
    <div class="main_wrapper">
        <div class="sign_in">
            <h1>Se Connecter</h1>
            <form id="form_wrapper" method="post" action="traitement_inscription.php">
                <section id="general_section">
                    <h2 class="title_section">Informations générales<span>*</span></h2>
                    Désirez vous créer un compte vendeur ou acheteur
                    <input type="radio" name="type" value="seller" id="seller"/> <label for="seller">Vendeur</label><br />
                    <input type="radio" name="type" value="buyer" id="buyer"/> <label for="buyer">Acheteur</label><br />
                    <label for="surname">Votre nom </label><input type="text" name="surname" id="surname"><br/>
                    <label for="firstname">Votre prenom </label><input type="text" name="firstname" id="firstname"><br/>
                    <label for="email">Votre adresse mail </label><input type="email" name="email" id="email"><br/>
                    <label for="password">Votre mot de passe </label><input type="password" name="password" id="password"><br/>
                    <label for="password_confirm">Confirmez le mot de passe </label><input type="password" name="password_confirm" id="password_confirm">
                </section>
                <section id="adress_section">
                    <h2 class="title_section">Coordonnées<span>*</span></h2>
                    <label for="adress">Votre adresse </label><input type="text" name="adress" id="adress"><br/>
                </section>

                <section id="bank_info_section">
                    <h2 class="title_section">Paiement</h2>
                </section>

                <input type="submit" value="Créer mon compte"/>
            </form>
        </div>
    </div>
</main>

<!-- import the footer template -->
<?php include("footerTemplate.php"); ?>
</body>
</html>
