<?php $titre = "Compte"; ?>

<?php ob_start(); ?>

<h1>Votre espace compte <?php echo $pseudo; ?> </h1>

<p>
    Merci d'entrer votre identifiant et votre mot de passe pour acceder à votre espace client. Si vous n'avez pas
    de compte client vous pouvez en créér un gratuitement ici : <a href="index.php?action=enregistrement"><b>Enregistrement</b></a>.
</p>

<form action="index.php?action=connexion" method="post">
    <label for="Username">Username</label>
    <input type="text" id="Username" name="Username">

    <label for="Password">Password</label>
    <input type="password" id="Password" name="Password">

    <input type="submit" name="connexion" id="connexion" value="Connexion">
</form>
<?php 
//Lorsque le formulaire est soumis
//Structure de base : IL FAUT ENCORE AJOUTER LES VERIFICATION AVEC la BDD
if (isset($_POST['connexion'])){
    $connection = new Connexion();
    $connection->verifieConnexion();
} 

?>
<?php $contenu = ob_get_clean(); ?>