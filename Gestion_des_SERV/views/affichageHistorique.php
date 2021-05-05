<?php
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 

require_once "../database/UtilBD.php";
require_once "../models/examen.php";
require_once "../models/professeur.php";
require_once "../models/filliere.php";
require_once "../models/module.php";
require_once "../models/local.php";


$prof=new Professeur();
$module=new module();
$filliere=new filliere();
$local=new local();
$exam= new examen();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="container m-5">
  <div class="row">
  <table class="table table-hover">
  <thead>
    <tr class="table-danger">
      <th scope="col">Filiere</th>
      <th scope="col">Responsable</th>
      <th scope="col">Intitilé module</th>
      <th scope="col">Date de l'examen</th>
      <th scope="col">Heure</th>
      <th scope="col">Local</th>
      <th scope="col">Surveillants</th>
    </tr>

  </thead>
  <tbody>
    <?php
    $result=$exam->getAllExams();

    while ($data=ObjetSuivant($result))
    {
    $resultFilliere=$filliere->getFillByID($data->id_Filliere);
    while ($dataidFilliere=ObjetSuivant($resultFilliere))
        {
    ?>

    <tr>
      <th scope="row">
        <?php echo $dataidFilliere->Nom_filliere;} ?>      
      </th>
      <?php
      $resultIdProf=$module->getModuleByID($data->id_Module);

      while ($dataidRespo=ObjetSuivant($resultIdProf))
        {
            $resultP=$prof->getProfByID($dataidRespo->id_Respo);
            while ($dataP=ObjetSuivant($resultP))
            {
                ?>
                   <td><?php echo $dataP->Nom." ";?></td>
                   <td><?php echo $dataidRespo->Nom_Module." ";?></td>
                <?php
            }
        }
      ?>    
      <td><?php echo $data->date_examen; ?></td>
      <td><?php echo $data->heure_debut."-".$data->heure_fin; ?></td>
      <td>
      <ul>
        <?php
        $resultL=$local->getProfByIDExam($data->id);
        while ($dataLS=ObjetSuivant($resultL))
            {
            $resulLoca=$local->getLocalByID($dataLS->id_local);
            while ($dataLocal=ObjetSuivant($resulLoca))
                {
                ?>
                 <li><?php echo $dataLocal->Nom_local;?></li>
                <?php   
                }
            }
            ?>
        </ul>
        </td>
        <td>
        <ul>
       <?php
        $resultL=$local->getProfByIDExam($data->id);
        while ($dataLS=ObjetSuivant($resultL))
            {
            $resultPP=$prof->getProfByID($dataLS->id_prof);
            while ($dataSurve=ObjetSuivant($resultPP))
                {
                ?>
                <li><?php echo $dataSurve->Nom;?></li>
                <?php   
                }
            }?>
        </ul>
       </td>
    <?php
    }
    ?>
      

    </tr>
  </tbody>
</table>
</div>
</div>
</body>
</html>