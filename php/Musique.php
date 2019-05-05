<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Musique </title>
    <?php include("headerTemplate.php"); ?>
    <?php include("FeatureTemplate.php"); ?>
</head>
<body>
<!-- import the header template -->
<?php displayHeader() ?>

<!-- main body home page -->
<main>
    <div class="main_wrapper">
        <div class="title_page">
            <svg class="svg_title" width="378px" height="64px" viewBox="0 0 378 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                <title>Title</title>
                <desc>Created with Sketch.</desc>
                <g id="Title" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g>
                        <text id="Musique" font-family="HelveticaNeue-Light, Helvetica Neue" font-size="50" font-weight="300" fill="#505050">
                            <tspan x="142.15" y="48">Musique</tspan>
                        </text>
                        <path d="M105.5,61 L362.824791,61" id="Line" stroke="#505050" stroke-linecap="square"></path>
                        <g id="misic_icon" transform="translate(0.000000, 2.000000)" fill="#000000" fill-rule="nonzero">
                            <path d="M61.4206897,30.7234914 C61.4206897,22.5200431 58.2260776,14.8030172 52.4284483,9.00538793 C46.630819,3.20775862 38.9137931,0.0131465517 30.7103448,0.0131465517 C22.5068966,0.0131465517 14.7898707,3.20775862 8.99224138,9.00538793 C3.19461207,14.8030172 0,22.5200431 0,30.7234914 L0,45.2635776 C0,53.4801724 6.69159483,60.1717672 14.9081897,60.1717672 C15.894181,60.1717672 16.6829741,59.3829741 16.6829741,58.3969828 L16.6829741,32.143319 C16.6829741,31.1573276 15.894181,30.3685345 14.9081897,30.3685345 C10.3594828,30.3685345 6.28405172,32.40625 3.54956897,35.6271552 L3.54956897,30.7234914 C3.54956897,15.749569 15.7364224,3.56271552 30.7103448,3.56271552 C45.6842672,3.56271552 57.8711207,15.749569 57.8711207,30.7234914 C57.8711207,30.8418103 57.8842672,30.9601293 57.9105603,31.0784483 C57.8842672,31.1967672 57.8711207,31.3150862 57.8711207,31.4334052 L57.8711207,36.337069 C55.1366379,33.1161638 51.0612069,31.0784483 46.5125,31.0784483 C45.5265086,31.0784483 44.7377155,31.8672414 44.7377155,32.8532328 L44.7377155,59.1068966 C44.7377155,60.0928879 45.5265086,60.881681 46.5125,60.881681 C54.7290948,60.881681 61.4206897,54.1900862 61.4206897,45.9734914 L61.4206897,31.4334052 C61.4206897,31.3150862 61.4075431,31.1967672 61.38125,31.0784483 C61.4075431,30.9601293 61.4206897,30.8418103 61.4206897,30.7234914 Z M13.1202586,34.049569 L13.1202586,56.4775862 C7.70387931,55.6230603 3.53642241,50.9165948 3.53642241,45.2635776 C3.54956897,39.6105603 7.70387931,34.9040948 13.1202586,34.049569 Z M48.300431,57.1875 L48.300431,34.7594828 C53.7168103,35.6140086 57.8842672,40.3204741 57.8842672,45.9734914 C57.8711207,51.6396552 53.7168103,56.3329741 48.300431,57.1875 Z" id="Shape"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

        <section class="item_section_vertical" id="vente_flash">
            <h1 class="title_section important_text">Vente Flash</h1>
            <div class="features_scroll">
                <?php
                display_item("Musique", "VenteFlash");
                ?>
            </div>
        </section>

        <hr class="horizontal_separator_item"/>

        <section class="item_section_vertical" id="top_vente">
            <h1 class="title_section">Top Ventes</h1>
            <div class="features_scroll">
                <?php
                    display_item("Musique", "TopVente");
                ?>
            </div>
        </section>

        <hr class="horizontal_separator_item"/>

        <section class="item_section_vertical" id="notre_selection">
            <h1 class="title_section">Notre Selection</h1>
            <div class="features_scroll">
                <?php
                    display_item("Musique", "NotreSelection");
                ?>
            </div>
        </section>

        <hr class="horizontal_separator_item"/>

        <section class="item_section_vertical" id="notre_selection">
            <h1 class="title_section">Tout</h1>
            <div class="features_wrap">
                <?php
                display_item("Musique", null);
                ?>
            </div>
        </section>
    </div>
</main>

<!-- import the footer template -->
<?php include("footerTemplate.php"); ?>
</body>
</html>