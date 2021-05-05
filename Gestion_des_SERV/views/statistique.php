<?php

require_once "../database/UtilBD.php";
require_once "../includes/header.php"; 
require_once "../includes/navbar.php"; 
require_once "../models/professeur.php"; 
require_once "../models/examen_local_prof.php"; 


$exam_local=  new exam_prof_local();
$result2=$exam_local->getnbrSurv();
$arraData=array();
$arra=array();

$i=0;
while ($data2=ObjetSuivant($result2))
        {
            $ListenbrSurvData[$i]=$data2->cou;
            $arra[$i]=$data2->id_prof;
            $i++;
        }
$i=0;
$prof=new Professeur();
$ListeDataProf=array();

foreach ($arra as $key) {
	$result=$prof->getProfByID($key);
     while ($data=ObjetSuivant($result))
            {
                $ListeDataProf[$i]=$data->Nom;
                $i++;
            }
}

$arrData=json_encode($ListenbrSurvData);
$arrDataProf=json_encode($ListeDataProf);


?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../views/js/chart-js-config.js"></script>  


				<div class="container" >           	
                        <div class="col-xl-10" style="margin:60px;" >
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="easion-card-title"> Statistiques des Surveillance</div>
                                </div>
                                <div class="card-body easion-card-body-chart">
                                    <canvas id="easionChartjsDougnut"></canvas>
                                    <script>
                                        var ctx = document.getElementById("easionChartjsDougnut").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
												
												labels: <?php echo $arrDataProf; ?>,
												
                                                datasets: [{
													label: 'Week',
													
													data:  <?php echo $arrData; ?>,
													
                                                    backgroundColor: [
                                                        window.chartColors.primary,
                                                        window.chartColors.secondary,
														window.chartColors.success,
														window.chartColors.info,
														window.chartColors.superwarning,
														window.chartColors.danger,
                                                        window.chartColors.secondary,
														window.chartColors.success,
                                                    ],
                                                    borderColor: '#fff',
                                                    fill: false
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                    display: false
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>	       
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../views/js/easion.js"></script>
</body>
</html>