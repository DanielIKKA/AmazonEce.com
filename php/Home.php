<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> ECEamazon.com </title>
    <link rel="stylesheet" type="text/css" href="../Css/HomeStylesheet.css">
</head>
<body>
    <!-- import the header template -->
    <?php include ("headerTemplate.php") ; ?>

    <!-- main body home page -->
    <main id="main_wrapper">
        <div class="cat_item" id="cat_item_1">
            <div class="pic">
                <img class="fit" src="../Assets/WebSiteResources/images/books_image.jpg">
            </div>
            <section class="section_side">
                <a href="#">Vente Flash</a>
                <a href="#">Top des Ventes</a>
                <a href="#">Notre Selection</a>
            </section>
        </div>
        <div class="cat_item" id="cat_item_2">
            <div class="pic">
                <img class="fit" src="../Assets/WebSiteResources/images/music_image.jpg">
            </div>
            <section class="section_side">
                <a href="#">Vente Flash</a>
                <a href="#">Top des Ventes</a>
                <a href="#">Notre Selection</a>
            </section>
        </div>
        <div class="cat_item" id="cat_item_3">
            <div class="pic">
                <img class="fit" src="../Assets/WebSiteResources/images/clothes_image.jpg">
            </div>
            <section class="section_side">
                <a href="#">Vente Flash</a>
                <a href="#">Top des Ventes</a>
                <a href="#">Notre Selection</a>
            </section>
        </div>
        <div class="cat_item" id="cat_item_4">
            <div class="pic">
                <img class="fit" src="../Assets/WebSiteResources/images/sports_image.jpeg">
            </div>
            <section class="section_side">
                <a href="#">Vente Flash</a>
                <a href="#">Top des Ventes</a>
                <a href="#">Notre Selection</a>
            </section>
        </div>
    </main>

    <!-- import the footer template -->
    <?php include("footerTemplate.php"); ?>
</body>
</html>