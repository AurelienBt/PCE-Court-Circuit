<?php
require_once PATH_CONTROLLERS . 'home.php';
require_once PATH_CONTROLLERS . 'produit.php';
require_once PATH_CONTROLLERS . 'connexion.php';
require_once PATH_CONTROLLERS . 'panier.php';
require_once PATH_CONTROLLERS . 'caisse.php';

require_once PATH_VIEWS . 'View.php';


class Routeur
{
    private $c_home;
    private $c_produit;
    private $c_connexion;
    private $c_panier;
    private $c_caisse;

    public function __construct()
    {
        $this->c_home = new C_Home();
        $this->c_produit = new C_Produit();
        $this->c_connexion = new C_Connexion();
        $this->c_panier = new C_Panier();
        $this->c_caisse = new C_Caisse();
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre '$nom' absent");
        }
    }


    // Traite une requête entrante 
    public function routerRequete()
    {
        //try {
        if (isset($_GET['action'])) {
            //Page des boissons
            if ($_GET['action'] == 'boissons') {
                $this->c_produit->produits(1);
            } else if ($_GET['action'] == 'boisson') {
                $idBoisson = intval($this->getParametre($_GET, 'id'));
                if ($idBoisson != 0) {
                    $this->c_produit->produit(1, $idBoisson);
                } else throw new Exception("Identifiant de boisson non valide");
            }
            //Page des biscuits
            else if ($_GET['action'] == 'biscuits') {
                $this->c_produit->produits(2);
            } else if ($_GET['action'] == 'biscuit') {
                $idBiscuit = intval($this->getParametre($_GET, 'id'));
                if ($idBiscuit != 0) {
                    $this->c_produit->produit(2, $idBiscuit);
                } else throw new Exception("Identifiant de boisson non valide");
            }
            //Page des fruits secs
            else if ($_GET['action'] == 'fruitsSecs') {
                $this->c_produit->produits(3);
            } else if ($_GET['action'] == 'fruitSec') {
                $idFruitSec = intval($this->getParametre($_GET, 'id'));
                if ($idFruitSec != 0) {
                    $this->c_produit->produit(3, $idFruitSec);
                } else throw new Exception("Identifiant de boisson non valide");
            }
            //Page de connexion
            else if ($_GET['action'] == 'connexion') {
                $this->c_connexion->connexion();
            } else if ($_GET['action'] == 'enregistrement') {
                $this->c_connexion->enregistrement();
            }
            //Panier
            else if ($_GET['action'] == 'panier') {
                $this->c_panier->panier();
            } else if ($_GET['action'] == 'supprimer') {
                $this->c_panier->supprimer($this->getParametre($_GET, 'id'));
            } else if ($_GET['action'] == 'ajouter') {
                $this->c_panier->ajouter($this->getParametre($_GET, 'id'), $this->getParametre($_POST, 'Quantite'));
            }
            //Caisse
            else if ($_GET['action'] == 'choisirAdresse') {
                $this->c_caisse->choisirAdresse();
            } else if ($_GET['action'] == 'choisirPaiement') {
                $this->c_caisse->choisirPaiement();
            } else if ($_GET['action'] == 'paiementCheque') {
                $this->c_caisse->paiementCheque();
            }
            //Action invalide
            else {
                throw new Exception("Action non valide");
                echo $_GET['action'];
            }
        } else { // aucune action définie : affichage de l'accueil
            $this->c_home->home();
        }
        /*} catch (Exception $e) {
            echo "je suis dans l'erreur";
            echo "******************" . $_GET['action'] . "********************";
            $this->erreur($e->getMessage());
        }*/
    }





    // Affiche une erreur 
    private function erreur($msgErreur)
    {
        $vue = new View("404");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}
