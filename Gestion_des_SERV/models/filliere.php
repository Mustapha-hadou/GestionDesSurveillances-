<?php
require_once "../database/UtilBD.php";
class filliere{

  function getAllfilliere()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM filliere";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}

function getFillByID($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM filliere WHERE id_filliere=".$id;
    $result=ExecRequete($stmt,$connexion);
    return $result;
}



}

 ?>