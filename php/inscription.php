<div class="inscription">
    <form method="post" action="traitement_inscription.php">
        Désirez vous créer un compte vendeur ou acheteur<br />
        <input type="radio" name="type" value="seller" id="seller" /> <label for="seller">Vendeur</label><br />
        <input type="radio" name="type" value="buyer" id="buyer" /> <label for="buyer">Acheteur</label><br />
        <label for="surname">Votre nom </label><input type="text" name="surname" id="surname"><br/>
        <label for="firstname">Votre prenom </label><input type="text" name="firstname" id="firstname"><br/>
        <label for="adress">Votre adresse </label><input type="text" name="adress" id="adress"><br/>
        <label for="email">Votre adresse mail </label><input type="email" name="email" id="email"><br/>
        <label for="password">Votre mot de passe </label><input type="password" name="password" id="password"><br/>
        <label for="password_confirm">Confirmez le mot de passe </label><input type="password" name="password_confirm" id="password_confirm"><br/>
        <p><br/><input type="submit" value="S'inscrire"/></p>
    </form>
</div>
