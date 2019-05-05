<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Mode </title>
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
                    <g transform="translate(-2.000000, 0.000000)">
                        <text id="Mode" font-family="HelveticaNeue-Light, Helvetica Neue" font-size="50" font-weight="300" fill="#505050">
                            <tspan x="173.75" y="48">Mode</tspan>
                        </text>
                        <path d="M117.5,61 L354.824791,61" id="Line" stroke="#505050" stroke-linecap="square"></path>
                        <g id="clothes_icon" transform="translate(0.000000, 2.000000)" fill="#000000" fill-rule="nonzero">
                            <path d="M96.0541016,48.1507313 L52.08125,25.478175 L52.08125,22.61575 C52.0996094,22.6113656 52.1179687,22.6052656 52.1392578,22.6008813 C59.0667969,20.9270031 63.7175781,16.7153344 63.7175781,11.3004406 C63.7175781,5.05899688 58.5326172,0 52.1392578,0 C46.2341797,0 41.1009766,4.21757813 40.5945313,9.86922813 C40.5792969,9.95558125 40.5701172,10.0449844 40.5701172,10.1343875 C40.5701172,10.1448719 40.5669922,10.1551656 40.5669922,10.167175 C40.5669922,11.2901469 41.5007813,12.2 42.6513672,12.2 C43.8019531,12.2 44.7357422,11.2901469 44.7357422,10.167175 L44.7478516,10.167175 C44.915625,8.40827813 45.7916016,7.1469125 46.5605469,6.36058438 C47.9826172,4.90268438 50.0181641,4.067175 52.1390625,4.067175 C56.2253906,4.067175 59.5488281,7.31218438 59.5488281,11.3004406 C59.5488281,12.8223906 58.8988281,14.2179563 57.6109375,15.4480594 C56.1064453,16.8851813 53.8695313,17.9932844 51.1380859,18.6528469 C51.1380859,18.6528469 47.9734375,19.6059719 47.9185547,19.6254156 L47.9185547,20.332825 L47.9154297,20.332825 L47.9154297,25.478175 L3.94902344,48.1507313 C1.59003906,49.3360375 0,51.5640625 0,54.1195813 C0,57.9202625 3.51875,61 7.85820313,61 C7.9375,61 8.09316406,61 8.09316406,61 L91.9097656,61 C91.9097656,61 92.0654297,61 92.1447266,61 C96.484375,61 100,57.9202625 100,54.1195813 C100,51.5640625 98.4130859,49.3360375 96.0541016,48.1507313 Z M92.1447266,56.9313 L91.9097656,56.9313 L8.09335938,56.9313 L7.85839844,56.9313 C5.85957031,56.9313 4.16875,55.6445813 4.16875,54.1195813 C4.16875,53.178275 4.80039063,52.296825 5.859375,51.7605969 L5.87773438,51.7546875 L5.89609375,51.7428688 L49.9970703,29.0034031 L94.1072266,51.7428688 L94.1255859,51.7546875 L94.1439453,51.7605969 C95.2029297,52.2966344 95.8345703,53.1784656 95.8345703,54.1195813 C95.834375,55.6445813 94.14375,56.9313 92.1447266,56.9313 Z" id="Shape"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

        <section class="item_section_vertical" id="vente_flash">
            <h1 class="title_section important_text">Vente Flash</h1>
            <div class="features_scroll">
                <?php
                display_item("Vetements", "VenteFlash");
                ?>
            </div>
        </section>

        <hr class="horizontal_separator_item"/>

        <section class="item_section_vertical" id="top_vente">
            <h1 class="title_section">Top Ventes</h1>
            <div class="features_scroll">
                <?php
                display_item("Vetements", "TopVente");
                ?>
            </div>
        </section>

        <hr class="horizontal_separator_item"/>

        <section class="item_section_vertical" id="notre_selection">
            <h1 class="title_section">Notre Selection</h1>
            <div class="features_scroll">
                <?php
                display_item("Vetements", "NotreSelection");
                ?>
            </div>
        </section>

        <hr class="horizontal_separator_item"/>

        <section class="item_section_vertical" id="notre_selection">
            <h1 class="title_section">Tout</h1>
            <div class="features_wrap">
                <?php
                display_item("Vetements", null);
                ?>
            </div>
        </section>
    </div>
</main>

<!-- import the footer template -->
<?php include("footerTemplate.php"); ?>
</body>
</html>