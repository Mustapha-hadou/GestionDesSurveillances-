<?php 

require_once "../database/UtilBD.php";
require_once ("../models/professeur.php");
require_once ("../models/admin.php");
require_once ("../models/local.php");
require_once ("../models/examen.php");

session_start();

if(isset($_POST['action']))
{
    if(isset($_POST['login']) && isset($_POST['password']))
    {
        $login=$_POST['login'];
        $password=$_POST['password'];
        $admin = new admin();
        $result=$admin->authentify($login,$password);

        if($result=="admin")
        {
           header("location:../views/affichageHistorique.php");
        
        }else
            echo "Authentification echouée !";
    }
}


elseif (isset($_POST['addExamenSuivant1']))
{

    $Semestre =$_POST['Semestre'];
    $numeDS=$_POST['numeDS'];
    $jour=$_POST['jour'];
    $annee=$_POST['annee'];
    $heured =$_POST['heured'];
    $heuref =$_POST['heuref'];
    $filiere=$_POST['Filiere'];

    if(isset($Semestre,$numeDS,$jour,$heured,$heuref,$filiere,$annee))
    {
        $_SESSION['exam1'] = $_POST;
        header("location:../views/suivant_ajout_exam.php");

    }else{
        header("location:../views/ajout_Examen.php?message=veullez remplir tous les champs");
    }
}


elseif (isset($_POST['addExamSuivant2']))
{

    $module=$_POST['Module'];
    $tab_local=$_POST['local'];

    if(isset($module,$tab_local))
    {
        $_SESSION['exam1S'] = $_POST;
        header("location:../views/suivant_ajout_exam2.php");

    }else{
        header("location:../views/suivant_ajout_exam.php.php?message=veullez remplir tous les champs");
    }
}

elseif(isset($_POST['valider']))
{

$exam=new examen();
for ($i=0;$i<count($_SESSION['exam1S']["local"]);$i++) {
      $_SESSION["local".$i]= $_POST["salle".$i];          
}
$exam->addExam($_SESSION);
header("location:../views/ajout_Examen.php?message=examen ajoute avec succes");

}

elseif (isset($_POST['addlocal']))
{
    $local =$_POST['local'];

    if(isset($local))
    {
        $local = new local();
        $local->addlocal($_POST);
        header("location:../views/ajout_local.php?message=bien ajoutée");

    }else
        header("location:../views/ajout_local.php?message=echouée");


}
elseif (isset($_POST['addprof']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $departement = $_POST['departement'];

    if (isset($nom, $prenom, $email,$departement)) {
        $prof = new Professeur();
        $prof->addProf($_POST);
        header("location:../views/ajout_Prof.php?message=bien ajoutée");

    } else
        header("location:../views/ajout_Prof.php?message=echouée");

}




    if(isset($_GET['action']))
{
    $action=$_GET['action'];
    switch ($action)
    {
        case "AjouterExamen" :
            header("location:../views/ajout_Examen.php");
            break;
        case "AjouterProf":
            header("location:../views/ajout_Prof.php");
            break;
        case "AjouterLocal" :
            header("location:../views/ajout_local.php");
            break;

        case "afficheHistorique" :
            header("location:../views/affichageHistorique.php");
            break;

        case "genererPDF" :
            header("location:../views/genererPDFForm.php");
            break;
        case "genererPDF_E" :
            header("location:../views/genererPDFFormE.php");
            break;
        case "rechercheProf" :
            header("location:../views/recherche.php");
            break;
         case "statistique" :
            header("location:../views/statistique.php");
            break;


           

    
    }
}




