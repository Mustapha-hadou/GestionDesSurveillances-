<?php
require_once "../database/UtilBD.php";
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/module.php";
require_once "../models/filliere.php";
require_once "../models/professeur.php";
require_once "../models/local.php";
session_start();
$tabLocal=$_SESSION['exam1S'];
$date=$_SESSION['exam1']['jour'];
$heureD=$_SESSION['exam1']['heured'];
$heureF=$_SESSION['exam1']['heuref'];

?>

<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ajouter Examen</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
    
</head>
<body>

<div class="col col-lg-6" style="margin:40px;margin-left:200px;">
 <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fin d'Ajout un examen</h5>
      </div>
      <form method="post" action="../controllers/traitement.php">
        <div class="modal-body">

        <h2 style="font-weight:bold;color: black;">
            Le responsable du module est :
            <?php 
            $prof=new professeur();
            $mod = new module();
            $result1 = $mod->getModuleByID($_SESSION['exam1S']["Module"]);
            while ($data1=ObjetSuivant($result1))
                {
                    $respo = $data1->id_Respo;
                }

            $result=$prof->getProfByID($respo);
            while ($data=ObjetSuivant($result))
                {
                    echo $data->Nom." ".$data->Prenom;
                }
            ?>
        </h2>
        <br>
        <br>

        <div class="form-group">

        <?php
        for ($i=0; $i <count($tabLocal["local"]); $i++) {
                $id=$tabLocal["local"][$i];
                $local=new local();
                $result=$local->getLocalByID($id);
                while ($data=ObjetSuivant($result))
                    {
        ?>
        <label for="Module"> <?php echo $data->Nom_local ?>:</label>
            <select name="salle<?php echo $i;?>[]" multiple>
                <?php
            $prof = new professeur();
            $result2 =$prof->getProfByDisponibilite($date,$heureD);
            while ($data2=ObjetSuivant($result2))
                {
                    $result3=$prof->getProfByID($data2->id_prof);
                    while ($data3=ObjetSuivant($result3))
                    {
                    ?>
                    <option value="<?php echo $data3->id?>"><?php echo ($data3->Nom);?></option>        
                <?php
                }
                }
                ?>
            </select><br/>
        <?php
         }} 
         ?>
        </div>

        </div>

        <div class="modal-footer">
            <button type="reset" name="" class="btn btn-primary">Effacer</button>
            <button type="submit" name="valider" class="btn btn-danger">Valider</button>
        </div>
      </form>

</div>
</div>


</body>
</html>

