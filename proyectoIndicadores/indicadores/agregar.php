<?php

require_once 'instancia.php';
//Validamos que hayan llegado estas variables, y que no esten vacias:


// $Resultado;
//   $Resultado = $_POST['UtilidadVentas']+$_POST['Ventas'];
 
if (isset( $_POST)){
    $Resultado; 
    $Resultado = ($_POST["UtilidadVentas"]/$_POST["Ventas"])*100;
//traspasamos a variables locales, para evitar complicaciones con las comillas:
$NombreIndicador = $_POST["NombreIndicador"];
$ResultadoIndicador = $Resultado;
$Fecha= $_POST['Fecha'];
  
    

//Preparamos la orden SQL
$persona = new formularioMargenNeto($NombreIndicador,$ResultadoIndicador,$Fecha);
 $persona->guardar();
 echo $persona->getNombreIndicador() . ' se ha guardado correctamente con el id: ' . $persona->getId() .'<br/>';
//  header("Status: 301 Moved Permanently");
// header("Location: inicio.html ");
// exit;

//Aqui ejecutaremos esa orden

} else {

echo '<p>Por favor, complete el <a href="inicio.html">formulario</a></p>';
}

?>