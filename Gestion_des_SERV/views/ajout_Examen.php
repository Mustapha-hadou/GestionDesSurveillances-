<?php
require_once "../database/UtilBD.php";
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/module.php";
require_once "../models/filliere.php";
require_once "../models/professeur.php";
require_once "../models/local.php";


?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ajouter Examen</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <script type="text/javascript">
        <?php
                if(isset($_GET['message']))
                 $message =$_GET['message'];
                {?>
                    alert("<?php echo $message?>");
                <?php
                }
               
        ?>

    </script>

</head>
<body>
<div class="col col-lg-8" style="margin:8px;margin-left:80px;">
 <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un examen</h5>
      </div>
      <form method="post" action="../controllers/traitement.php">

        <div class="modal-body">

            <div class="form-group">
            <label for="annee"> Annee : </label>
            <input type="text" class="form-control" id="anne" name="annee" size="20" maxlength="20" />
            </div>

            <div class="form-group">
            <label for="jour"> Date : </label>
            <input type="date" id="jour" class="form-control" name="jour" size="20" maxlength="20" />
            </div>

            <div class="form-group">
            <label for="heured"> Heure debut :</label>
            <input type="time" class="form-control" id="heured" name="heured" size="20" maxlength="20" />
            </div>

            <div class="form-group">
            <label for="heuref"> Heure fin :</label>
            <input type="time" id="heuref" class="form-control" name="heuref" size="20" maxlength="20" />
            </div>
<br>
            <div class="form-group">
            <label for="Filiere" style="margin-left:50px;"> Filiere :</label>
            <select name="Filiere" class="form-select">
                <?php
                $module = new filliere();
                $result = $module->getAllfilliere();

                while ($data=ObjetSuivant($result))
                {
                    ?>
                    <option value="<?php echo $data->id_filliere ?>"><?php echo $data->Nom_filliere ;?></option>
                 <?php
                }
                ?>
            </select>
    
            <label for="Semestre" style="margin-left:30px;"> Semestre :</label>
            <select name="Semestre">
                <option value="semestre1">semestre 1</option>
                <option value="semestre2">semestre 2</option>
            </select>
            
            <label for="numeDS" style="margin-left: 30px;"> numero ds:</label>
            <select name="numeDS">
                <option value="ds1">ds 1</option>
                <option value="ds2">ds 2</option>
                <option value="rattrapage">ratrapage</option>
            </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="reset" name="addExamenSuivant1" class="btn btn-primary">Effacer</button>
            <button type="submit" name="addExamenSuivant1" class="btn btn-danger">Suivant</button>
        </div>

      </form>
</div>
</div>




</body>
</html>

