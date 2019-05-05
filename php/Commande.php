<?php session_start();?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Votre commande</title>
        <?php include ("headerTemplate.php") ;
              include "Fonctions_Commande.php";
              include "FeatureTemplate.php"; ?>
    </head>
    <body>
    <!-- import the header template -->
<?php displayHeader();
if(isset($_GET['id']))
{
    $id=($_GET['id']);
}else
{
    $id = get_last_purchase();
}
?>

    <section class="item_section_vertical">
        <h1 class="title_section">Contact et livraison</h1>
        <?php display_infos($id)?>
    </section>
    <hr class="horizontal_separator_item"/>
    <section class="item_section_vertical">
        <?php echo "<h1 class=\"title_section\">Articles commandés</h1>";
        display_purchase_items($id);?>
    </section>
    <section class="item_section_vertical">
    <hr class="horizontal_separator_item"/>
    <form method="post" action="Envoi_mail.php">
        <input type="hidden" value="<?php $id ?>">
        <input class="input_btn blue" type="submit" value="Envoyer le récapitulatif par mail">
    </form>
    </section>

<?php include "footerTemplate.php";

