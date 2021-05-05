<?php
require_once "../database/UtilBD.php";
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/professeur.php"; 

 ?>

<div class="col col-lg-6" style="margin:60px;margin-left:200px;">
 <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un professeur</h5>
      </div>
      <form action="../controllers/traitement.php" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label> Nom Local </label>
                <input type="text" id="local" name="local"  class="form-control" placeholder="Enter Username">
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" name="addlocal" class="btn btn-danger">Save</button>
        </div>
      </form>
</div>
</div>

