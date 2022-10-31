<?php
 require_once 'conexion.php';
 

 class formularioMargenNeto {
   private $NombreIndicador;
   private $ResultadoIndicador;
   private $Fecha;
   const TABLA = 'balancescore';
   

   public function getId() {
      return $this->id;
   }

   public function getNombreIndicador() {
      return $this->NombreIndicador;
   }
   public function getResultadoIndicador() {
      return $this->ResultadoIndicador;
   }
   public function getFecha() {
    return $this->Fecha;
 }
   public function setNombreIndicador($NombreIndicador) {
      $this->getNombreIndicador = $NombreIndicador;
   }
   public function setIndicador($Indicador) {
      $this->getResultadoIndicador = $ResultadoIndicador;
   }
   public function setFecha($Fecha) {
    $this->getFecha = $Fecha;
 }
   public function __construct($NombreIndicador, $ResultadoIndicador,$Fecha, $id=null) {
      $this->NombreIndicador = $NombreIndicador;
      $this->ResultadoIndicador = $ResultadoIndicador;
      $this->Fecha = $Fecha;
      $this->id = $id;
   }
   public function guardar(){
      $conexion = new Conexion();
{
         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (NombreIndicador, ResultadoIndicador,Fecha) VALUES(:NombreIndicador, :ResultadoIndicador, :Fecha)');
         $consulta->bindParam(':NombreIndicador', $this->NombreIndicador);
         $consulta->bindParam(':ResultadoIndicador', $this->ResultadoIndicador);
         $consulta->bindParam(':Fecha', $this->Fecha);
         $consulta->execute();
         $this->id = $conexion->lastInsertId();
      }
      $conexion = null;
   }
   public static function recuperarTodos(){
      $conexion = new Conexion();
      $consulta = $conexion->prepare('SELECT Id, NombreIndicador, ResultadoIndicador, Fecha FROM  ' . self::TABLA . ' ORDER BY NombreIndicador');
      $consulta->execute();
      $registros = $consulta->fetchAll();
      return $registros;
   }


   public static function buscar(){
      $conexion = new Conexion();
      $consulta=$conexion->prepare("SELECT * FROM balancescore WHERE 'Fecha' BETWEEN 'fecha_de' AND 'fecha_a' ORDER BY Fecha ASC");
      
      $consulta->execute();
      $registros = $consulta->fetchAll();
      return $registros;
   }

 }




   
 
?>