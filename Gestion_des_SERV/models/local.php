<?php 

require_once "../database/UtilBD.php";

class local{

	function addlocal(array $commis){

    try
    {
        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($commis)){
            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO local  (nom_local)
	    			VALUES (:local)");

            $stmt->bindParam(':local', $commis['local']);
           
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



  function getAllLocal()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM local";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}
function getLocalByID($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM local WHERE id_local=".$id;
    $result=ExecRequete($stmt,$connexion);
    return $result;
}

function getProfByIDExam($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM exam_prof_local WHERE id_exam='".$id."'";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}



function getProfByDisponibilite($date,$heureD)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt =
    "SELECT id_local FROM local 
    EXCEPT 
    (SELECT id_local FROM exam_prof_local WHERE date_exam='".$date."' AND heureD <= '".$heureD."' AND heureF >='".$heureD."')";
    $result=ExecRequete($stmt,$connexion);
    return $result;
}

}

?>