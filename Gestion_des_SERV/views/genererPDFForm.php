<?php
require_once "../database/UtilBD.php";
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/filliere.php"; 

?>
<div class="col col-lg-7" style="margin:60px;margin-left:150px;">
 <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generer un PDF</h5>
      </div>
      <form method="post" action="../controllers/controllerPDF.php">
        <div class="modal-body">
                    <div class="form-group">
                    <label for="annee"> annee universitaire:</label>
                    <input type="text"  name="annee" class="form-control form-control-user" >
                    </div>


                    <div class="form-group">
                      <label for="type_examen" style="margin-left:20px;"> type:</label>
                      <select name="type_examen">
                          <option value="ds1">ds 1</option>
                          <option value="ds2">ds 2</option>
                          <option value="rattrapage">ratrapage</option>
                      </select>
  
                    <label for="Semestre" style="margin-left:20px;"> Semestre :</label>
                    <select name="semestre">
                        <option value="semestre1">semestre 1</option>
                        <option value="semestre2">semestre 2</option>
                    </select>

                     <label for="Filiere" style="margin-left:20px;"> Filiere :</label>
                     <select name="nom_fillire">
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
                    </div>

    <div class="modal-footer">
             
              <button type="submit" name="butGenerer" class="btn btn-danger btn-user btn-block"> telecharger </button>
          </div>
 </form>

            </div>
          </div>
