<?php
require_once "../database/UtilBD.php";
require_once "../models/module.php";
require_once "../models/local.php";
class examen{

	function addExam(array $exams){
    try{
        $prof=new professeur();
            $result=$prof->getProfByID($_SESSION['exam1S']["Module"]);
            while ($data=ObjetSuivant($result))
                {
                   $dest= $data->Email;
                   $nom_resp=$data->Nom;
                   $prenom_respo=$data->Prenom;
                }

        $dest="dounialamsaddek00@gmail.com";
        $module = new module();
        echo $exams['exam1S']['Module'];
        $result1 = $module->getModuleByID($exams['exam1S']['Module']);
        while ($data1=ObjetSuivant($result1))
                {
                    $Nom_module = $data1->Nom_Module;
                }
        $sujet = "DS ".$Nom_module;
        $corp = "Salut Mr ".$nom_resp." ".$prenom_respo."DS de ".$Nom_module." est planifier pour ".$exams['exam1']['jour']." a ".$exams['exam1']['heured']." jusqu'a ".$exams['exam1']['heuref']." Cordialment.";

        $headers = "From: mustaphahadou98@gmail.com";
        if(mail($dest, $sujet, $corp, $headers)){
            echo "message";
        }

        $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
        if(!is_null($exams)){

            $connexion->beginTransaction();
            $stmt = $connexion->prepare("INSERT INTO examen(id,    date_examen,heure_debut,heure_fin, id_Module,type,id_Filliere,semestre,annee) 
	    		VALUES (:id_exam,:date_examen,:heure_debut,:heure_fin,:id_Module,:type,:id_Filliere,:semestre,:annee)");
            $id=$exams['exam1']['jour'].$exams['exam1']['Filiere'].$exams['exam1S']['Module'];
            $stmt->bindParam(':id_exam',$id);

            $stmt->bindParam(':date_examen',$exams['exam1']['jour']);
            $stmt->bindParam(':heure_debut',$exams['exam1']['heured']);
            $stmt->bindParam(':heure_fin',$exams['exam1']['heuref']);
            $stmt->bindParam(':id_Module', $exams['exam1S']['Module']);
            $stmt->bindParam(':type', $exams['exam1']['numeDS']);
            $stmt->bindParam(':id_Filliere',$exams['exam1']['Filiere']);
            $stmt->bindParam(':semestre', $exams['exam1']['Semestre']);
            $stmt->bindParam(':annee',$exams['exam1']['annee']);

            $stmt->execute();


for ($i=0; $i <count($_SESSION["exam1S"]["local"]); $i++) { 
        $id_loc=$_SESSION["exam1S"]["local"][$i];

        for ($j=0; $j <count($_SESSION["local".$i]); $j++) { 
              $id_prof=$_SESSION["local".$i][$j];

              $prof=new professeur();
              $result=$prof->getProfByID($id_prof);
              while ($data=ObjetSuivant($result))
                {
                   $dest= $data->Email;
                   $nom_resp=$data->Nom;
                   $prenom_respo=$data->Prenom;
                }

                $dest="dounialamsaddek00@gmail.com";
                $local = new local();
                $result2 = $local->getLocalByID($id_loc);
                while ($data2=ObjetSuivant($result2))
                {
                    $Nom_local= $data2->Nom_local;
                }
                $sujet = "serviallance de DS ";
                $corp = "Salut Mr ".$nom_resp." ".$prenom_respo." vous avez une serviallance dans ".$Nom_local." a ".$exams['exam1']['jour']." depuis ".$exams['exam1']['heured']." jusqu'a ".$exams['exam1']['heuref']." Cordialment.";

                $headers = "From: mustaphahadou98@gmail.com";
                if(mail($dest, $sujet, $corp, $headers)){
                        echo("</br>");
                         echo "  message SERV";
                }


              $stmt = $connexion->prepare("INSERT INTO exam_prof_local(id_prof,id_exam,id_local,date_exam,heureD, heureF) 
                    VALUES (:id_prof,:id_examen,:id_local,:date_exam,:heureD,:heureF)");

            $stmt->bindParam(':id_prof',$id_prof);
            $stmt->bindParam(':id_examen',$id);
            $stmt->bindParam(':id_local', $id_loc);
            $stmt->bindParam(':date_exam',$exams['exam1']['jour']);
            $stmt->bindParam(':heureD',$exams['exam1']['heured']);
            $stmt->bindParam(':heureF',$exams['exam1']['heuref']);

            $stmt->execute();

}
}
}
            $connexion->commit();

}
          
    catch(Exception $e){
        $connexion->rollback();
        echo $e->getMessage();
    }
}

function getAllExams()
{

    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM examen";
    $result=ExecRequete($stmt,$connexion);
    return $result;

}

function getAllNumberSurveil()
{

    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt =
    "SELECT count('id_prof') as countt,id_prof FROM  local_examen  GROUP BY id_prof";

    $result=ExecRequete($stmt,$connexion);




    return $result;


}
function getExamByAnnSemstTyp($annee,$semestre,$type)
{

    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM examen WHERE  annee='".$annee."' AND semestre ='".$semestre."' AND type='".$type."'";
   
    $result=ExecRequete($stmt,$connexion);
    return $result;

}

function getExamByAnnSemstTypFilliere($annee,$semestre,$type,$Filliere)
{

    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM examen WHERE  annee='".$annee."' AND  id_Filliere='".$Filliere."' AND semestre ='".$semestre."' AND type='".$type."'";
   
    $result=ExecRequete($stmt,$connexion);
    return $result;

}

function getAllExamsByID($id)
{

    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt ="SELECT * FROM examen WHERE id='".$id."'";
    $result=ExecRequete($stmt,$connexion);
    return $result;

}




}

 ?>