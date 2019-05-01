<?php
    session_start();
    include_once "Fonctions_panier.php";

    $erreur = false;

    if(isset($_GET['action']))
        $action = $_GET['action'];

    if(!in_array($action,array('add', 'delete', 'add_quantity','remove_quantity')))
        $erreur=true;

    if(isset($_GET['id']))
        $id = $_GET['id'];

    if(isset($_GET['price']))
        $price = $_GET['price'];

    if(isset($_GET['description']))
        $description = $_GET['description'];

    if(isset($_GET['photo']))
        $photo = $_GET['photo'];

    if(isset($_GET['name']))
        $name = $_GET['name'];


    if(!$erreur)
    {
        switch ($action)
        {
            Case "add" :
                add($id,$price,$photo,$description,$name);
                break;
            Case "delete" :
                delete($id);
                break;
            Case "add_quantity":
                add_quantity($id);
                break;
            Case "remove_quantity":
                remove_quantity($id);
                break;
        }
    }

    ?>

<table>
    <tr>
        <td>Votre panier</td>
    </tr>
    <tr>
        <th>Nom du produit</th>
        <th>Photo</th>
        <th>Description</th>
        <th>Quantité</th>
        <th>Prix Unitaire</th>
        <th>Action</th>
    </tr>

    <?php
    if(creation_panier())
    {
        $nbArticles=count($_SESSION['panier']['id']);
        if ($nbArticles <= 0)
            echo "<tr><td>Votre panier est vide </td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
                echo "<tr>";
                echo "<td>".$_SESSION['panier']['name'][$i]."</td>";
                echo "<td><img src=\"../Assets/BDD_Images/".$_SESSION['panier']['photo'][$i]."\"></td>";
                echo "<td>".$_SESSION['panier']['description'][$i]."</td>";
                echo "<td>".$_SESSION['panier']['quantity'][$i]."</td>";
                echo "<td>".$_SESSION['panier']['price'][$i]."</td>";
                echo "</tr>";
            }

            echo "<tr><td colspan=\"2\"> </td>";
            echo "<td colspan=\"2\">";
            echo "Total : ".total_price();
            echo "</td></tr>";
        }
    }
    ?>
</table>