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
            <div class="cat_item" id="cat_item_1">
                <a href="#" class="pic">
                    <div class="rect_hover fit">
                        <h1>Livres</h1>
                    </div>
                    <img class="fit" src="../Assets/WebSiteResources/images/books_image.jpg">
                </a>
                <section class="section_side">
                    <a href="#">Vente Flash</a>
                    <a href="#">Top des Ventes</a>
                    <a href="#">Notre Selection</a>
                </section>
            </div>
            <div class="cat_item" id="cat_item_2">
                <a href="#" class="pic">
                    <div class="rect_hover fit">
                        <h1>Musiques</h1>
                    </div>
                    <img class="fit" src="../Assets/WebSiteResources/images/music_image.jpg">
                </a>
                <section class="section_side">
                    <a href="#">Vente Flash</a>
                    <a href="#">Top des Ventes</a>
                    <a href="#">Notre Selection</a>
                </section>
            </div>
            <div class="cat_item" id="cat_item_3">
                <a href="#" class="pic">
                    <div class="rect_hover fit">
                        <h1>Vêtements</h1>
                    </div>
                    <img class="fit" src="../Assets/WebSiteResources/images/clothes_image.jpg">
                </a>
                <section class="section_side">
                    <a href="#">Vente Flash</a>
                    <a href="#">Top des Ventes</a>
                    <a href="#">Notre Selection</a>
                </section>
            </div>
            <div class="cat_item" id="cat_item_4">
                <a href="#" class="pic">
                    <div class="rect_hover fit">
                        <h1>Sport et Loisirs</h1>
                    </div>
                    <img class="fit" src="../Assets/WebSiteResources/images/sports_image.jpeg">
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
</html>