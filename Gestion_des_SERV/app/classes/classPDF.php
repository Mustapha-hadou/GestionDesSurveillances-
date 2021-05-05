<?php
require('../views/fpdf182/fpdf.php');
require_once('../database/fonctions.php');
$array = datas();
class PDF extends FPDF
{
    function __construct(){
        parent::__construct('L'); 
    }
function Title($numds, $annee)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    $this->SetTextColor(255,255,255);
    // Background color
    $this->SetFillColor(15,36,62);
    // Title
    $this->Cell(0,6,"Calendrier des Surveillances des ".utf8_decode($numds)." de $annee",0,1,'C',true);
    // Line break
    $this->Ln(4);
}
function headerTable()
{
    $this->SetFont('Arial','',10);
    $this->SetTextColor(255,255,255);
    // Background color
    $this->SetFillColor(150,54,52);
    $this->SetLineWidth(1);
    $this->SetDrawColor(255,255,255);
    $this->Cell(40,6,utf8_decode("Filière"),1,0,'C',true);
    $this->Cell(40,6,utf8_decode("Responsable"),1,0,'C',true);
    $this->Cell(50,6,utf8_decode("Intitulé du module"),1,0,'C',true);
    $this->Cell(40,6,"Date de l'examen",1,0,'C',true);
    $this->Cell(30,6,"Heure",1,0,'C',true);
    $this->Cell(20,6,"Local",1,0,'C',true);
    $this->Cell(60,6,"Surveillant",1,0,'C',true);
    $this->Ln();
}
function RowColor($date)
{
    //Convert the date string into a unix timestamp.
    $unixTimestamp = strtotime($date);

    //Get the day of the week using PHP's date function.
    $jour = date("l", $unixTimestamp);
    switch ($jour) {
        case 'Monday':
            $this->SetFillColor(226,232,245);
            return "Lundi";
        
        case 'Tuesday':
            $this->SetFillColor(245,226,241);
            return "Mardi";
        
        case 'Wednesday':
            $this->SetFillColor(226,245,227);
            return "Mercredi";
        
        case 'Thursday':
            $this->SetFillColor(245,231,226);
            return "Jeudi";
        
        case 'Friday':
            $this->SetFillColor(232,226,245);
            return "Vendredi";
        
        case 'Saturday':
            $this->SetFillColor(221,219,222);
            return "Samedi";
        
        case 'Sunday':
            $this->SetFillColor(222,247,246);
            return "Dimanche";
        
    }
}
function Rows($array,$jour)
{
    $n = 6*count($array['local']);
    $this->SetFont('Arial','',10);
    $this->SetTextColor(0,0,0);
    $this->SetLineWidth(1);
    $this->Cell(40,$n,utf8_decode($array['filiere']),1,0,'C',true);
    $this->Cell(40,$n,$array['responsable'],1,0,'C',true);
    $this->Cell(50,$n,utf8_decode($array['module']),1,0,'C',true);
    $this->Cell(40,$n,$jour." ".$array['date'],1,0,'C',true);
    $this->Cell(30,$n,$array['heure_debut']."-".$array['heure_fin'],1,0,'C',true);
    $x = $this->GetX();
    foreach ($array['local'] as $key => $value) {
        $this->SetX($x);
        $this->Cell(20,6,$array['local'][$key],1,0,'C',true);
        $this->Cell(60,6,$array['surveillant'][$key],1,1,'C',true);
    
    }
        
    $this->Ln(0);
}


}

class PDF2 extends FPDF
{
    function __construct(){
        parent::__construct('L'); 
    }
function Title($numds, $niveau)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    $this->SetTextColor(255,255,255);
    // Background color
    $this->SetFillColor(15,36,62);
    // Title
    $this->Cell(0,6,"Calendrier des Surveillances des ".utf8_decode($numds)." de genie $niveau",0,1,'C',true);
    // Line break
    $this->Ln(4);
}
function headerTable()
{
    $this->SetFont('Arial','',10);
    $this->SetTextColor(255,255,255);
    // Background color
    $this->SetFillColor(150,54,52);
    $this->SetLineWidth(1);
    $this->SetDrawColor(255,255,255);
   
    $this->Cell(48,6,utf8_decode("Responsable"),1,0,'C',true);
    $this->Cell(60,6,utf8_decode("Intitulé du module"),1,0,'C',true);
    $this->Cell(50,6,"Date de l'examen",1,0,'C',true);
    $this->Cell(40,6,"Heure",1,0,'C',true);
    $this->Cell(20,6,"Local",1,0,'C',true);
    $this->Cell(60,6,"Surveillant",1,0,'C',true);
    $this->Ln();
}
function RowColor($date)
{
    //Convert the date string into a unix timestamp.
    $unixTimestamp = strtotime($date);

    //Get the day of the week using PHP's date function.
    $jour = date("l", $unixTimestamp);
    switch ($jour) {
        case 'Monday':
            $this->SetFillColor(226,232,245);
            return "Lundi";
        
        case 'Tuesday':
            $this->SetFillColor(245,226,241);
            return "Mardi";
        
        case 'Wednesday':
            $this->SetFillColor(226,245,227);
            return "Mercredi";
        
        case 'Thursday':
            $this->SetFillColor(245,231,226);
            return "Jeudi";
        
        case 'Friday':
            $this->SetFillColor(232,226,245);
            return "Vendredi";
        
        case 'Saturday':
            $this->SetFillColor(221,219,222);
            return "Samedi";
        
        case 'Sunday':
            $this->SetFillColor(222,247,246);
            return "Dimanche";
        
    }
}
function Rows($array,$jour)
{
    $n = 6*count($array['local']);
    $this->SetFont('Arial','',10);
    $this->SetTextColor(0,0,0);
    $this->SetLineWidth(1);
    $this->Cell(48,$n,$array['responsable'],1,0,'C',true);
    $this->Cell(60,$n,utf8_decode($array['module']),1,0,'C',true);
    $this->Cell(50,$n,$jour." ".$array['date'],1,0,'C',true);
    $this->Cell(40,$n,$array['heure_debut']."-".$array['heure_fin'],1,0,'C',true);
    $x = $this->GetX();
    foreach ($array['local'] as $key => $value) {
        $this->SetX($x);
        $this->Cell(20,6,$array['local'][$key],1,0,'C',true);
        $this->Cell(60,6,$array['surveillant'][$key],1,1,'C',true);
    
    }
        
    $this->Ln(0);
}


}

?>