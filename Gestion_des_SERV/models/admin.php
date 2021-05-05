<?php
require_once "../database/UtilBD.php";
class admin{


	/**
 * @return All admins
 */
function getAllAdmins()
{
    $connexion = Connexion(NOM,PASSE,BASE,SERVEUR);
    $admins ="SELECT * FROM admin";
    $result =ExecRequete($admins,$connexion);
    return $result;
}


	function authentify($login,$password)
{
    $result ="";

    $listeAdmins = $this->getAllAdmins();
    while ($data =ObjetSuivant($listeAdmins))
    {
        if(($data->Nom_admin)==$login && ($data->mdp_admiin)==$password)
        {
            $result="admin";
            
        }

    }
 
    return $result;


}




}

 ?>