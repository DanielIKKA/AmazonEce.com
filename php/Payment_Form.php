<?php session_start();
      include "headerTemplate.php";
      displayHeader();?>
<div class="payment">
    <form method="post" action="Pay_Order_Process.php">
        Informations personnelles de livraison<br/>
        <label for="surname">Nom </label><input type="text" name="surname" id="surname"><br/>
        <label for="firstname">Prenom </label><input type="text" name="firstname" id="firstname"><br/>
        <label for="adress">Adresse </label><input type="text" name="adress" id="adress"><br/>
        <label for="city">Ville </label><input type="text" name="city" id="city"><br/>
        <label for="postal_code">Code postal </label><input type="text" name="postal_code" id="postal_code"><br/>
        <?php include "Country_list.php";?>
        <label for="tel">Numero de telephone de contact</label><input type="text" name="tel" id="tel"><br/>
        Informations relatives au paiement<br/>
        <select name="type">
            <option value="Visa">Visa</option>
            <option value="MasterCard">MasterCard</option>
            <option value="AmericanExpress">AmericanExpress</option>
        </select>
        <label for="number">Numero de la carte </label><input type="text" name="number" id="number"><br/>
        <label for="name">Nom sur la carte </label><input type="text" name="name" id="name"><br/>
        <label for="expiracy_date">Date d'expiration </label><input type="date" name="expiracy_date" id="expiracy_date"><br/>
        <label for="security_code">Code de sécurité</label><input type="text" name="security_code" id="security_code"><br/><br/>
        <input type="submit" value="Passer la commande">
    </form>
</div>

