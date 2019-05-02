<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> ECEamazon.com </title>
    <?php include ("headerTemplate.php") ; ?>
    <link rel="stylesheet" type="text/css" href="../Css/HomeStylesheet.css">
</head>
<body>
    <!-- import the header template -->
    <?php headerDisplay(); ?>
    <!-- main body home page -->
    <main>
        <div class="main_wrapper">
            <div class="cat_item" id="cat_item_1">
                <a href="#" class="pic">
                    <div class="rect_hover cover">
                        <h1>Livres</h1>
                    </div>
                    <img class="cover" src="../Assets/WebSiteResources/images/books_image.jpg">
                </a>
                <section class="section_side">
                    <a href="#">Vente Flash</a>
                    <a href="#">Top des Ventes</a>
                    <a href="#">Notre Selection</a>
                </section>
            </div>
            <div class="cat_item" id="cat_item_2">
                <a href="#" class="pic">
                    <div class="rect_hover cover">
                        <h1>Musiques</h1>
                    </div>
                    <img class="cover" src="../Assets/WebSiteResources/images/music_image.jpg">
                </a>
                <section class="section_side">
                    <a href="#">Vente Flash</a>
                    <a href="#">Top des Ventes</a>
                    <a href="#">Notre Selection</a>
                </section>
            </div>
            <div class="cat_item" id="cat_item_3">
                <a href="#" class="pic">
                    <div class="rect_hover cover">
                        <h1>Vêtements</h1>
                    </div>
                    <img class="cover" src="../Assets/WebSiteResources/images/clothes_image.jpg">
                </a>
                <section class="section_side">
                    <a href="#">Vente Flash</a>
                    <a href="#">Top des Ventes</a>
                    <a href="#">Notre Selection</a>
                </section>
            </div>
            <div class="cat_item" id="cat_item_4">
                <a href="#" class="pic">
                    <div class="rect_hover cover">
                        <h1>Sport et Loisirs</h1>
                    </div>
                    <img class="cover" src="../Assets/WebSiteResources/images/sports_image.jpeg">
                </a>
                <section class="section_side">
                    <a href="#">Vente Flash</a>
                    <a href="#">Top des Ventes</a>
                    <a href="#">Notre Selection</a>
                </section>
            </div>
        </div>

    </main>

    <!-- import the footer template -->
    <?php include("footerTemplate.php"); ?>
</body>
</html> <!--open in HeaderTemplate.php -->