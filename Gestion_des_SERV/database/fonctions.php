<?php
require_once "../database/UtilBD.php";
require_once "../models/examen.php";
require_once "../models/professeur.php";
require_once "../models/filliere.php";
require_once "../models/module.php";
require_once "../models/local.php";

session_start();
$prof=new Professeur();
$module=new module();
$filliere=new filliere();
$local=new local();
$exam= new examen();

 
 function datas()
{
  
$semestre = $_SESSION['ecole']['semestre'];
$type = $_SESSION['ecole']['type_examen'];
$annee = $_SESSION['ecole']['annee'];
$exam= new examen();

$result= $exam->getExamByAnnSemstTyp($annee,$semestre,$type);

//stocker les informations dans une liste qu'on doit envoyer a fpdf
$array = array();




while ($data=ObjetSuivant($result))
    {
        $filliere=new filliere();
        $resultFilliere=$filliere->getFillByID($data->id_Filliere);
        while ($dataidFilliere=ObjetSuivant($resultFilliere))
        {
          $nom_filiere= $dataidFilliere->Nom_filliere;
        }       
        $module=new module();
        $datamodule=$module->getModuleByID($data->id_Module);

        while ($dataidRespo=ObjetSuivant($datamodule))
        {
            $prof=new Professeur();
            $resultP=$prof->getProfByID($dataidRespo->id_Respo);
            while ($dataP=ObjetSuivant($resultP))
            {
                
                   $proff = $dataP->Nom." ";
                   $module = $dataidRespo->Nom_Module." ";
            }
        }
      $date= $data->date_examen; 
      $heure_debut= $data->heure_debut;
      $heure_fin=$data->heure_fin; 
      $locaux=array();
      $local=new local();
        $resultL=$local->getProfByIDExam($data->id);
        while ($dataLS=ObjetSuivant($resultL))
            {
            $resulLoca=$local->getLocalByID($dataLS->id_local);
            while ($dataLocal=ObjetSuivant($resulLoca))
                {
                
                 array_push($locaux, $dataLocal->Nom_local);
                 
               
                }
            }
         $survs=array();
        $resultL=$local->getProfByIDExam($data->id);
        while ($dataLS=ObjetSuivant($resultL))
            {
            $resultPP=$prof->getProfByID($dataLS->id_prof);
            while ($dataSurve=ObjetSuivant($resultPP))
                
                array_push($survs, $dataSurve->Nom);
                 
                   
                }
               

        array_push($array,array(
        "id"=>$data->id,
        "responsable"=>$proff,
        "module"=>$module,
        "date"=>$date,
        "type"=>$type,
        "filiere"=>$nom_filiere,
        "semestre"=>$semestre,
        "heure_debut"=>$heure_debut,
        "heure_fin"=>$heure_fin,
        "local"=>$locaux,
        "surveillant"=>$survs
        
    ));
            }
            return $array;
        
 }


function datas1()
{
  

$exam= new examen();

$semestre = $_SESSION['exam_fil']['semestre'];
$type = $_SESSION['exam_fil']['type_examen'];
$annee = $_SESSION['exam_fil']['annee'];
$fil = $_SESSION['exam_fil']['nom_fillire'];
$exam= new examen();

$result= $exam->getExamByAnnSemstTypFilliere($annee,$semestre,$type,$fil);

//stocker les informations dans une liste qu'on doit envoyer a fpdf
$array = array();

$filliere=new filliere();
        $resultFilliere=$filliere->getFillByID($fil);
        while ($dataidFilliere=ObjetSuivant($resultFilliere))
        {
          $nom_filiere= $dataidFilliere->Nom_filliere;
      }


while ($data=ObjetSuivant($result))
    {


               
        $module=new module();
        $datamodule=$module->getModuleByID($data->id_Module);

        while ($dataidRespo=ObjetSuivant($datamodule))
        {
            $prof=new Professeur();
            $resultP=$prof->getProfByID($dataidRespo->id_Respo);
            while ($dataP=ObjetSuivant($resultP))
            {
                
                   $proff = $dataP->Nom." ";
                   $module = $dataidRespo->Nom_Module." ";
            }
        }
      $date= $data->date_examen; 
      $heure_debut= $data->heure_debut;
      $heure_fin=$data->heure_fin; 
      $locaux=array();
      $local=new local();
        $resultL=$local->getProfByIDExam($data->id);
        while ($dataLS=ObjetSuivant($resultL))
            {
            $resulLoca=$local->getLocalByID($dataLS->id_local);
            while ($dataLocal=ObjetSuivant($resulLoca))
                {
                
                 array_push($locaux, $dataLocal->Nom_local);
                 
               
                }
            }
         $survs=array();
        $resultL=$local->getProfByIDExam($data->id);
        while ($dataLS=ObjetSuivant($resultL))
            {
            $resultPP=$prof->getProfByID($dataLS->id_prof);
            while ($dataSurve=ObjetSuivant($resultPP))
                
                array_push($survs, $dataSurve->Nom);
                 
                   
                }
               

        array_push($array,array(
        "id"=>$data->id,
        "responsable"=>$proff,
        "module"=>$module,
        "date"=>$date,
        "type"=>"ds1",
        "filiere"=>$nom_filiere,
        "semestre"=>"semestre",
        "heure_debut"=>$heure_debut,
        "heure_fin"=>$heure_fin,
        "local"=>$locaux,
        "surveillant"=>$survs
        
    ));
            }
            return $array;
        
 }










?>