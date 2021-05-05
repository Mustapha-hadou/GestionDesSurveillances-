<?php
require_once "../database/UtilBD.php";
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/professeur.php"; 

 ?>

  <div class="col col-lg-6" style="margin:40px;margin-left: 200px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un professeur
        </h5>
      </div>
      <form action="../controllers/traitement.php" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label> Nom </label>
                <input type="text" id="nom" name="nom"  class="form-control" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label> Prenom </label>
                <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" id="prenom" name="email" class="form-control" placeholder="Enter Email">
            </div>

             <div class="form-group">
              <label for="departement"> Departement  :</label>
              <select name="departement" id="mltislct" class="mdb-select md-form">
                    <option value="Informatique">
                        Informatique
                    </option>
                    <option value="Industriel">
                        Industriel
                    </option>
                    <option value="CP">
                        Cycle preparatoire
                    </option>     
              </select>
          </div>
             
        </div>
        <div class="modal-footer">
            <button type="submit" name="addprof" class="btn btn-danger">Save</button>
        </div>
      </form>
    </div>
    </div>
