<?php
require_once "../database/UtilBD.php";
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/module.php";
require_once "../models/filliere.php";
require_once "../models/professeur.php";
require_once "../models/local.php";
session_start();

$semestre=$_SESSION['exam1']['Semestre'];
$id_filliere=$_SESSION['exam1']['Filiere'];
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
        <h5 class="modal-title" id="exampleModalLabel">Suivant l'Ajout un examen</h5>
      </div>
      <form method="post" action="../controllers/traitement.php">
        <div class="modal-body">


            <div class="form-group">
             <label for="Module"> Module :</label>
            <select name="Module">
                <?php
                $module = new module();
             $result = $module->getModuleBySemestreFilliere($semestre,$id_filliere);

                while ($data=ObjetSuivant($result))
                {
                    ?>
                    <option value="<?php echo $data->id ?>"><?php echo ($data->Nom_Module);?></option>         
                <?php
                }
                ?>
            </select>
            </div>


            <div class="form-group">
            <label for="local"> Local:</label>
            <select name="local[]" multiple>
                <?php
                $local = new local();
                $result = $local->getProfByDisponibilite($date,$heureD);
                while ($data=ObjetSuivant($result))
                {
                    $result1=$local->getLocalByID($data->id_local);
                    while ($data2=ObjetSuivant($result1))
                    {
                    ?>
                    <option value="<?php echo $data2->id_local?>"><?php echo ($data2->Nom_local);?></option>        
                <?php
                }
                }
                ?>
            </select>
            </div>

            

        </div>

        <div class="modal-footer">
           
            <button type="reset" name="addExamenSuivant1" class="btn btn-primary">Effacer</button>
             <button type="submit" name="addExamSuivant2" class="btn btn-danger">Suivant</button>

        </div>

      </form>
</div>
</div>








</body>
</html>

