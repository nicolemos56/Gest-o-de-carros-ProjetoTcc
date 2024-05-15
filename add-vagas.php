<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');

    if (strlen($_SESSION['vpmsaid']==0)) {
    header('location:logout.php');
    } else{

    if(isset($_POST['submit-category']))
    {
        $catname=$_POST['numVagas'];
        $sdesc=$_POST['zonaestacio'];
        
$valorExistenteSql="SELECT NumeroVagas FROM tbA WHERE idNumVagas = '$sdesc'; -- Substitua 'seu_id_de_registro' pelo ID do registro específico que você deseja atualizar.

-- Suponha que o valor atual retornado seja 7. Agora, adicione o número 3 a esse valor.



-- Em seguida, atualize a coluna Fk_Areaestacionamento na tbA com o novo valor.

 -- Substitua 'seu_id_de_registro' pelo ID do registro específico que você deseja atualizar.

``";
     $actualiza="UPDATE tbnumerovagas SET Fk_Areaestacionamento = $sdesc, NumeroVagas= '$valorExistenteSql+$catname';";

        
        $query=mysqli_query($con, "INSERT into tbnumerovagas(NumeroVagas,FkAreasEstacio) value('$catname','$sdesc')");
        if ($query) {
        $msg="Vaga adicionada";
    }
    else
        {
        $msg="algo errado";
        }

    
    }
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ISPCAN</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="vehicle-category";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Gestão de vagas de estacionamento</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Adicionar nova vaga de estacionamento</div>
						<div class="panel-body">

                        <?php if($msg)
						echo "<div class='alert bg-info ' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        
                        <div class="col-md-12">

							<form method="POST">

								<div class="form-group">
									<label>Numero de vaga</label>
									<input type="text" class="form-control" id="catename" name="numVagas" required>
								</div>

                                <div class="form-group">
										<label>Zona de estacionamento</label>
										<select class="form-control" name="zonaestacio" id="zonaestacio">
										<option value="0">Selecionar zona</option>
										<?php $query=mysqli_query($con,"select NomeZonaEstacionamento from tbareasdeestagionamento");
											while($row=mysqli_fetch_array($query))
											{
											?>    
                                        <option value="<?php echo $row['NomeZonaEstacionamento'];?>"><?php echo $row['NomeZonaEstacionamento'];?></option>
                  						<?php } ?> 
										</select>
									</div>
									
									
							
									<button type="submit" class="btn btn-success" name="submit-category">Enviar</button>
									<button type="reset" class="btn btn-default">Cancelar</button>
								</div> <!--  col-md-12 ends -->


						</div>
					</div>
				</div>
				
				
				
</div><!--/.row-->
		
		
		

        <?php include 'includes/footer.php'?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
};
	</script>

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
		
</body>
</html>

<?php }  ?>