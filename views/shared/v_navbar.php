<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #BC6C25;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><img src="assets/otherimages/Logo.png" style="width: 100px; margin-right: 10px;" alt="Court Circuit" /></a>
      <a class="navbar-brand" href="index.php">Court Circuit</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php"> | </a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=legumes">Légumes</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=fruits">Fruits</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=fromages">Fromages</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=charcuteries">Charcuterie</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=epiceries">Épicerie</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?action=boissons">Boissons</a></li>
      </ul>

      <ul class="float-right navbar-nav ms-md-auto pull-right">
        <?php
        if (isset($_SESSION['id'])) {
          if (isset($_GET['action']) and $_GET['action'] == 'deconnexion') {
            echo "<li class=\"nav-item\"><a class=\"nav-link active pull-right\" href=\"index.php?action=connexion\">Connexion</a></li>";
          } else {
            echo "<li class=\"nav-item\"><a class=\"nav-link active pull-right\" href=\"index.php?action=moncompte\">Mon compte</a></li>";
            //echo "<li class=\"nav-item\"><a class=\"nav-link dropdown-toggle show\" data-bs-toggle=\"dropdown\" href=\"index.php?action=moncompte\"role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\">Mon compte</a></li>";
        }
        } else echo "<li class=\"nav-item\"><a class=\"nav-link active pull-right\" href=\"index.php?action=connexion\">Connexion</a></li>";
        ?>

        <li class="nav-item"><a class="nav-link active pull-right" href="index.php?action=panier"><!--<img src="assets/otherimages/panier.png" alt = "Panier">-->Panier</a></li>
      </ul>
    </div>
  </div>
</nav>