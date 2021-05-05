<?php
//fetch.php
require_once "../database/UtilBD.php";
require_once "../models/professeur.php";
require_once "../models/examen_local_prof.php";
require_once "../models/examen.php";
require_once "../models/local.php";
require_once "../models/filliere.php";
require_once "../models/module.php";


$prof=new professeur();
$exam_local_prof=new exam_prof_local();
$exam=new examen();
$local=new local();
$filliere=new filliere();
$module=new module();

$output = '';
if(isset($_POST["query"]))
{
 $search = $_POST["query"];
 $result=$prof->getAllProfByNomOrPrenom($search);

}
else
{
  $result=$prof->getAllProf();
}
 $output .= '
 <div class="col-lg-12">
  <div class="table-responsive">
   <table class="table table bordered">
   <thead>
    <tr class="table-info">
      <th scope="col">Nom Prenom</th>
      <th scope="col">Heure</th>
      <th scope="col">Date de examen</th>
      <th scope="col">Local</th>
      <th scope="col">type</th>
      <th scope="col">semestre</th>
      <th scope="col">Annee</th>
      <th scope="col">Filliere</th>
      <th scope="col">Intitilé module</th>
    </tr>
    </thead>
 ';
while ($data=ObjetSuivant($result))
 {
 
  $result_exam_local_prof=$exam_local_prof->getExamProfLocalByIdResp($data->id);  
  while ($dataELP=ObjetSuivant($result_exam_local_prof))
  { 
     $output .= '
          <tr> 
            <td>'.$data->Nom." ".$data->Prenom.'
            </td>
            <td>'.$dataELP->heureD." ".$dataELP->heureF.'
            </td>
            <td>'.$dataELP->date_exam.'</td>
          ';
        $resultNomLocale=$local->getLocalByID($dataELP->id_local);
        while ($dataNomLocale=ObjetSuivant($resultNomLocale))
        {
          $output .= '
            <td>'.$dataNomLocale->Nom_local.'
            </td>
          ';     
        }
        $resultAllExamByID=$exam->getAllExamsByID($dataELP->id_exam);
        while ($dataExam=ObjetSuivant($resultAllExamByID))
        {
         $output .= '
            <td>'.$dataExam->type.'</td>
            <td>'.$dataExam->semestre.'</td>
            <td>'.$dataExam->annee.'</td>
            ';
            $rsltNomFil=$filliere->getFillByID($dataExam->id_Filliere);
            while ($dataFilliere=ObjetSuivant($rsltNomFil))
            {
             $output .= '
            <td>'.$dataFilliere->Nom_filliere.'</td>
            ';
            }
            $rsltNomMod=$module->getModuleByID($dataExam->id_Module);
            while ($dataModule=ObjetSuivant($rsltNomMod))
            {
             $output .= '
            <td>'.$dataModule->Nom_Module.'</td>
            </tr>
            </div>
            ';
            }
        }
  }
}
echo $output;
?>