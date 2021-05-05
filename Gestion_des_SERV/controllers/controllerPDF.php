<?php

require_once "../database/UtilBD.php";
require_once ("../app/classes/classPDF.php");
require_once ("../database/fonctions.php");
if (isset($_POST['butGenerer']))
{
 $_SESSION['exam_fil'] = $_POST;
 $array = datas1();

$pdf=new PDF2();

$filliere=new filliere();
        $resultFilliere=$filliere->getFillByID($_POST["nom_fillire"]);
        while ($dataidFilliere=ObjetSuivant($resultFilliere))
        {
          $nom_filiere= $dataidFilliere->Nom_filliere;
        }

$pdf->AddPage();
//on doit specifier si c'est le 1er ds ou le 2eme; et specifier le niveau
$pdf->Title($array[0]['type'],$nom_filiere);
$pdf->headerTable();
foreach ($array as $one ) {
    $jour = $pdf->RowColor($one['date']);
    $pdf->Rows($one,$jour);
}

$pdf->Output();



   
}
elseif (isset($_POST['butGenererE']))
{
$_SESSION['ecole'] = $_POST;

$array = datas();

$pdf=new PDF();

$pdf->AddPage();
//on doit specifier si c'est le 1er ds ou le 2eme; et specifier le niveau
$pdf->Title($array[0]['type'], $_POST['annee']);
$pdf->headerTable();
foreach ($array as $one ) {
    $jour = $pdf->RowColor($one['date']);
    $pdf->Rows($one,$jour);
}

$pdf->Output();



   
}




?>