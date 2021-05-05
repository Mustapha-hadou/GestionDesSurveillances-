<?php 
require_once "../database/UtilBD.php";

require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/local.php"; 

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ajouter local</title>
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
             <a href="ajout_localForm.php" style="color:white;"> Ajouter un Local</a>
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th>NOM LOCAL</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     <?php
     $local=new local();
     $AllLocal=$local->getAllLocal();
     while ($dataLocaux=ObjetSuivant($AllLocal))
        {
     ?>
          <tr>
            <td> <?php echo $dataLocaux->id_local; ?></td>
            <td> <?php echo $dataLocaux->Nom_local; ?></td>
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





</body>
</html>

