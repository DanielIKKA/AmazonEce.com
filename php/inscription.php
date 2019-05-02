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
            <h1>S'inscrire</h1>
            <form id="form_wrapper" method="post" action="traitement_inscription.php" enctype="multipart/form-data">
                <section class="item_section" id="general_section">
                    <h1 class="title_section">Informations générales<span class="important_text">*</span></h1>
                    <div class="field_margin" id="category_selection">
                        <p>Vous êtes ?</p>
                        <label for="seller">Vendeur</label><input type="radio" name="user_type" value="seller" id="seller"/>
                        <label for="buyer">Acheteur</label><input type="radio" name="user_type" value="buyer" id="buyer"/>
                    </div>
                    <div class="field_margin" id="identity_group">
                        <input class="input_text" type="text" name="surname" id="surname" placeholder="nom">
                        <input class="input_text" type="text" name="firstname" id="firstname" placeholder="prénom">
                    </div>
                    <input class="input_text field_margin" type="email" name="email" id="email" placeholder="e-mail">
                    <input class="input_text field_margin" type="password" name="password" id="password" placeholder="mot de passe">
                    <input class="input_text field_margin" type="password" name="password_confirm" id="password_confirm"
                               placeholder="confirmation">

                    <input type="hidden" name="MAX_FILE_SIZE" value="50000000">
                    Ajoutez une photo de profil : <input type="file" name="photo"><br/>

                    Si vous le désirez, choisissez un thème pour personnaliser votre navigation <br/>
                    <input type="radio" name="background" value="wood" id="wood"/> <label for="wood">Parquet</label><br/>
                    <input type="radio" name="background" value="wall" id="wall"/> <label for="wall">Briques</label><br/>
                    <input type="radio" name="background" value="leather" id="leather"/> <label for="leather">Cuir</label><br/>
                    <input type="radio" name="background" value="none" id="none"/> <label for="none">Aucun</label><br/>

                </section>

                <hr class="horizontal_separator_item"/>

                <section class="item_section" id="adress_section">
                    <h1 class="title_section">Coordonnées<span class="important_text">*</span></h1>
                    <input class="input_text field_margin" type="text" name="street" id="street" placeholder="adresse">
                    <div class="field_margin" id="adress_group">
                        <input class="input_text" type="number" name="postal_code" id="postal_code" placeholder="code postal">
                        <input class="input_text" type="text" name="city" id="city" placeholder="ville">
                        <input class="input_text" type="text" name="country" id="country" placeholder="pays">
                    </div>
                    <input class="input_text field_margin" type="tel" name="tel" id="tel" placeholder="téléphone">
                </section>

                <hr class="horizontal_separator_item"/>

                <section class="item_section" id="bank_info_section">
                    <h1 class="title_section">Paiement</h1>
                    <input class="input_text field_margin" type="text" name="card_number" id="card_number"
                                                     placeholder="numéro de carte banquaire">
                    <div class="field_margin" id="bank_group">
                        <select name="card_type">
                            <option value="Visa">Visa</option>
                            <option value="MasterCard">MasterCard</option>
                            <option value="AmericanExpress">AmericanExpress</option>
                        </select>
                        <input class="input_text" type="date" name="expiracy_date" id="expiracy_date">
                        <input class="input_text" type="text" name="security_code" id="security_code"
                           placeholder="cyptogramme">
                    </div>
                    <input class="input_text field_margin" type="text" name="name" id="name"
                           placeholder="titulaire de la carte">
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
