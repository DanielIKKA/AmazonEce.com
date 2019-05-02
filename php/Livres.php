<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> ECEamazon.com </title>
    <link rel="stylesheet" type="text/css" href="../Css/GeneralStylesheet.css">
    <?php include("FeatureTemplate.php"); ?>
</head>
<body>
<!-- import the header template -->
<?php include ("headerTemplate.php"); ?>

<!-- main body home page -->
<main>
    <div class="main_wrapper">
        <section class="item_section" id="vente_flash">
            <h1 class="title_section">Vente Flash</h1>
            <?php feature("le vieil homme et la mer", "../Assets/BDD_Images/38_1.png", 22); ?>
        </section>

        <hr class="horizontal_separator_item"/>

        <section class="item_section" id="top_vente">
            <h1 class="title_section">Top Ventes</h1>
        </section>

        <hr class="horizontal_separator_item"/>

        <section class="item_section" id="notre_selection">
            <h1 class="title_section">Notre Selection</h1>

        </section>
    </div>

</main>

<!-- import the footer template -->
<?php include("footerTemplate.php"); ?>
</body>
</html>
