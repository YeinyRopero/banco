<head>
  <title>BancoAmigo</title>        
  <meta charset="utf-8" />      

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />


  <link rel="stylesheet" href="assets/css/img.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/estilosB.css" /> 


  <script src="assets/js/bootstrap.min.js"></script>
    
  <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/js/ini.js"></script>
  <script src="assets/js/jquery.anexsoft-validator.js"></script> 
     <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

 
</head>





<div class="col-sm-3"></div> <!--espacios para los lados de los cajones-->

<div class="col-sm-6"><!--espacios de los lados para la imagen-->
    
    
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
     
<div id="img"><img  class="centrado"  src="../banco/assets/img/logo_index.png" class="img-responsive" alt="Imagen responsive"></div>


    
    
    
    
    <form action="controlador/control.php"  method="POST"><!--abre formaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
 <div class="form-group"> 
<label for="user">Ingrese Documento </label>
<input type="text" name="usuario" placeholder="Ingresar usuario" class="form-control" autocomplete="off" />
 </div>

 <div class="form-group">
 <label for="clave">Ingrese clave</label>
 <input type="password" name="clave" placeholder="Ingresar contraseña" class="form-control"  autocomplete="off" />
 </div>

 <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "<div style='color:red'>Usuario o contraseña invalido </div>";
       }
     ?>
 


 <input class="btn btn-i" type="submit" name="login" id="login" value="ENTRAR"/>   
 <input name="opcion" type="hidden"  id="opcion" value="1"/> 
        
        
        
        

 <input class="btn btn-i" type="submit" name="login" id="login" value="CREAR UNA CUENTA"/>   

<input name="opcion" type="hidden"  id="opcion" value=""/> 

 
</form><!--cierra formaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
    
    
    
    

</div><!--cierra dic de espacios de lado de la imagen-->

<div class="col-sm-3"></div><!--cierra div de espacio del lado de los cajones-->
  



