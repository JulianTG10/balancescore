<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "balancescore");
$columns = array('Id', 'NombreIndicador', 'ResultadoIndicador', 'Fecha');

$query = "SELECT * FROM balancescore WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'Fecha BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (Id LIKE "%'.$_POST["search"]["value"].'%" 
  OR NombreIndicador LIKE "%'.$_POST["search"]["value"].'%" 
  OR ResultadoIndicador LIKE "%'.$_POST["search"]["value"].'%" )
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY Id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["Id"];
 $sub_array[] = $row["NombreIndicador"];
 $sub_array[] = $row["ResultadoIndicador"];
 $sub_array[] = $row["Fecha"];
 $data[] = $sub_array;
 $graficaFecha[]=$row["Fecha"];
 $graficaResultado=$row["ResultadoIndicador"];
}

function get_all_data($connect)
{
 $query = "SELECT * FROM balancescore";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>