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

    public function __construct() //Mettre tout a null sauf si on l'appelle ? (QUESTION)
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
        try {
        if (isset($_GET['action'])) {
            //Page des légumes
            if ($_GET['action'] == 'legumes') {
                $this->c_produit->produits(2);
            } else if ($_GET['action'] == 'legume') {
                $idLegume = intval($this->getParametre($_GET, 'id'));
                if ($idLegume != 0) {
                    $this->c_produit->produit(2, $idLegume);
                } else throw new Exception("Identifiant de légume non valide");
            }
            //Page des fruits
            else if ($_GET['action'] == 'fruits') {
                $this->c_produit->produits(1);
            } else if ($_GET['action'] == 'fruit') {
                $idFruit = intval($this->getParametre($_GET, 'id'));
                if ($idFruit != 0) {
                    $this->c_produit->produit(1, $idFruit);
                } else throw new Exception("Identifiant de fruit non valide");
            }
            //Page des fromages
            else if ($_GET['action'] == 'fromages') {
                $this->c_produit->produits(3);
            } else if ($_GET['action'] == 'fromage') {
                $idFromage = intval($this->getParametre($_GET, 'id'));
                if ($idFromage != 0) {
                    $this->c_produit->produit(3, $idFromage);
                } else throw new Exception("Identifiant de fromage non valide");
            }

            //Page des charcuteries
            else if ($_GET['action'] == 'charcuteries') {
                $this->c_produit->produits(4);
            } else if ($_GET['action'] == 'charcuterie') {
                $idCharcuterie = intval($this->getParametre($_GET, 'id'));
                if ($idCharcuterie != 0) {
                    $this->c_produit->produit(4, $idCharcuterie);
                } else throw new Exception("Identifiant de charcuterie non valide");
            }

            //Page des épicerie
            else if ($_GET['action'] == 'epiceries') {
                $this->c_produit->produits(5);
            } else if ($_GET['action'] == 'epicerie') {
                $idEpicerie = intval($this->getParametre($_GET, 'id'));
                if ($idEpicerie != 0) {
                    $this->c_produit->produit(5, $idEpicerie);
                } else throw new Exception("Identifiant de épicerie non valide");
            }

            //Page des boissons
            else if ($_GET['action'] == 'boissons') {
                $this->c_produit->produits(6);
            } else if ($_GET['action'] == 'boisson') {
                $idBoisson = intval($this->getParametre($_GET, 'id'));
                if ($idBoisson != 0) {
                    $this->c_produit->produit(6, $idBoisson);
                } else throw new Exception("Identifiant de boisson non valide");
            }

            //Page de connexion
            else if ($_GET['action'] == 'connexion') {
                $this->c_connexion->connexion();
            } else if ($_GET['action'] == 'enregistrement') {
                $this->c_connexion->enregistrement();
            } else if ($_GET['action'] == 'moncompte') {
                $this->c_connexion->compte();
            } else if ($_GET['action'] == 'deconnexion') {
                $this->c_connexion->deconnexion();
            }

            //Admin
            else if ($_GET['action'] == 'verifierCommande') {
                $this->c_connexion->verifierCommande($this->getParametre($_GET, 'id'));
            } else if ($_GET['action'] == 'confirmerCommande') {
                $this->c_connexion->confirmerCommande($this->getParametre($_GET, 'id'));
            } else if ($_GET['action'] == 'refuserCommande') {
                $this->c_connexion->refuserCommande($this->getParametre($_GET, 'id'));
            } else if ($_GET['action'] == 'listeCommandes') {
                $this->c_connexion->listeCommandes();
            } else if ($_GET['action'] == 'gererStock') {
                $this->c_connexion->gererStock();
            } else if ($_GET['action'] == 'changerQuantiteStock') {
                $this->c_connexion->changerQuantiteStock($this->getParametre($_GET, 'id'), $this->getParametre($_POST, 'Quantite'));
            } else if ($_GET['action'] == 'changerPrixStock') {
                $this->c_connexion->changerPrixStock($this->getParametre($_GET, 'id'), $this->getParametre($_POST, 'Prix'));
            } else if ($_GET['action'] == 'nettoyerBDD') {
                $this->c_connexion->nettoyerBDD();
            }

            //Panier
            else if ($_GET['action'] == 'panier') {
                $this->c_panier->panier();
            } else if ($_GET['action'] == 'ajouter') {
                $this->c_panier->ajouterProduit($this->getParametre($_GET, 'id'), $this->getParametre($_POST, 'Nombre'));
            } else if ($_GET['action'] == 'supprimer') {
                $this->c_panier->supprimer($this->getParametre($_GET, 'id'));
            } else if ($_GET['action'] == 'changer') {
                $this->c_panier->changerQuantite($this->getParametre($_GET, 'id'), $this->getParametre($_POST, 'Quantite'));
            }
            //Caisse
            else if ($_GET['action'] == 'choisirAdresse') {
                $this->c_caisse->choisirAdresse();
            } else if ($_GET['action'] == 'AncienneAdresse') {
                $this->c_caisse->choisirPaiementAdresseCompte();
            } else if ($_GET['action'] == 'NvAdresse') {
                $this->c_caisse->choisirPaiementNvAdresse($this->getParametre($_POST, 'Prenom'), $this->getParametre($_POST, 'Nom'), $this->getParametre($_POST, 'Rue'), $this->getParametre($_POST, 'C_Rue'), $this->getParametre($_POST, 'Ville'), $this->getParametre($_POST, 'Postal'), $this->getParametre($_POST, 'Telephone'), $this->getParametre($_POST, 'Mail'));
            } else if ($_GET['action'] == 'paiementCheque') {
                $this->c_caisse->paiementCheque();
            } else if ($_GET['action'] == 'paiementPaypal') {
                $this->c_caisse->paiementPaypal();
            } else if ($_GET['action'] == 'factureCheque') {
                $this->c_caisse->factureCheque();
            }
            //Action invalide
            else {
                throw new Exception("Action non valide");
                echo $_GET['action'];
            }
        } else { // aucune action définie : affichage de l'accueil
            $this->c_home->home();
        }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }





    // Affiche une erreur 
    private function erreur($msgErreur)
    {
        $vue = new View("404");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}
