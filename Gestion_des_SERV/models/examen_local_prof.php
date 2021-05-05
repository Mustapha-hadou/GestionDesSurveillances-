<?php
require_once "../database/UtilBD.php";
class exam_prof_local{

  function getAllExamProfLocal()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM exam_prof_local";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}

function getExamProfLocalByID($id)
{   
   $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM exam_prof_local WHERE id=".$id;
    $result=ExecRequete($stmt,$connexion);
    return $result;
}


function getExamProfLocalByIdResp($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM exam_prof_local WHERE id_prof LIKE ".$id;
    $result=ExecRequete($stmt,$connexion);
    return $result;
}

function getnbrSurv()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT count(id_prof) as cou,id_prof FROM exam_prof_local GROUP BY id_prof";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}




}

 ?>