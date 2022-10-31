<?php
require_once 'Instancia.php';
$ind = formularioMargenNeto::recuperarTodos();
?>
<?php 
include_once 'conexion2.php';
$sql = "SELECT * from balancescore";
$run = mysqli_query($dbc, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Indicadores</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

</head>
<body>
<nav >
   
     
  <ul>
    <a class="navbar-logo" href="#">
        <img src="img/iconoi-logo.jpg" alt="logo" >
      </a>
  
    <li ><a href="inicio.php">Inicio</a></li>
    <li ><a href="inicio3.php">Tabla</a></li>
    
  </ul>
  <div class="hide">
    <i class="fa fa-bars" aria-hidden="true"></i> Menu
  </div>
</nav>
<section style="padding-top:50px;">
	<div class="container box">
		<div class="row">
			<h1>Indicadores</h1>
			<form method="post" action="inicio3.php">
				<br>
				<div class="col-lg-4">
					<div class="form-group">
						<input type="date" name="start_date" class="form-control">
					</div>
				</div><br>
				<div class="col-lg-4">
					<div class="form-group">
						<input type="date" name="end_date" class="form-control">
					</div>
				</div><br>
				<div class="col-lg-4">
					<div class="form-group">
						<input type="submit" name="submit_date" class="btn btn-primary" value="Buscar">
					</div>
				</div><br>
			</form>
			
			<?php 
				if (isset($_POST['submit_date'])) {
					
					$start_date = $_POST['start_date'];
					$end_date = $_POST['end_date'];
                   
					
					$query = mysqli_query($dbc, "SELECT * from balancescore where Fecha between '$start_date' and '$end_date' ");

					if (mysqli_num_rows($query)>0) {?>
						
						

						<div class="col-lg-12">
							<table class="table table-striped">
								<thead>
									<th>nombre</th>
									<th>resultado</th>
									<th>fecha resultado</th>
								</thead>
								<tbody>
								<?php foreach ($query as $value) {?>
									<tr>
										<td><?=$value['NombreIndicador']?></td>
										<td><?=$value['ResultadoIndicador']?></td>
										<td><?=$value['Fecha']?></td>
									</tr>
								<?php	} ?>
								</tbody>
							</table>
						</div>
                        <div>
  <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels = [
    <?php foreach($query as $value): ?>
        <?php $prueba=$value['Fecha'];?>
       <?php $fechaComoEntero = strtotime($prueba);?>
        <?php $anio = date('Y.m', $fechaComoEntero); ?>
        <?php echo $anio;?>, 
        <?php endforeach; ?>
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Fechas',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [<?php foreach($query as $value): ?>
        <?php echo $value['ResultadoIndicador'];?>, 
        <?php endforeach; ?>],
    }]
  };

  const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
					<?php
                    
    




					}else{

						echo "No data found";
					}

				}else{
			?>

			<div class="col-lg-12">

				<table class="table table-striped">
					<thead>
						<th>#</th>
						<th>nombre</th>
						<th>resultado</th>
						<th>fecha normal</th>
					</thead>
					<tbody>
						<?php 
							$i=1;
							while ($row=mysqli_fetch_assoc($run)) {
								
								$name = $row['NombreIndicador'];
								$email = $row['ResultadoIndicador'];
								$Fecha = $row['Fecha'];
							
					    ?>
						<tr>
							<td><?=$i;?></td>
							<td><?=$name;?></td>
							<td><?=$email;?></td>
							<td><?=$Fecha;?></td>
						</tr>
					<?php $i++; } ?>
					</tbody>
					
				</table>
				
			</div>
           

            <div>
  <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const labels = [
    <?php foreach($ind as $item): ?>
        <?php $prueba=$item['Fecha'];?>
       <?php $fechaComoEntero = strtotime($prueba);?>
        <?php $anio = date('Y.m', $fechaComoEntero); ?>
        <?php echo $anio;?>, 
        <?php endforeach; ?>
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Fechas',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [<?php foreach($ind as $item): ?>
        <?php echo $item['ResultadoIndicador'];?>, 
        <?php endforeach; ?>],
    }]
  };

  const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>









            
		<?php } ?>
		</div>
	</div>
</section>



</body>
</html>