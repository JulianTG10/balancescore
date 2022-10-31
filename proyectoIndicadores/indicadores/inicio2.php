
<html>
 <head>
  <title>BalanceScore</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="style.css">
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
  

 </head>
 <body>
 <nav >
   
     
   <ul>
     <a class="navbar-logo" href="#">
         <img src="img/iconoi-logo.jpg" alt="logo" >
       </a>
   
       <li ><a href="inicio.php">Inicio</a></li>
    <li ><a href="inicio2.php">Tabla</a></li>
     
   </ul>
   <div class="hide">
     <i class="fa fa-bars" aria-hidden="true"></i> Menu
   </div>
 </nav>
  <div class="container box">
   <h1 align="center">Tabla Indicadores</h1>
   <br />
   <div class="table-responsive">
    <br />
    <div class="row">
     <div class="container row justify-content-center">
      <div class="col-lg-4 col-sm-4">
       <input type="date" name="start_date" id="start_date" class="form-control" />
      </div>
      <div class="col-lg-4 col-sm-4">
       <input type="date" name="end_date" id="end_date" class="form-control" />
      </div>
      <div class="col-lg-4 col-sm-4">
      <input type="button" name="search" id="search" value="Buscar" class="btn btn-success" />
     </div>      
     </div>
     
    </div>
   
    <br />
    <table id="Fecha" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Nombre Indicadores</th>
       <th>Resultado Indicadores</th>
       <th>Fecha</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
  
  <script>
    $(".hide").on('click', function() {
      $("nav ul").toggle('slow');
    })
  </script>
<script src="script.js"></script>
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
 </body>
</html>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#Fecha').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"fetch.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#Fecha').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Las fechas son requeridas");
  }
 }); 




 
 
});
</script>
