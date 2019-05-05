<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Ajout d'un article </title>
    <?php include("headerTemplate.php"); ?>
    <link rel="stylesheet" type="text/css" href="../Css/InscriptionStylesheet.css">
</head>
<body>
<!-- import the header template -->
<?php displayHeader() ?>

<!-- main body home page -->
<main>
    <div class="main_wrapper">
        <h1 class="title"> Ajout d'un article </h1>
        <form method="post" action="Item_Upload.php" enctype="multipart/form-data">
            <section class="item_section_vertical">
                <h1 class="title_section">Champs obligatoires<span class="important_text">*</span> </h1>
                <div class="field_margin" id="category_selection">
                    <p>A quelle catégorie appartient le produit que vous désirez vendre ?</p>
                    <label for="Livres">Livres</label><input type="radio" name="category" value="Livres" id="Livres" />
                    <label for="Musique">Musique</label><input type="radio" name="category" value="Musique" id="Musique" />
                    <label for="Vetements">Vetements</label><input type="radio" name="category" value="Vetements" id="Vetements" />
                    <label for="Sports et Loisirs">Sports et Loisirs</label><input type="radio" name="category" value="Sports et Loisirs" id="Sports et Loisirs" />
                </div>
                <div class="field_margin" id="identity_group">
                    <input class="input_text" type="text" name="name" id="name" placeholder="nom du produit">
                    <input class="input_text" type="text" name="price" id="price" placeholder="Prix">
                </div>

                <textarea class="input_text field_margin" name="description" id="description" placeholder="Description"></textarea><br/>
            </section>

            <hr class="horizontal_separator_item">
            <section class="item_section_vertical">
                <h1 class="title_section">Champs à renseigner uniquement si necessaire :</h1>
                <div class="field_margin" id="category_selection">
                    <p>Si l'article est un vêtement</p>
                    <input type="radio" name="gender" value="Masculin" id="Masculin"/> <label for="Masculin">Masculin</label>
                    <input type="radio" name="gender" value="Feminin" id="Feminin"/> <label for="Feminin">Feminin</label>
                </div>

                <input class="input_text field_margin" type="text" name="size" id="size" placeholder="Taille">
                <input class="input_text field_margin" type="text" name="author" id="author" placeholder="Auteur">

                <p class="field_margin">Veuillez ajouter entre 1 et 3 photos du produit et éventuellement une video (inférieure à 50 Mo, Format .avi .mp4)</p>
                <input type="hidden" name="MAX_FILE_SIZE" value="50000000">
                <div class="field_margin" id="category_selection">
                    <p class="normal_text">Photo 1 :</p><input type="file" name="pic1">
                    <p class="normal_text">Photo 2 :</p> <input type="file" name="pic2">
                    <p class="normal_text">Photo 3 :</p> <input type="file" name="pic3">
                    <p class="normal_text">Video :</p> <input type="file" name="pic4">
                </div>
            </section>
            <p class="field_margin"><input class="input_btn blue" type="submit" value="Mettre mon objet en vente"/></p>

        </form>
    </div>
</main>

<!-- import the footer template -->
<?php include("footerTemplate.php"); ?>
</body>
</html>