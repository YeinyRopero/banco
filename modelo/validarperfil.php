<?php


 class Datosacceso{
     
    private $cliente_id;
	private $cliente_nom;
	private $cliente_cel;
    private $cliente_clave;
	private $cliente_correo;
    private $datos;
    private $todospacientes;
          
		
	public function getCliente_id(){
		return $this->cliente_id;
		}
public function setCliente_id($cliente_id){
		$this->cliente_id=$cliente_id;
		}


     public function getCliente_nom(){
		return $this->cliente_nom;
		}
public function setCliente_nom($cliente_nom){
		$this->cliente_nom=$cliente_nom;
		}

     
     
       public function getCliente_cel(){
		return $this->cliente_cel;
		}
public function setCliente_cel($cliente_cel){
		$this->cliente_cel=$cliente_cel;
		}

     
     
      public function getCliente_clave(){
		return $this->cliente_clave;
		}
public function setCliente_clave($cliente_clave){
		$this->cliente_clave=$cliente_clave;
		}

     
     
         public function getCliente_correo(){
		return $this->cliente_correo;
		}
public function setCliente_correo($cliente_correo){
		$this->cliente_correo=$cliente_correo;
		}

          
     
     
public function __construct(){
	require_once('conectarbd.php');
	$this->db=conectarbd::conexion();
	
}


public  function validar(){
	  
  $sql="SELECT * FROM cliente 
      
      WHERE cliente.cliente_id='$this->cliente_id' 
    
    AND cliente.cliente_clave='$this->cliente_clave'";
    

	$consulta=$this->db->query($sql);
	
	while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
		
		$this->datos[]=$fila;
		
		}
		
		return $this->datos;
    
    
    
    
    
 }
     
     

     
 }//cierra cla principal datosacceso

?>