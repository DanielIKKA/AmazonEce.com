<?php
session_start();
include "headerTemplate.php";
displayHeader();
    ?>

<div class="Champs_communs">
    <form method="post" action="Item_Upload.php" enctype="multipart/form-data">
        A quelle catégorie appartient le produit que vous désirez vendre ?<br />
        <input type="radio" name="category" value="Livres" id="Livres" /> <label for="Livres">Livres</label><br />
        <input type="radio" name="category" value="Musique" id="Musique" /> <label for="Musique">Musique</label><br />
        <input type="radio" name="category" value="Vetements" id="Vetements" /> <label for="Vetements">Vetements</label><br />
        <input type="radio" name="category" value="Sports et Loisirs" id="Sports et Loisirs" /> <label for="Sports et Loisirs">Sports et Loisirs</label><br/>
        <label for="name">Nom du produit</label><input type="text" name="name" id="name"><br/>
        <label for="price">Prix</label><input type="text" name="price" id="price"><br/>
        <label for="description">Description</label><br /> <textarea name="description" id="description"></textarea><br/>
        Champs à renseigner uniquement si necessaire : <br/>
        <input type="radio" name="gender" value="Masculin" id="Masculin"/> <label for="Masculin">Masculin</label><br/>
        <input type="radio" name="gender" value="Feminin" id="Feminin"/> <label for="Feminin">Feminin</label><br/>
        <label for="size">Taille</label><input type="text" name="size" id="size"><br/>
        <label for="author">Auteur</label><input type="text" name="author" id="author"><br/>

        <p>Veuillez ajouter entre 1 et 3 photos du produit et éventuellement une video(inférieure à 50 Mo, Format .avi .mp4)</p>
        <input type="hidden" name="MAX_FILE_SIZE" value="50000000">
        Photo 1 : <input type="file" name="pic1">
        Photo 2 : <input type="file" name="pic2">
        Photo 3 : <input type="file" name="pic3">
        Video : <input type="file" name="pic4">
        <p><br/><input type="submit" value="Mettre mon objet en vente"/></p>
    </form>
</div>

<?php include "footerTemplate.php";?>
