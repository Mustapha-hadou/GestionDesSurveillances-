<?php
require_once "../database/UtilBD.php";
class Professeur {

function addProf(array $commis){

    try
    {
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($commis)){
            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO professeur (Nom,Prenom,Email,Departement) 
	    			VALUES (:nom,:prenom,:email,:departement)");

            $stmt->bindParam(':nom',$commis['nom']);
            $stmt->bindParam(':prenom', $commis['prenom']);
            $stmt->bindParam(':departement', $commis['departement']);
            $stmt->bindParam(':email', $commis['email']);

            $stmt->execute();
            $connexion->commit();
            // $st="bien ajouté dans la Bd";
        }
    }
    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }
}


  function getAllProf()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM professeur";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}
function getProfByID($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM professeur WHERE id=".$id;
    $result=ExecRequete($stmt,$connexion);
    return $result;
}

function getProfByDisponibilite($date,$heureD)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt =
    "SELECT id as id_prof FROM professeur 
    EXCEPT 
    (SELECT id_prof FROM exam_prof_local WHERE date_exam='".$date."' AND heureD <= '".$heureD."' AND heureF >='".$heureD."')";

    $result=ExecRequete($stmt,$connexion);
    return $result;
}

function getAllProfByNomOrPrenom($search)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="
  SELECT * FROM professeur 
  WHERE Nom LIKE '%".$search."%'
  OR Prenom LIKE '%".$search."%'
 ";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}

}





 ?>