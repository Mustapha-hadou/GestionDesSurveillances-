<?php
require_once "../database/UtilBD.php";
class module{

  function getAllModule()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM module";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}

function getModuleByID($id)
{   
   $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM module WHERE id=".$id;
    $result=ExecRequete($stmt,$connexion);
    return $result;
}




function getModuleByResp($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM module WHERE id_Respo LIKE ".$id;
    $result=ExecRequete($stmt,$connexion);
    return $result;
}


function getModuleBySemestreFilliere($semestre,$filliere)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM module WHERE semestre='".$semestre."'AND id_filliere=".$filliere;
    $result=ExecRequete($stmt,$connexion);
    return $result;
}


}

 ?>