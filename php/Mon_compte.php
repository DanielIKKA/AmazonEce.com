<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> ECEamazon.com </title>
    <?php include ("headerTemplate.php");
          include "FeatureTemplate.php"; ?>
    <link rel="stylesheet" type="text/css" href="../Css/Mon_compte.css">
</head>
<body>
    <!-- import the header template -->
    <?php displayHeader();?>
    <!-- main body home page -->
    <main>
        <div class="main_wrapper">
            <div class="title_page">
                <svg class="svg_title" width="601px" height="64px" viewBox="0 0 601 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                    <title>Title</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Title" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(8.000000, 0.000000)">
                            <text id="Mon-Compte-(acheteur" font-family="HelveticaNeue-Light, Helvetica Neue" font-size="50" font-weight="300" fill="#505050">
                                <tspan x="91" y="48">Mon Compte (</tspan>
                                <tspan x="400.65" y="48" font-family="HelveticaNeue-UltraLightItalic, Helvetica Neue" font-style="italic" font-weight="200">acheteur</tspan>
                                <tspan x="574.7" y="48">)</tspan>
                            </text>
                            <path d="M105.5,61 L362.824791,61" id="Line" stroke="#505050" stroke-linecap="square"></path>
                            <g id="user_icon" transform="translate(0.000000, 3.000000)" fill="#000000" fill-rule="nonzero">
                                <path d="M61,30.5 C61,13.6828545 47.3171455,0 30.5,0 C13.6828545,0 0,13.6828545 0,30.5 C0,39.3827091 3.81970909,47.3892364 9.89974545,52.9679636 L9.87090909,52.9934727 L10.8602182,53.8275091 C10.9245455,53.8818545 10.9944182,53.9262182 11.0587455,53.9794545 C11.5844545,54.4153273 12.1290182,54.8290182 12.6835636,55.2294 C12.8632364,55.3591636 13.0429091,55.4889273 13.2259091,55.6153636 C13.8181636,56.0235091 14.4259455,56.4105818 15.0470364,56.7776909 C15.1823455,56.8575455 15.3187636,56.9351818 15.4551818,57.0128182 C16.1350545,57.3998909 16.8293455,57.7647818 17.5402727,58.0997273 C17.5924,58.1241273 17.6456364,58.1463091 17.6977636,58.1707091 C20.0146545,59.2476364 22.4879273,60.0384182 25.0743273,60.5053455 C25.1419818,60.5175455 25.2096364,60.5297455 25.2784,60.5419455 C26.0813818,60.6805818 26.8932364,60.7914909 27.7150727,60.8658 C27.8148909,60.8746727 27.9147091,60.8802182 28.0156364,60.8890909 C28.8341455,60.9567455 29.6615273,61 30.5,61 C31.3307091,61 32.1503273,60.9567455 32.9644,60.8913091 C33.0675455,60.8824364 33.1706909,60.8768909 33.2738364,60.8680182 C34.0890182,60.7937091 34.8942182,60.6861273 35.6894364,60.5497091 C35.7582,60.5375091 35.8280727,60.5253091 35.8968364,60.512 C38.4444182,60.0550545 40.8822,59.2820182 43.1691455,58.2328182 C43.2534364,58.194 43.3388364,58.1574 43.4231273,58.1174727 C44.1074364,57.7958364 44.7762182,57.4486909 45.4316909,57.0793636 C45.5947273,56.9873091 45.7566545,56.8941455 45.9185818,56.7987636 C46.5152727,56.4471818 47.1019818,56.0800727 47.6720545,55.6896727 C47.8772364,55.5499273 48.0779818,55.4024182 48.2809455,55.2560182 C48.7678364,54.9055455 49.2458545,54.5439818 49.7105636,54.1657818 C49.8137091,54.0826 49.9246182,54.0105091 50.0255455,53.9251091 L51.0403636,53.0777636 L51.0104182,53.0522545 C57.1436909,47.4713091 61,39.4281818 61,30.5 Z M2.21818182,30.5 C2.21818182,14.9050727 14.9050727,2.21818182 30.5,2.21818182 C46.0949273,2.21818182 58.7818182,14.9050727 58.7818182,30.5 C58.7818182,38.9035818 55.0940909,46.4587091 49.2558364,51.6426 C48.9297636,51.4174545 48.6014727,51.2156 48.2654182,51.0470182 L38.8747455,46.3522364 C38.0318364,45.9307818 37.5083455,45.0834364 37.5083455,44.1418182 L37.5083455,40.8622364 C37.7257273,40.5938364 37.9553091,40.2899455 38.1926545,39.9561091 C39.4082182,38.2392364 40.3831091,36.3293818 41.0940364,34.2742364 C42.4992545,33.6065636 43.4064909,32.2068909 43.4064909,30.6264364 L43.4064909,26.6947091 C43.4064909,25.7331273 43.0538,24.8003818 42.4227273,24.0672727 L42.4227273,18.8911455 C42.4804,18.3155273 42.6844727,15.067 40.3343091,12.3874364 C38.2902545,10.0539091 34.9818364,8.87272727 30.5,8.87272727 C26.0181636,8.87272727 22.7097455,10.0539091 20.6656909,12.3863273 C18.3155273,15.0658909 18.5196,18.3144182 18.5772727,18.8900364 L18.5772727,24.0661636 C17.9473091,24.7992727 17.5935091,25.7320182 17.5935091,26.6936 L17.5935091,30.6253273 C17.5935091,31.8464364 18.1414,32.9854727 19.0796909,33.7540727 C19.9780545,37.2732182 21.8269091,39.9372545 22.5101091,40.8400545 L22.5101091,44.0497636 C22.5101091,44.9547818 22.0165636,45.7866 21.2213455,46.2213636 L12.4517636,51.0048727 C12.1722727,51.1568182 11.895,51.3342727 11.6177273,51.5328 C5.85156364,46.3511273 2.21818182,38.8425818 2.21818182,30.5 Z M47.0908909,53.3827636 C46.7027091,53.6644727 46.3078727,53.9373091 45.9074909,54.1979455 C45.7233818,54.3177273 45.5403818,54.4375091 45.3529455,54.5539636 C44.8294545,54.8778182 44.2970909,55.1861455 43.7536364,55.4745091 C43.6338545,55.5377273 43.5129636,55.5976182 43.3920727,55.6597273 C42.1432364,56.2996727 40.8511455,56.8497818 39.5235636,57.2967455 C39.4769818,57.3122727 39.4304,57.3289091 39.3827091,57.3444364 C38.6873091,57.5751273 37.9830364,57.7803091 37.271,57.9566545 C37.2687818,57.9566545 37.2665636,57.9577636 37.2643455,57.9577636 C36.5456545,58.1352182 35.8180909,58.2827273 35.0860909,58.4036182 C35.0661273,58.4069455 35.0461636,58.4113818 35.0262,58.4147091 C34.3374545,58.5267273 33.6431636,58.6076909 32.9466545,58.6686909 C32.8235455,58.6797818 32.7004364,58.6875455 32.5762182,58.6964182 C31.8874727,58.7485455 31.1954,58.7818182 30.5,58.7818182 C29.7968364,58.7818182 29.0958909,58.7474364 28.3982727,58.6953091 C28.2773818,58.6864364 28.1564909,58.6786727 28.0367091,58.6675818 C27.3335455,58.6054727 26.6337091,58.5222909 25.9405273,58.4091636 C25.9094727,58.4036182 25.8784182,58.3980727 25.8473636,58.3925273 C24.3811455,58.1474182 22.9382182,57.7869636 21.533,57.3156 C21.4897455,57.3011818 21.4453818,57.2856545 21.4021273,57.2712364 C20.7045091,57.0338909 20.0146545,56.7710364 19.337,56.4804545 C19.3325636,56.4782364 19.3270182,56.4760182 19.3225818,56.4738 C18.6815273,56.1976364 18.0526727,55.8915273 17.4315818,55.5687818 C17.3506182,55.5266364 17.2685455,55.4867091 17.1886909,55.4434545 C16.6219455,55.1406727 16.0674,54.8134909 15.5206182,54.4718909 C15.3586909,54.3698545 15.1978727,54.2667091 15.0381636,54.1624545 C14.5346364,53.8330545 14.0377636,53.4903455 13.5542,53.1276727 C13.5042909,53.0899636 13.4566,53.0500364 13.4066909,53.0123273 C13.4421818,52.9923636 13.4776727,52.9724 13.5131636,52.9524364 L22.2827455,48.1689273 C23.7911091,47.3459818 24.7282909,45.7677455 24.7282909,44.0497636 L24.7271818,40.0548182 L24.4720909,39.7464909 C24.4476909,39.7187636 22.0498364,36.8018545 21.1437091,32.8523818 L21.0427818,32.4131818 L20.6645818,32.1680727 C20.1311091,31.8231455 19.8116909,31.2464182 19.8116909,30.6242182 L19.8116909,26.6924909 C19.8116909,26.1767636 20.0301818,25.6965273 20.4294545,25.3360727 L20.7954545,25.0055636 L20.7954545,18.8279273 L20.7854727,18.6826364 C20.7821455,18.6560182 20.4549636,15.9886545 22.3337636,13.847 C23.9375091,12.0192182 26.6858364,11.0909091 30.5,11.0909091 C34.2997455,11.0909091 37.0392,12.0114545 38.6473818,13.8259273 C40.5239636,15.9454 40.2167455,18.6626727 40.2145273,18.6848545 L40.2045455,25.0077818 L40.5705455,25.3382909 C40.9687091,25.6976364 41.1883091,26.1789818 41.1883091,26.6947091 L41.1883091,30.6264364 C41.1883091,31.4172182 40.6504,32.1348 39.8784727,32.3732545 L39.3272545,32.5429455 L39.1498,33.0919455 C38.4954364,35.1249091 37.5638,37.0026 36.3815091,38.6728909 C36.0909273,39.0832545 35.8081091,39.4470364 35.5652182,39.7254182 L35.2901636,40.0392909 L35.2901636,44.1418182 C35.2901636,45.9296727 36.2839091,47.5378545 37.8832182,48.3364 L47.2738909,53.0311818 C47.3337818,53.0611273 47.3925636,53.0921818 47.4513455,53.1232364 C47.3326727,53.2130727 47.2106727,53.2962545 47.0908909,53.3827636 Z" id="Shape"></path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>

            <?php
            $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
            $database = "amazonece";
            $db_found = mysqli_select_db( $db_handle, $database );

            $adress_set = false;
            $bank_set = false;

            if($db_found)
            {
                $SQL = "SELECT * FROM user WHERE user.email=\"" . $_SESSION['user']['email'] ."\"";
                $result = mysqli_query($db_handle, $SQL);

                while ($db_field = mysqli_fetch_assoc($result)) {
                    $firstname = $db_field['firstname'];
                    $surname = $db_field['surname'];
                    $photo = $db_field['photo'];
                    $password = $db_field['password'];
                    $adress_id = $db_field['adress_id'];
                    $card_number = $db_field['card_number'];
                }

                $SQL = "SELECT * FROM adress WHERE adress.id=\"" . $adress_id ."\"";
                $result = mysqli_query($db_handle, $SQL);

                while ($db_field = mysqli_fetch_assoc($result)) {
                    $adress_set = true;
                    $street = $db_field['street'];
                    $city = $db_field['city'];
                    $country = $db_field['country'];
                    $postal_code = $db_field['postal_code'];
                }

                $SQL = "SELECT * FROM payment_info WHERE payment_info.number=\"" . $card_number ."\"";
                $result = mysqli_query($db_handle, $SQL);

                while ($db_field = mysqli_fetch_assoc($result)) {
                    $bank_set = true;
                    $card_type = $db_field['type'];
                    $name_on_card = $db_field['name'];
                    $expiracy_date = $db_field['expiracy_date'];
                    $security_code = $db_field['security_code'];
                }
            }

            $card_number_discret = substr($card_number, 0, -12);
            $card_number_discret = $card_number_discret . " **** **** ****";
            $email_user = $_SESSION['user']['email']; ?>

            <section class="item_section_vertical">
                <h1 class="title_section">Gestion du compte</h1>
                <?php
                //Informations communes à tous les types de profils
                echo"
                    <div id='section_wrapper'>
                        <img class='cover' src='../Assets/Users_photo/$photo'>
                        <div id='infos_1'>
                            <p class='bold_text'>Nom: <span class='normal_text'>$surname</span></p>
                            <p class='bold_text'>Prénom: <span class='normal_text'>$firstname</span></p>
                            <p class='bold_text'>E-mail: <span class='normal_text'>$email_user</span></p>
                        </div>
                    </div>";

                if($adress_set) {
                    echo "Adresse : ". $street . " " . $city . " " . $postal_code . " " . $country;
                } else{
                    //fonction pour ajouter une adresse
                }

                if($bank_set) {
                    echo "Informations bancaires : <br/>";
                    echo "Numéro de carte : " . $card_number_discret;
                    echo "<br/>Type :".$card_type;
                    echo "<br/>Nom sur la carte :".$name_on_card;
                    echo "<br/>Date d'expiration :".$expiracy_date;
                    echo "<br/>Code de sécurité :".$security_code;
                } else{
                    //fonction pour ajouter des infos
                }
                echo "<form method='post' action=''><input type='submit' value='Modifier'></form>"; ?>
            </section>

            <?php
            function display_purchase() {
                echo "<hr class=\"horizontal_separator_item\"/>";
                echo "<section class=item_section_vertical>";
                echo "<h1 class='title_section'>Mes commandes</h1>";
                $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS );
                $database = "amazonece";
                $db_found = mysqli_select_db( $db_handle, $database );

                if($db_found) {
                    $SQL ="SELECT * FROM purchase WHERE purchase.buyer_email=\"".$_SESSION['user']['email']."\"";
                    $result = mysqli_query($db_handle,$SQL);
                    while($db_field = mysqli_fetch_assoc($result)) {
                        //fonction d'affichage de commande
                    }
                }
                echo "</section>";
            }

            function display_seller()
            {

            }


            function display_admin() {

                display_purchase();
                echo "<hr class=\"horizontal_separator_item\"/>";
                echo "<section class=item_section_vertical>";
                echo "<h1 class='title_section'>Administrateur</h1>";
                echo "<form method='post' action='Display_all_items.php'><input type='submit' value='Gestion des articles'></form>";
                echo "<form method='post' action='Display_all_users.php'><input type='submit' value='Gestion des utilisateurs'></form>";
                echo "</section>";
            }


            if(isset($_SESSION['user']['type'])) {
                switch ($_SESSION['user']['type']) {
                    Case "admin":
                        display_admin();
                        break;
                    Case "seller":
                        display_seller();
                        break;
                }
            } ?>
        </div>
    </main>

    <!-- import the footer template -->
    <?php include "footerTemplate.php"; ?>
</body>
</html>


