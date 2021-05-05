<?php
require_once "../database/UtilBD.php";
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/professeur.php"; 

 ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ajouter Prof</title>
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



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            <button type="button" class="btn btn-primary">
             <a href="ajout_ProfForm.php" style="color:white;"> Ajouter un Professeur</a>
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Nom </th>
            <th>Prenom </th>
            <th>Email</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     <?php
     $prof=new Professeur();
     $AllProf=$prof->getAllProf();
     while ($dataProfs=ObjetSuivant($AllProf))
        {
     ?>
          <tr>
            <td> <?php echo $dataProfs->Nom; ?></td>
            <td> <?php echo $dataProfs->Prenom; ?></td>
            <td> <?php echo $dataProfs->Email;?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-info"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
        }
          ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>


