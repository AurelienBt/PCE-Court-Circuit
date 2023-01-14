<?php
require_once PATH_MODELS . 'Model.php';
require_once 'assets/fpdf/fpdf.php';

class Facture extends fpdf
{
    private $nom_facture;
    private $id_panier;
    private $commande;

    function __construct()
    {
        parent::__construct();
        if(isset($_SESSION['idPanier'])){
            $this->id_panier = $_SESSION['idPanier'];
        }/*else{
            throw new Exception("Erreur, pas de panier en cours");
        }*/
        $this->commande = new Panier();
        $this->nom_facture = "Facture";
    }

//reste a faire 
//nom générer correquement
//adresse
//
    public function generer_facture(){
        $date = date('Y-m-d');
        $nom_facture = "$date-WEB4SHOP$this->id_panier-Facture.pdf"; //nom de la facture
        
        //Pour le tableau
        $header = array("Nom du produit", "Quantité", "Prix unitaire", "Sous total");
        $taille = array(80, 30, 40, 40);
        $requete_commande = $this->commande->getPanier($this->id_panier)->fetchAll();
        $tab_commande = array();
        
        foreach ($requete_commande as $ligne){
            $tab = array($ligne['name'], $ligne['quantity'], $ligne['price'], $ligne['quantity']*$ligne['price']);
            array_push($tab_commande, $tab);
        }
        /*select P.cat_id, P.id, P.name, P.description, P.image, P.price, OI.quantity from orders O
            join orderitems OI on OI.order_id=O.id
            join products P on P.id=OI.product_id*/

        //Récupération de l'adresse        
        $delivery_id = $this->commande->get_delivery_id($this->id_panier);
        $adresse = $this->commande->get_adresse_commande($delivery_id['delivery_add_id']);
        $info_commande = array("Numéro de facture : ".$this->id_panier, "Date de la commande : ".$date);
        //Execution du script de création du PDF
        ob_start(); 
        $this->SetTitle("Facture");
        $this->AddPage();
        $this->SetFont('Helvetica','',1);
        $this->Ln();
        $this->ecritEnteteFacture($adresse, $info_commande);
        $this->SetY(110);
        $this->SetLeftMargin(10);
        $this->ImprovedTable($header, $taille, $tab_commande);
        $this->Output('D', $nom_facture, true);
        ob_end_flush();
    }

    //Fonction pour écrire l'adresse sur le PDF 
    //adresse : array(nom, prenom, adr, complement_adr, code postal , ville)
    function ecritEnteteFacture($adresse, $info_commande, $hauteur = 40){
        //On veut l'écrire en bleu clair 
        //firstname, lastname, add1, add2, city, postcode, phone, email
        $hauteur_ref = $hauteur;
        $this->SetFont('Helvetica','',12);
        $this->setTextColor(155,204,203);
        $this->SetLeftMargin(25);
        $this->SetY($hauteur);
        $hauteur += 5;
        $this->Cell(80, 0, $adresse['firstname']." ".$adresse['lastname'], 0, 1);
        $this->SetY($hauteur);
        $hauteur += 5;
        $this->Cell(80, 0, $adresse['add1'], 0,1);
        if($adresse['add2']!=""){
            $this->SetY($hauteur);
            $hauteur += 5;
            $this->Cell(80, 0, $adresse['add2'], 0,1);
        }
        $this->SetY($hauteur);
        $hauteur += 5;
        $this->Cell(80, 0, $adresse['postcode']." ".$adresse['city'], 0, 1);
        $this->SetY($hauteur);
        $hauteur += 5;
        $this->Cell(80, 0, "Téléphone : ".$adresse['phone'], 0, 1); 
        
        //Ecriture des infos de la commande
        $this->SetLeftMargin(110);
        $this->SetY($hauteur_ref);
        $this->Cell(80, 0, $info_commande[0], 0, 1);
        $this->SetY($hauteur_ref + 5);
        $this->Cell(80, 0, $info_commande[1], 0,1);

    }

    function Header(){
        // Logo
        $this->Image('assets/productimages/Web4ShopHeader.png',10,6,45);
        // Police Arial gras 15
        $this->SetFont('Helvetica','',24);
        $this->SetTextColor(120, 194, 193);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(30,10,$this->nom_facture, 0);
        // Saut de ligne
        $this->Ln(10);
        $this->SetDrawColor(120, 194, 193);
        $this->Line(30, 26, 180, 26);
        $this->Ln(20);
    }


    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,$this->PageNo(),0,0,'C');
    }

    // Tableau amélioré
    //Contrainte, size doit faire la même taille qu'header
    function ImprovedTable($header, $size, $data){
        // En-tête
        $this->SetFont('Helvetica','B',14);
        $this->SetTextColor(15,15,15);
        $this->SetFillColor(243, 150, 179);
        $this->SetX(10);
        for($i=0;$i<count($header);$i++){
            $this->Cell($size[$i],7,$header[$i],0,0,'',1);
        }
        $this->Ln();

        // Données
        $color = true;
        $this->SetFont('Helvetica','',14);
        foreach($data as $row)
        {
            if($color){
                $this->SetFillColor(252, 193, 56); //Jaune
            }
            else{
                $this->SetFillColor(120, 194, 193); //Bleu
            }
            $color = !$color;
            //$this->Cell("size", "hauteur", "contenu", "border", "ln", "align", "fill")
            $this->Cell($size[0],6,$row[0], 0, 0, '', 1);
            $this->Cell($size[1],6,$row[1], 0, 0, '', 1);
            $this->Cell($size[2],6,$row[2], 0, 0, '', 1);
            $this->Cell($size[3],6,$row[3], 0, 0, '', 1);
            $this->Ln();
        }
        //$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        // Trait de terminaison
        //$this->Cell(array_sum($size),0,'','T');
    }
    
    
    
    
}
