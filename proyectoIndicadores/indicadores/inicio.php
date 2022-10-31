<?php
require_once 'Instancia.php';
$ind = formularioMargenNeto::recuperarTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Balance Score</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="jquery.dynamicTable.js"></script>
    
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





<div class="container" class="col-12">
<form action="inicio.php" >
  Indicador: 
  <select id="status" class="form-select" name="status" onChange="mostrar(this.value);">
      <option value="Margen Neto">Margen Neto</option>

      <option value="trabajador">sin nombre</option>
      <option value="autonomo">sin nombre</option>
      <option value="paro">sin nombre</option>
   </select>
   

  </form>

</div>


<div id="Margen Neto" class="container" style="display:none;">


  <form action="agregar.php"  method="POST" >
  <h1  value="Margen Neto">Margen Neto</h1>
  <input type="hidden" class="form-control" name="NombreIndicador" value='Margen Neto' />
  <label  class="form-label">Utilidad Ventas</label>
  <input type="number" class="form-control" name="UtilidadVentas" id="UtilidadVentas" >
  <label  class="form-label">Ventas</label>
  <input type="number" class="form-control" name="Ventas" id="Ventas" >
  <label  class="form-label">Fecha</label>
  <input  id="endDate"type="date" class="form-control" name="Fecha" id="Fecha">
  <button type="submit" class="btn btn-primary">Enviar</button>

  </form>
</div>



<!-- <form  method="POST"  action=inicio2.php name="formFechas" id="formFechas" class="container"> 
<div class="container row justify-content-center ">

       <div class="col-lg-4 col-sm-4">
            <label for="fecha_de">Inicio</label>
            <input id="fecha_de" name="fecha_de" class="form-control" type="date" value="<?php echo $fecha_de?>" />
           
        </div>
        <div class="col-lg-4 col-sm-4">
            <label for="fecha_inicio">Fin</label>
            <input id="fecha_fin" name="fecha_a" class="form-control" type="date" value="<?php echo $fecha_a?>" />
            
        </div>


        <div class="col-lg-4 col-sm-4">
        &nbsp;
            <button  type="submit" style="margin-top: 25px" class="btn btn-success ">Buscar</button>
        
        </div>



    </div>
    </form> -->



   
 

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script>
    $(".hide").on('click', function() {
      $("nav ul").toggle('slow');
    })
  </script>
<script src="script.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="jquery.dynamicTable.js"></script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- <div>
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
</script> -->



</body>
</html>