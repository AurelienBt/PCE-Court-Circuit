<?php $titre = "Home"; ?>

<?php ob_start(); ?>

<h4 class ="mb-2">Bienvenue sur notre plateforme Court Circuit !</h4>
<h5 class ="mb-2">Vous trouverez ici des produits bio, locaux, qui seront livrés chez vous à vélo.</h5>
<br>


<div id="Accueil" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#Accueil" data-bs-slide-to="5" aria-label="Slide 6"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="3000">
        <a href="index.php?action=legume">
            <img src="assets/otherimages/biscuits.png" class="d-block w-100" alt="Image de biscuits">
            <div class="carousel-caption d-none d-md-block">
                <h2>BISCUITS</h2>
                <p>Notre gamme biscuit.</p>
            </div>    
        </a>  
    </div>
    
    <div class="carousel-item" data-bs-interval="3000">
        <a href="index.php?action=fruit">
            <img src="assets/otherimages/boissons.png" class="d-block w-100" alt="Image de boissons">
            <div class="carousel-caption d-none d-md-block">
                <h2>BOISSONS</h2>
                <p>L'ensemble de nos boissons pour vous rafraichir.</p>
            </div>
        </a>
    </div>
    
    <div class="carousel-item" data-bs-interval="3000">
        <a href="index.php?action=fromage">
            <img src="assets/otherimages/fruits_sec.png" class="d-block w-100" alt="Image de fruits sec">
            <div class="carousel-caption d-none d-md-block">
                <h2>FRUITS SEC</h2>
                <p>Retrouvez toutes notre offres fruits sec pour vos en cas.</p>
            </div>
        </a>
    </div>

    <div class="carousel-item" data-bs-interval="3000">
        <a href="index.php?action=charcuterie">
            <img src="assets/otherimages/fruits_sec.png" class="d-block w-100" alt="Image de fruits sec">
            <div class="carousel-caption d-none d-md-block">
                <h2>FRUITS SEC</h2>
                <p>Retrouvez toutes notre offres fruits sec pour vos en cas.</p>
            </div>
        </a>
    </div>

    <div class="carousel-item" data-bs-interval="3000">
        <a href="index.php?action=epicerie">
            <img src="assets/otherimages/biscuits.png" class="d-block w-100" alt="Image de fruits sec">
            <div class="carousel-caption d-none d-md-block">
                <h2>FRUITS SEC</h2>
                <p>Retrouvez toutes notre offres fruits sec pour vos en cas.</p>
            </div>
        </a>
    </div>

    <div class="carousel-item" data-bs-interval="3000">
        <a href="index.php?action=boisson">
            <img src="assets/otherimages/boissons.png" class="d-block w-100" alt="Image de fruits sec">
            <div class="carousel-caption d-none d-md-block">
                <h2>FRUITS SEC</h2>
                <p>Retrouvez toutes notre offres fruits sec pour vos en cas.</p>
            </div>
        </a>
    </div>
  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#Accueil" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#Accueil" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<?php $contenu = ob_get_clean(); ?>