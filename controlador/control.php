


<?php


session_start();

?>
<script type="text/javascript">alert('estas entrando al CONTROLADOR');</script>
<?php

$opcion=$_REQUEST['opcion'];

switch($opcion){
        
  
case 1:
        
            
  require_once("../modelo/validarperfil.php");
		$validar=new Datosacceso();   
        $validar->setCliente_id($_REQUEST['usuario']);
		$validar->setCliente_clave($_REQUEST['clave']);
        
if($datos=$validar->validar()){

		    foreach($datos as $registro){
                
		      $_SESSION['cliente_id']=$registro['cliente_id'];
		      $_SESSION['cliente_clave']=$registro['cliente_clave'];	
                
               require_once("../vista/vista_cliente.php");
                
		    }// cierra el for
    
         
  }  

break;
        
        
     
        
        

           
case 2:
        
require_once("../modelo/validarempleado.php");// llmamos el documento validarempleado.php

$datosempleado=new ValidarEmpleado();//asociamos el objeto datosempleado y llama la clase ValidarEmpleado

$datosempleado->setDocumento($_REQUEST['documento']);//asociamos el objeto datosempleadp con cada variable
$datosempleado->setNombres($_REQUEST['nombres']);
$datosempleado->setApellidos($_REQUEST['apellidos']);
$datosempleado->setCelular($_REQUEST['celular']);
$datosempleado->setTelefono($_REQUEST['telefono']);
$datosempleado->setDireccion($_REQUEST['direccion']);
$datosempleado->setEstado_Civil($_REQUEST['estado_civil']);
$datosempleado->setPerfil($_REQUEST['perfil']);
$datosempleado->setFecha_Ingreso($_REQUEST['fecha_ingreso']);
$datosempleado->setFecha_Nacimiento($_REQUEST['fecha_nacimiento']);

$nombre = $_FILES['empl_foto']['name'];
$nombrer = strtolower($nombre);
$cd=$_FILES['empl_foto']['tmp_name'];
$ruta = "../vista/fotos/" . $_FILES['empl_foto']['name'];
$destino = "../vista/fotos/".$nombrer;
$resultado = @move_uploaded_file($_FILES["empl_foto"]["tmp_name"], $ruta);
$datosempleado->setFoto($destino);

$datosempleado->insertarEmpleado();//funcion empleado de validarempleado.php

require_once("../vista/vista_secretaria.php");

 ?>
<script type="text/javascript">alert('Empleado Registrado correctamente');</script>
<?php
break;


case 3:
require_once("../modelo/validarpaciente.php");//llamamos a este para insertar un nuevo paciente

$datospaciente=new ValidarPaciente();//asociamos el objeto datosempleado y llama la clase ValidarEmpleado

$datospaciente->setDocumento($_REQUEST['documento']);//asociamos el objeto datosempleadp con cada variable
$datospaciente->setNombres($_REQUEST['nombres']);
$datospaciente->setApellidos($_REQUEST['apellidos']);
$datospaciente->setCelular($_REQUEST['celular']);
$datospaciente->setTelefono($_REQUEST['telefono']);
$datospaciente->setDireccion($_REQUEST['direccion']);
$datospaciente->setEps($_REQUEST['eps']);
$datospaciente->setEstado_Civil($_REQUEST['estado_civil']);
$datospaciente->setOcupacion($_REQUEST['ocupacion']);
$datospaciente->setFecha_Ingreso($_REQUEST['fecha_ingreso']);
$datospaciente->setFecha_Nacimiento($_REQUEST['fecha_nacimiento']);
$datospaciente->setAcompañante($_REQUEST['acompañante']);
$datospaciente->setReligion($_REQUEST['religion']);

$nombre = $_FILES['paci_foto']['name'];
$nombrer = strtolower($nombre);
$cd=$_FILES['paci_foto']['tmp_name'];
$ruta = "../vista/fotos/" . $_FILES['paci_foto']['name'];
$destino = "../vista/fotos/".$nombrer;
$resultado = @move_uploaded_file($_FILES["paci_foto"]["tmp_name"], $ruta);

$datospaciente->setFoto($destino);


$datospaciente->setProfesion($_REQUEST['profesion']);

$datospaciente->insertarPaciente();//funcion empleado de validarempleado.php

require_once("../vista/vista_secretaria.php");

 ?>
<script type="text/javascript">alert('Paciente Registrado Correctamente');</script>
<?php
break;


case  4:

require_once("../vista/medico/tablalistarM.php");//para editar pacientes despues de listados

break;


case 5:

require_once("../modelo/ValidarDatosMedico.php");//para editar pacientes despues de listados


$datohistoriaM=new ValidarDatosM();

$datohistoriaM->setHcg_id($_REQUEST['hcg_id']);
$datohistoriaM->setHcg_fecha($_REQUEST['hcg_fecha']);
$datohistoriaM->setHcg_motivo_consulta($_REQUEST['hcg_motivo_consulta']);
$datohistoriaM->setHcg_enfermedad_actual($_REQUEST['hcg_enfermedad_actual']);
$datohistoriaM->setHcg_revision_sistemas($_REQUEST['hcg_revision_sistemas']);
$datohistoriaM->setHcg_examen_fisico($_REQUEST['hcg_examen_fisico']);
$datohistoriaM->setHcg_diagnostico($_REQUEST['hcg_diagnostico']);
$datohistoriaM->setHcg_plan($_REQUEST['hcg_plan']);
$datohistoriaM->setPaci_doc($_REQUEST['paci_doc']);
$datohistoriaM->setEmpl_doc($_REQUEST['empl_doc']);

$datohistoriaM->InsertarHistoriaM();


require_once("../vista/medico/vista_medico.php");
?>
<script type="text/javascript">alert('Datos Guardados Correctamente');</script>
<?php
 
break;


case 6:
require_once("../vista/medico/tablalistarHCG.php");//para editar pacientes despues de listados

break;



case 7:

require_once("../modelo/ValidarDatosMedico.php");//para editar pacientes despues de listados

$datoeditarhistoriaM=new ValidarDatosM();

$datoeditarhistoriaM->setHcg_id($_REQUEST['hcg_id']);
$datoeditarhistoriaM->setHcg_fecha($_REQUEST['hcg_fecha']);
$datoeditarhistoriaM->setHcg_motivo_consulta($_REQUEST['hcg_motivo_consulta']);
$datoeditarhistoriaM->setHcg_enfermedad_actual($_REQUEST['hcg_enfermedad_actual']);
$datoeditarhistoriaM->setHcg_revision_sistemas($_REQUEST['hcg_revision_sistemas']);
$datoeditarhistoriaM->setHcg_examen_fisico($_REQUEST['hcg_examen_fisico']);
$datoeditarhistoriaM->setHcg_diagnostico($_REQUEST['hcg_diagnostico']);
$datoeditarhistoriaM->setHcg_plan($_REQUEST['hcg_plan']);
$datoeditarhistoriaM->setPaci_doc($_REQUEST['paci_doc']);
$datoeditarhistoriaM->setEmpl_doc($_REQUEST['empl_doc']);



$datoeditarhistoriaM->ModificarHistoriaM();

require_once("../vista/medico/vista_medico.php");
?>
<script type="text/javascript">alert('Datos Modificados correctamente');</script>
<?php

break;
//------------------------------------------------------------------------

case 8:
require_once("../vista/formulariopaciente2.php");

break;

case 9:
require_once("../vista/formularioempleado.php");

break;

//-------------------------------------------------------------------------

case 10:
require_once("../vista/medico/tablalistarSM.php");

break;


case 11:

require_once("../modelo/ValidarDatosMedico.php");


$datoseguimiento=new ValidarDatosM();

$datoseguimiento->setSm_id($_REQUEST['sm_id']);

$datoseguimiento->setSm_fecha($_REQUEST['sm_fecha']);

$datoseguimiento->setSm_descripcion($_REQUEST['sm_descripcion']);

$datoseguimiento->setEmpl_doc($_REQUEST['empl_doc']);

$datoseguimiento->setHcg_id($_REQUEST['hcg_id']);


$datoseguimiento->InsertarSeguimientoM();

 require_once("../vista/medico/vista_medico.php");

 ?>
<script type="text/javascript">alert('Seguimiento Guardado Correctamente');</script>
<?php


break;


case 12:

require_once("../modelo/ValidarDatosMedico.php");//para editar pacientes despues de listados


$datoseguimientoM=new ValidarDatosM();

$datoseguimientoM->setSm_id($_REQUEST['sm_id']);

$datoseguimientoM->setSm_fecha($_REQUEST['sm_fecha']);

$datoseguimientoM->setSm_descripcion($_REQUEST['sm_descripcion']);

$datoseguimientoM->setEmpl_doc($_REQUEST['empl_doc']);

$datoseguimientoM->setHcg_id($_REQUEST['hcg_id']);


$datoseguimientoM->ModificarSeguimientoM();

 require_once("../vista/medico/vista_medico.php");
 ?>
<script type="text/javascript">alert('Seguimiento Modificado Correctamente');</script>
<?php
break;


case 13:

require_once("../vista/medico/FormularioDatosPersonales.php");

break;


case 14:




require_once("../modelo/ValidarDatosMedico.php");

                                     
$datopersonales=new ValidarDatosM();
$datopersonales->setEmpl_doc($_REQUEST['empl_doc']);
$datopersonales->setEmpl_nom($_REQUEST['empl_nom']);
$datopersonales->setEmpl_ape($_REQUEST['empl_ape']);
$datopersonales->setEmpl_cel($_REQUEST['empl_cel']);
$datopersonales->setEmpl_tel($_REQUEST['empl_tel']);
$datopersonales->setEmpl_dir($_REQUEST['empl_dir']);
$datopersonales->setAcce_perfil($_REQUEST['acce_perfil']);
$datopersonales->setAcce_usuario($_REQUEST['acce_usuario']);
$datopersonales->setAcce_clave($_REQUEST['acce_clave']);

$datopersonales->ModificarDatosPersonales();

require_once("../vista/medico/vista_medico.php");

 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php

break;





//----------------------------------------------------------------------------

case 15:

require_once("../vista/administrador/tablalistarPACIA.php");

break;


//-----------------------------------------------------------------------


case 17:


require_once("../modelo/ValidarDatosAdmin.php");


$datohistoriaA=new ValidarDatosA();

$datohistoriaA->setEmpl_doc($_REQUEST['empl_doc']);
$datohistoriaA->setEmpl_nom($_REQUEST['empl_nom']);
$datohistoriaA->setEmpl_ape($_REQUEST['empl_ape']);
$datohistoriaA->setEmpl_cel($_REQUEST['empl_cel']);
$datohistoriaA->setEmpl_tel($_REQUEST['empl_tel']);
$datohistoriaA->setEmpl_dir($_REQUEST['empl_dir']);
$datohistoriaA->setEmpl_esc($_REQUEST['empl_esc']);
$datohistoriaA->setEmpl_perfil($_REQUEST['empl_perfil']);
$datohistoriaA->setEmpl_fecha_ing($_REQUEST['empl_fecha_ing']);
$datohistoriaA->setEmpl_fecha_nac($_REQUEST['empl_fecha_nac']);
$datohistoriaA->setEmpl_foto($_REQUEST['empl_foto']);

$datohistoriaA->ModificarDatosEmpleadoA();


$datohistoriaA->setAcce_id($_REQUEST['acce_id']);
$datohistoriaA->setAcce_usuario($_REQUEST['acce_usuario']);
$datohistoriaA->setAcce_clave($_REQUEST['acce_clave']);
$datohistoriaA->setAcce_perfil($_REQUEST['acce_perfil']);
$datohistoriaA->setAcce_estado($_REQUEST['acce_estado']);


$datohistoriaA->ModificarDatosAceesoA();

 require_once("../vista/administrador/vista_administrador.php");
 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php

break;
//--------------------------------------------------------

case 18:

require_once("../vista/FormularioDatosPersonales.php");

break;


case 19:

require_once("../modelo/ValidarDatosSecretaria.php");
                                  
$datopersonales=new ValidarDatosS();
$datopersonales->setEmpl_doc($_REQUEST['empl_doc']);
$datopersonales->setEmpl_nom($_REQUEST['empl_nom']);
$datopersonales->setEmpl_ape($_REQUEST['empl_ape']);
$datopersonales->setEmpl_cel($_REQUEST['empl_cel']);
$datopersonales->setEmpl_tel($_REQUEST['empl_tel']);
$datopersonales->setEmpl_dir($_REQUEST['empl_dir']);
$datopersonales->setAcce_perfil($_REQUEST['acce_perfil']);
$datopersonales->setAcce_usuario($_REQUEST['acce_usuario']);
$datopersonales->setAcce_clave($_REQUEST['acce_clave']);

$datopersonales->ModificarDatosPersonales();

require_once("../vista/vista_secretaria.php");
 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php

break;


//------------------------------------------------------------

case 21:

require_once("../modelo/validarempleado.php");//para editar empleados despues de listados

$datosempleado = new ValidarEmpleado(); 

$datosempleado->setEmpl_doc($_REQUEST['documento']);//asociamos el objeto datosempleadp con cada variable
$datosempleado->setEmpl_nom($_REQUEST['nombres']);
$datosempleado->setEmpl_ape($_REQUEST['apellidos']);
$datosempleado->setEmpl_cel($_REQUEST['celular']);
$datosempleado->setEmpl_tel($_REQUEST['telefono']);
$datosempleado->setEmpl_dir($_REQUEST['direccion']);
$datosempleado->setEmpl_esc($_REQUEST['estado_civil']);
$datosempleado->setEmpl_perfil($_REQUEST['perfil']);
$datosempleado->setEmpl_fecha_ing($_REQUEST['fecha_ingreso']);
$datosempleado->setEmpl_fecha_nac($_REQUEST['fecha_nacimiento']);

if($_FILES['foto2']['name']){
	 

$nombre = $_FILES['foto2']['name'];
$nombrer = strtolower($nombre);
$cd=$_FILES['foto2']['tmp_name'];
$ruta = "../vista/fotos/" . $_FILES['foto2']['name'];
$destino = "../vista/fotos/".$nombrer;
$resultado = @move_uploaded_file($_FILES["foto2"]["tmp_name"], $ruta);

$datosempleado->setEmpl_foto($destino);
}

else{
$datosempleado->setEmpl_foto($_REQUEST['foto']);

}



$datosempleado->editarEmpleado();

 require_once("../vista/vista_secretaria.php");

  ?>
<script type="text/javascript">alert('Empleado Modificado Correctamente');</script>
<?php

break;


case 22:

require_once("../modelo/validarpaciente.php");//para editar pacientes despues de listados

$datospaciente = new ValidarPaciente(); 

$datospaciente->setPaci_doc($_REQUEST['documento']);//asociamos el objeto datosempleadp con cada variable
$datospaciente->setPaci_nom($_REQUEST['nombres']);
$datospaciente->setPaci_ape($_REQUEST['apellidos']);
$datospaciente->setPaci_cel($_REQUEST['celular']);
$datospaciente->setPaci_tel($_REQUEST['telefono']);
$datospaciente->setPaci_dir($_REQUEST['direccion']);
$datospaciente->setPaci_eps($_REQUEST['eps']);
$datospaciente->setPaci_esc($_REQUEST['estado_civil']);
$datospaciente->setPaci_ocu($_REQUEST['ocupacion']);
$datospaciente->setPaci_fecha_ing($_REQUEST['fecha_ingreso']);
$datospaciente->setPaci_fecha_nac($_REQUEST['fecha_nacimiento']);
$datospaciente->setPaci_aco($_REQUEST['acompañante']);
$datospaciente->setPaci_rel($_REQUEST['religion']);



if($_FILES['foto2']['name']){
	 

$nombre = $_FILES['foto2']['name'];
$nombrer = strtolower($nombre);
$cd=$_FILES['foto2']['tmp_name'];
$ruta = "../vista/fotos/" . $_FILES['foto2']['name'];
$destino = "../vista/fotos/".$nombrer;
$resultado = @move_uploaded_file($_FILES["foto2"]["tmp_name"], $ruta);

$datospaciente->setPaci_foto($destino);
}

else{
$datospaciente->setPaci_foto($_REQUEST['foto']);

}









$datospaciente->setPaci_pro($_REQUEST['profesion']);

$datospaciente->editarPaciente();

 require_once("../vista/vista_secretaria.php");

  ?>
<script type="text/javascript">alert('Paciente Modificado Correctamente');</script>
<?php

break;


//---------------------------------------------------------------------------

case 25:

require_once("../vista/psiquiatra/tablalistar.php");//para editar pacientes despues de listados


break;


case 26:

require_once("../modelo/ValidarDatosPsiquiatra.php");//para editar pacientes despues de listados


$datohistoriaSQ=new ValidarDatosSQ();

$datohistoriaSQ->setHcq_id($_REQUEST['hcq_id']);
$datohistoriaSQ->setHcq_fecha($_REQUEST['hcq_fecha']);
$datohistoriaSQ->setHcq_mot_consulta($_REQUEST['hcq_mot_consulta']);
$datohistoriaSQ->setHcq_enf_actual($_REQUEST['hcq_enf_actual']);
$datohistoriaSQ->setHcq_dat_posnatales($_REQUEST['hcq_dat_posnatales']);
$datohistoriaSQ->setHcq_des_psicoevolutivo($_REQUEST['hcq_des_psicoevolutivo']);
$datohistoriaSQ->setHcq_infancia($_REQUEST['hcq_infancia']);
$datohistoriaSQ->setHcq_adolescencia($_REQUEST['hcq_adolescencia']);
$datohistoriaSQ->setHcq_vid_adulta($_REQUEST['hcq_vid_adulta']);
$datohistoriaSQ->setHcq_escolaridad($_REQUEST['hcq_escolaridad']);
$datohistoriaSQ->setHcq_hab_psicobiologicos($_REQUEST['hcq_hab_psicobiologicos']);
$datohistoriaSQ->setHcq_sexualidad($_REQUEST['hcq_sexualidad']);
$datohistoriaSQ->setHcq_ant_patologicos($_REQUEST['hcq_ant_patologicos']);
$datohistoriaSQ->setHcq_ant_psiquiatricos($_REQUEST['hcq_ant_psiquiatricos']);
$datohistoriaSQ->setHcq_exa_fisico($_REQUEST['hcq_exa_fisico']);
$datohistoriaSQ->setHcq_exa_mental($_REQUEST['hcq_exa_mental']);
$datohistoriaSQ->setHcq_diagnostico($_REQUEST['hcq_diagnostico']);
$datohistoriaSQ->setHcq_pla_terapeutico($_REQUEST['hcq_pla_terapeutico']);
$datohistoriaSQ->setPaci_doc($_REQUEST['paci_doc']);
$datohistoriaSQ->setEmpl_doc($_REQUEST['empl_doc']);

$datohistoriaSQ->InsertarHistoriaSQ();

require_once("../vista/psiquiatra/vista_psiquiatra.php");

 ?>
<script type="text/javascript">alert('Datos Guardados Correctamente');</script>
<?php
break;


case 27:

require_once("../vista/psiquiatra/tablalistarHCPQ.php");//para editar pacientes despues de listados


break;

case 28:

require_once("../modelo/ValidarDatosPsiquiatra.php");//para editar pacientes despues de listados

$datoeditarhistoriaSQ=new ValidarDatosSQ();

$datoeditarhistoriaSQ->setHcq_id($_REQUEST['hcq_id']);
$datoeditarhistoriaSQ->setHcq_fecha($_REQUEST['hcq_fecha']);
$datoeditarhistoriaSQ->setHcq_mot_consulta($_REQUEST['hcq_mot_consulta']);
$datoeditarhistoriaSQ->setHcq_enf_actual($_REQUEST['hcq_enf_actual']);
$datoeditarhistoriaSQ->setHcq_dat_posnatales($_REQUEST['hcq_dat_posnatales']);
$datoeditarhistoriaSQ->setHcq_des_psicoevolutivo($_REQUEST['hcq_des_psicoevolutivo']);
$datoeditarhistoriaSQ->setHcq_infancia($_REQUEST['hcq_infancia']);
$datoeditarhistoriaSQ->setHcq_adolescencia($_REQUEST['hcq_adolescencia']);
$datoeditarhistoriaSQ->setHcq_vid_adulta($_REQUEST['hcq_vid_adulta']);
$datoeditarhistoriaSQ->setHcq_escolaridad($_REQUEST['hcq_escolaridad']);
$datoeditarhistoriaSQ->setHcq_hab_psicobiologicos($_REQUEST['hcq_hab_psicobiologicos']);
$datoeditarhistoriaSQ->setHcq_sexualidad($_REQUEST['hcq_sexualidad']);
$datoeditarhistoriaSQ->setHcq_ant_patologicos($_REQUEST['hcq_ant_patologicos']);
$datoeditarhistoriaSQ->setHcq_ant_psiquiatricos($_REQUEST['hcq_ant_psiquiatricos']);
$datoeditarhistoriaSQ->setHcq_exa_fisico($_REQUEST['hcq_exa_fisico']);
$datoeditarhistoriaSQ->setHcq_exa_mental($_REQUEST['hcq_exa_mental']);
$datoeditarhistoriaSQ->setHcq_diagnostico($_REQUEST['hcq_diagnostico']);
$datoeditarhistoriaSQ->setHcq_pla_terapeutico($_REQUEST['hcq_pla_terapeutico']);
$datoeditarhistoriaSQ->setPaci_doc($_REQUEST['paci_doc']);
$datoeditarhistoriaSQ->setEmpl_doc($_REQUEST['empl_doc']);

$datoeditarhistoriaSQ->ModificarHistoriaSQ();

require_once("../vista/psiquiatra/vista_psiquiatra.php");

 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php


break;



case 29:

require_once("../vista/psiquiatra/TablaListarSSQ.php");

break;



case 30:

require_once("../modelo/ValidarDatosPsiquiatra.php");


$datoseguimiento=new ValidarDatosSQ();

$datoseguimiento->setSpq_id($_REQUEST['spq_id']);

$datoseguimiento->setSpq_fecha($_REQUEST['spq_fecha']);

$datoseguimiento->setSpq_descripcion($_REQUEST['spq_descripcion']);

$datoseguimiento->setEmpl_doc($_REQUEST['empl_doc']);

$datoseguimiento->setHcq_id($_REQUEST['hcq_id']);


$datoseguimiento->InsertarSeguimientoSQ();

 require_once("../vista/psiquiatra/vista_psiquiatra.php");
 ?>
<script type="text/javascript">alert('Seguimiento Guardado Correctamente');</script>
<?php


break;


case 31:

require_once("../modelo/ValidarDatosPsiquiatra.php");//para editar pacientes despues de listados


$datoseguimientoSQ=new ValidarDatosSQ();

$datoseguimientoSQ->setSpq_id($_REQUEST['spq_id']);

$datoseguimientoSQ->setSpq_fecha($_REQUEST['spq_fecha']);

$datoseguimientoSQ->setSpq_descripcion($_REQUEST['spq_descripcion']);

$datoseguimientoSQ->setEmpl_doc($_REQUEST['empl_doc']);

$datoseguimientoSQ->setHcq_id($_REQUEST['hcq_id']);


$datoseguimientoSQ->ModificarSeguimientoSQ();

 require_once("../vista/psiquiatra/vista_psiquiatra.php");

  ?>
<script type="text/javascript">alert('Seguimiento Modificado Correctamente');</script>
<?php

break;


case 32:

require_once("../vista/psiquiatra/FormularioDatosPersonales.php");

break;




case 33:

require_once("../modelo/ValidarDatosPsiquiatra.php");

                                     
$datopersonales=new ValidarDatosSQ();


$datopersonales->setEmpl_doc($_REQUEST['empl_doc']);
$datopersonales->setEmpl_nom($_REQUEST['empl_nom']);
$datopersonales->setEmpl_ape($_REQUEST['empl_ape']);
$datopersonales->setEmpl_cel($_REQUEST['empl_cel']);
$datopersonales->setEmpl_tel($_REQUEST['empl_tel']);
$datopersonales->setEmpl_dir($_REQUEST['empl_dir']);
$datopersonales->setAcce_perfil($_REQUEST['acce_perfil']);
$datopersonales->setAcce_usuario($_REQUEST['acce_usuario']);
$datopersonales->setAcce_clave($_REQUEST['acce_clave']);
$datopersonales->ModificarDatosPersonales();

require_once("../vista/psiquiatra/vista_psiquiatra.php");
 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php


break;


case 34:

require_once("../vista/psiquiatra/reportes.php");

break;



case 35:

require_once("../vista/psicologo/tablalistarPAC.php");

break;



case 36:

require_once("../modelo/ValidarDatosPsicologo.php");//para editar pacientes despues de listados


$datohistoriaSP=new ValidarDatosSP();

$datohistoriaSP->setHcs_id($_REQUEST['hcs_id']);
$datohistoriaSP->setHcs_fecha($_REQUEST['hcs_fecha']);
$datohistoriaSP->setHcs_mot_consulta($_REQUEST['hcs_mot_consulta']);
$datohistoriaSP->setHcs_genograma($_REQUEST['hcs_genograma']);
$datohistoriaSP->setHcs_exa_mental($_REQUEST['hcs_exa_mental']);
$datohistoriaSP->setHcs_his_consumo($_REQUEST['hcs_his_consumo']);
$datohistoriaSP->setHcs_motivacion($_REQUEST['hcs_motivacion']);
$datohistoriaSP->setHcs_antecedentes($_REQUEST['hcs_antecedentes']);
$datohistoriaSP->setHcs_cognitiva($_REQUEST['hcs_cognitiva']);
$datohistoriaSP->setHcs_afectiva($_REQUEST['hcs_afectiva']);
$datohistoriaSP->setHcs_interpersonal($_REQUEST['hcs_interpersonal']);
$datohistoriaSP->setHcs_educacion($_REQUEST['hcs_educacion']);
$datohistoriaSP->setHcs_laboral($_REQUEST['hcs_laboral']);
$datohistoriaSP->setHcs_imp_diagnostica($_REQUEST['hcs_imp_diagnostica']);
$datohistoriaSP->setHcs_obj_terapeuticos($_REQUEST['hcs_obj_terapeuticos']);
$datohistoriaSP->setPaci_doc($_REQUEST['paci_doc']);
$datohistoriaSP->setEmpl_doc($_REQUEST['empl_doc']);

$datohistoriaSP->InsertarHistoriaSP();

require_once("../vista/psicologo/vista_psicologo.php");

 ?>
<script type="text/javascript">alert('Datos Guardados Correctamente');</script>
<?php

break;


case 37:

require_once("../vista/psicologo/tablalistarHCSP.php");//para editar pacientes despues de listados


break;


case 38:

require_once("../modelo/ValidarDatosPsicologo.php");//para editar pacientes despues de listados

$datoeditarhistoriaSP=new ValidarDatosSP();
$datoeditarhistoriaSP->setHcs_id($_REQUEST['hcs_id']);
$datoeditarhistoriaSP->setHcs_fecha($_REQUEST['hcs_fecha']);
$datoeditarhistoriaSP->setHcs_mot_consulta($_REQUEST['hcs_mot_consulta']);
$datoeditarhistoriaSP->setHcs_genograma($_REQUEST['hcs_genograma']);
$datoeditarhistoriaSP->setHcs_exa_mental($_REQUEST['hcs_exa_mental']);
$datoeditarhistoriaSP->setHcs_his_consumo($_REQUEST['hcs_his_consumo']);
$datoeditarhistoriaSP->setHcs_motivacion($_REQUEST['hcs_motivacion']);
$datoeditarhistoriaSP->setHcs_antecedentes($_REQUEST['hcs_antecedentes']);
$datoeditarhistoriaSP->setHcs_cognitiva($_REQUEST['hcs_cognitiva']);
$datoeditarhistoriaSP->setHcs_afectiva($_REQUEST['hcs_afectiva']);
$datoeditarhistoriaSP->setHcs_interpersonal($_REQUEST['hcs_interpersonal']);
$datoeditarhistoriaSP->setHcs_educacion($_REQUEST['hcs_educacion']);
$datoeditarhistoriaSP->setHcs_laboral($_REQUEST['hcs_laboral']);
$datoeditarhistoriaSP->setHcs_imp_diagnostica($_REQUEST['hcs_imp_diagnostica']);
$datoeditarhistoriaSP->setHcs_obj_terapeuticos($_REQUEST['hcs_obj_terapeuticos']);
$datoeditarhistoriaSP->setPaci_doc($_REQUEST['paci_doc']);
$datoeditarhistoriaSP->setEmpl_doc($_REQUEST['empl_doc']);

$datoeditarhistoriaSP->ModificarHistoriaSP();

require_once("../vista/psicologo/vista_psicologo.php");
 ?>
<script type="text/javascript">alert('Datos Modificados  Correctamente');</script>
<?php

break;



case 39:

require_once("../vista/psicologo/tablalistarSSP.php");//para editar pacientes despues de listados


break;


case 40:

require_once("../modelo/ValidarDatosPsicologo.php");


$datoseguimientoSP=new ValidarDatosSP();

$datoseguimientoSP->setSps_id($_REQUEST['sps_id']);

$datoseguimientoSP->setSps_fecha($_REQUEST['sps_fecha']);

$datoseguimientoSP->setSps_descripcion($_REQUEST['sps_descripcion']);

$datoseguimientoSP->setEmpl_doc($_REQUEST['empl_doc']);

$datoseguimientoSP->setHcs_id($_REQUEST['hcs_id']);


$datoseguimientoSP->InsertarSeguimientoSP();

 require_once("../vista/psicologo/vista_psicologo.php");

  ?>
<script type="text/javascript">alert('Seguimiento Guardado Correctamente');</script>
<?php

break;


case 41:

require_once("../modelo/ValidarDatosPsicologo.php");

$datoseguimientoSP=new ValidarDatosSP();
$datoseguimientoSP->setSps_id($_REQUEST['sps_id']);
$datoseguimientoSP->setSps_fecha($_REQUEST['sps_fecha']);
$datoseguimientoSP->setSps_descripcion($_REQUEST['sps_descripcion']);
$datoseguimientoSP->setEmpl_doc($_REQUEST['empl_doc']);
$datoseguimientoSP->setHcs_id($_REQUEST['hcs_id']);

$datoseguimientoSP->ModificarSeguimientoSP();

 require_once("../vista/psicologo/vista_psicologo.php");
 ?>
<script type="text/javascript">alert('Seguimiento Modificado Correctamente');</script>
<?php
break;


case 42:

require_once("../vista/psicologo/FormularioDatosPersonalesSP.php");

break;

case 43:

require_once("../modelo/ValidarDatosPsicologo.php");

                                     
$datopersonalesSP=new ValidarDatosSP();
$datopersonalesSP->setEmpl_doc($_REQUEST['empl_doc']);
$datopersonalesSP->setEmpl_nom($_REQUEST['empl_nom']);
$datopersonalesSP->setEmpl_ape($_REQUEST['empl_ape']);
$datopersonalesSP->setEmpl_cel($_REQUEST['empl_cel']);
$datopersonalesSP->setEmpl_tel($_REQUEST['empl_tel']);
$datopersonalesSP->setEmpl_dir($_REQUEST['empl_dir']);
$datopersonalesSP->setAcce_perfil($_REQUEST['acce_perfil']);
$datopersonalesSP->setAcce_usuario($_REQUEST['acce_usuario']);
$datopersonalesSP->setAcce_clave($_REQUEST['acce_clave']);
$datopersonalesSP->ModificarDatosPersonalesSP();

require_once("../vista/psicologo/vista_psicologo.php");

 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php
break;

//---------------------------------------------------------------------------------------------

case 44:

require_once("../vista/tsocial/tablalistarPACI.php");

break;

case 45:

require_once("../modelo/ValidarDatosTsocial.php");//para editar pacientes despues de listados

$datohistoriaTS=new ValidarDatosTS();

$datohistoriaTS->setHct_id($_REQUEST['hct_id']);
$datohistoriaTS->setHct_fecha($_REQUEST['hct_fecha']);
$datohistoriaTS->setHct_a($_REQUEST['hct_a']);
$datohistoriaTS->setHct_b($_REQUEST['hct_b']);
$datohistoriaTS->setHct_c($_REQUEST['hct_c']);
$datohistoriaTS->setHct_d($_REQUEST['hct_d']);
$datohistoriaTS->setHct_e($_REQUEST['hct_e']);
$datohistoriaTS->setHct_f($_REQUEST['hct_f']);
$datohistoriaTS->setHct_g($_REQUEST['hct_g']);
$datohistoriaTS->setHct_h($_REQUEST['hct_h']);
$datohistoriaTS->setHct_i($_REQUEST['hct_i']);
$datohistoriaTS->setHct_j($_REQUEST['hct_j']);
$datohistoriaTS->setHct_k($_REQUEST['hct_k']);
$datohistoriaTS->setHct_l($_REQUEST['hct_l']);
$datohistoriaTS->setHct_ll($_REQUEST['hct_ll']);
$datohistoriaTS->setHct_m($_REQUEST['hct_m']);
$datohistoriaTS->setHct_n($_REQUEST['hct_n']);
$datohistoriaTS->setHct_o($_REQUEST['hct_o']);
$datohistoriaTS->setHct_p($_REQUEST['hct_p']);
$datohistoriaTS->setHct_q($_REQUEST['hct_q']);
$datohistoriaTS->setHct_r($_REQUEST['hct_r']);
$datohistoriaTS->setHct_s($_REQUEST['hct_s']);
$datohistoriaTS->setHct_t($_REQUEST['hct_t']);
$datohistoriaTS->setHct_v($_REQUEST['hct_v']);
$datohistoriaTS->setHct_w($_REQUEST['hct_w']);
$datohistoriaTS->setHct_y($_REQUEST['hct_y']);
$datohistoriaTS->setHct_z($_REQUEST['hct_z']);
$datohistoriaTS->setHct_aa($_REQUEST['hct_aa']);
$datohistoriaTS->setHct_bb($_REQUEST['hct_bb']);
$datohistoriaTS->setHct_cc($_REQUEST['hct_cc']);
$datohistoriaTS->setHct_dd($_REQUEST['hct_dd']);
$datohistoriaTS->setHct_ee($_REQUEST['hct_ee']);
$datohistoriaTS->setHct_ff($_REQUEST['hct_ff']);
$datohistoriaTS->setHct_gg($_REQUEST['hct_gg']);
$datohistoriaTS->setHct_hh($_REQUEST['hct_hh']);
$datohistoriaTS->setHct_ii($_REQUEST['hct_ii']);
$datohistoriaTS->setHct_jj($_REQUEST['hct_jj']);
$datohistoriaTS->setHct_kk($_REQUEST['hct_kk']);
$datohistoriaTS->setHct_mm($_REQUEST['hct_mm']);
$datohistoriaTS->setHct_zz($_REQUEST['hct_zz']);
$datohistoriaTS->setPaci_doc($_REQUEST['paci_doc']);
$datohistoriaTS->setEmpl_doc($_REQUEST['empl_doc']);
  
$datohistoriaTS->InsertarHistoriaTS();

$fts_nombre=$_REQUEST['fts_nombre'];
$fts_apellido=$_REQUEST['fts_apellido'];
$fts_parentezco=$_REQUEST['fts_parentezco'];
$fts_edad=$_REQUEST['fts_edad'];
$fts_escolaridad=$_REQUEST['fts_escolaridad'];
$fts_ocupacion=$_REQUEST['fts_ocupacion'];
$fts_vive=$_REQUEST['fts_vive'];


$num=count($fts_nombre);

$i=0;

while ($i<$num){

$datohistoriaTS->setFts_nombre($fts_nombre[$i]);
$datohistoriaTS->setFts_apellido($fts_apellido[$i]);
$datohistoriaTS->setFts_parentezco($fts_parentezco[$i]);
$datohistoriaTS->setFts_edad($fts_edad[$i]);
$datohistoriaTS->setFts_escolaridad($fts_escolaridad[$i]);
$datohistoriaTS->setFts_ocupacion($fts_ocupacion[$i]);
$datohistoriaTS->setFts_vive($fts_vive[$i]);

$i++;

$datohistoriaTS->InsertaFamiliaTS();
}

require_once("../vista/tsocial/vista_tsocial.php");

 ?>
<script type="text/javascript">alert('Datos Guardados Correctamente');</script>
<?php

break;


case 46:

require_once("../vista/tsocial/tablalistarHCTS.php");

break;


case 47:


require_once("../modelo/ValidarDatosTsocial.php");

$datohistoriaTS=new ValidarDatosTS();

$datohistoriaTS->setHct_id($_REQUEST['hct_id']);
$datohistoriaTS->setHct_fecha($_REQUEST['hct_fecha']);
$datohistoriaTS->setHct_a($_REQUEST['hct_a']);
$datohistoriaTS->setHct_b($_REQUEST['hct_b']);
$datohistoriaTS->setHct_c($_REQUEST['hct_c']);
$datohistoriaTS->setHct_d($_REQUEST['hct_d']);
$datohistoriaTS->setHct_e($_REQUEST['hct_e']);
$datohistoriaTS->setHct_f($_REQUEST['hct_f']);
$datohistoriaTS->setHct_g($_REQUEST['hct_g']);
$datohistoriaTS->setHct_h($_REQUEST['hct_h']);
$datohistoriaTS->setHct_i($_REQUEST['hct_i']);
$datohistoriaTS->setHct_j($_REQUEST['hct_j']);
$datohistoriaTS->setHct_k($_REQUEST['hct_k']);
$datohistoriaTS->setHct_l($_REQUEST['hct_l']);
$datohistoriaTS->setHct_ll($_REQUEST['hct_ll']);
$datohistoriaTS->setHct_m($_REQUEST['hct_m']);
$datohistoriaTS->setHct_n($_REQUEST['hct_n']);
$datohistoriaTS->setHct_o($_REQUEST['hct_o']);
$datohistoriaTS->setHct_p($_REQUEST['hct_p']);
$datohistoriaTS->setHct_q($_REQUEST['hct_q']);
$datohistoriaTS->setHct_r($_REQUEST['hct_r']);
$datohistoriaTS->setHct_s($_REQUEST['hct_s']);
$datohistoriaTS->setHct_t($_REQUEST['hct_t']);
$datohistoriaTS->setHct_v($_REQUEST['hct_v']);
$datohistoriaTS->setHct_w($_REQUEST['hct_w']);
$datohistoriaTS->setHct_y($_REQUEST['hct_y']);
$datohistoriaTS->setHct_z($_REQUEST['hct_z']);
$datohistoriaTS->setHct_aa($_REQUEST['hct_aa']);
$datohistoriaTS->setHct_bb($_REQUEST['hct_bb']);
$datohistoriaTS->setHct_cc($_REQUEST['hct_cc']);
$datohistoriaTS->setHct_dd($_REQUEST['hct_dd']);
$datohistoriaTS->setHct_ee($_REQUEST['hct_ee']);
$datohistoriaTS->setHct_ff($_REQUEST['hct_ff']);
$datohistoriaTS->setHct_gg($_REQUEST['hct_gg']);
$datohistoriaTS->setHct_hh($_REQUEST['hct_hh']);
$datohistoriaTS->setHct_ii($_REQUEST['hct_ii']);
$datohistoriaTS->setHct_jj($_REQUEST['hct_jj']);
$datohistoriaTS->setHct_kk($_REQUEST['hct_kk']);
$datohistoriaTS->setHct_mm($_REQUEST['hct_mm']);
$datohistoriaTS->setHct_zz($_REQUEST['hct_zz']);
$datohistoriaTS->setPaci_doc($_REQUEST['paci_doc']);
$datohistoriaTS->setEmpl_doc($_REQUEST['empl_doc']);

  
$datohistoriaTS->ModificarDatosHistoriaTS();

$fts_id=$_REQUEST['fts_id'];
$fts_nombre=$_REQUEST['fts_nombre'];
$fts_apellido=$_REQUEST['fts_apellido'];
$fts_parentezco=$_REQUEST['fts_parentezco'];
$fts_edad=$_REQUEST['fts_edad'];
$fts_escolaridad=$_REQUEST['fts_escolaridad'];
$fts_ocupacion=$_REQUEST['fts_ocupacion'];
$fts_vive=$_REQUEST['fts_vive'];


$num1=count($fts_nombre);

$j=0;

while ($j<$num1){
 
$datohistoriaTS->setFts_id($fts_id[$j]);

$datohistoriaTS->setFts_nombre($fts_nombre[$j]);

$datohistoriaTS->setFts_apellido($fts_apellido[$j]);

$datohistoriaTS->setFts_parentezco($fts_parentezco[$j]);

$datohistoriaTS->setFts_edad($fts_edad[$j]);

$datohistoriaTS->setFts_escolaridad($fts_escolaridad[$j]);

$datohistoriaTS->setFts_ocupacion($fts_ocupacion[$j]);

$datohistoriaTS->setFts_vive($fts_vive[$j]);

$j++;


$datohistoriaTS->ModificarDatosFamiliaTS();
}

 require_once("../vista/tsocial/vista_tsocial.php");
 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php

break;



case 48:

require_once("../vista/tsocial/tablalistarSTS.php");

break;


case 49:

require_once("../modelo/ValidarDatosTsocial.php");


$datoseguimientoTS=new ValidarDatosTS();
$datoseguimientoTS->setSts_id($_REQUEST['sts_id']);
$datoseguimientoTS->setSts_fecha($_REQUEST['sts_fecha']);
$datoseguimientoTS->setSts_descripcion($_REQUEST['sts_descripcion']);
$datoseguimientoTS->setEmpl_doc($_REQUEST['empl_doc']);
$datoseguimientoTS->setHct_id($_REQUEST['hct_id']);
$datoseguimientoTS->InsertarSeguimientoTS();

 require_once("../vista/tsocial/vista_tsocial.php");
 ?>
<script type="text/javascript">alert('Seguimiento Guardado Correctamente');</script>
<?php
break;


case 50:

require_once("../modelo/ValidarDatosTsocial.php");

$datoseguimientoTS=new ValidarDatosTS();
$datoseguimientoTS->setSts_id($_REQUEST['sts_id']);
$datoseguimientoTS->setSts_fecha($_REQUEST['sts_fecha']);
$datoseguimientoTS->setSts_descripcion($_REQUEST['sts_descripcion']);
$datoseguimientoTS->setEmpl_doc($_REQUEST['empl_doc']);
$datoseguimientoTS->setHct_id($_REQUEST['hct_id']);

$datoseguimientoTS->ModificarSeguimientoTS();

 require_once("../vista/tsocial/vista_tsocial.php");

  ?>
<script type="text/javascript">alert('Seguimiento Modificado Correctamente');</script>
<?php

break;


case 51:

require_once("../vista/tsocial/FormularioDatosPersonalesTS.php");

break;

case 52:

require_once("../modelo/ValidarDatosTsocial.php");

                                     
$datopersonalesTS=new ValidarDatosTS();
$datopersonalesTS->setEmpl_doc($_REQUEST['empl_doc']);
$datopersonalesTS->setEmpl_nom($_REQUEST['empl_nom']);
$datopersonalesTS->setEmpl_ape($_REQUEST['empl_ape']);
$datopersonalesTS->setEmpl_cel($_REQUEST['empl_cel']);
$datopersonalesTS->setEmpl_tel($_REQUEST['empl_tel']);
$datopersonalesTS->setEmpl_dir($_REQUEST['empl_dir']);
$datopersonalesTS->setAcce_perfil($_REQUEST['acce_perfil']);
$datopersonalesTS->setAcce_usuario($_REQUEST['acce_usuario']);
$datopersonalesTS->setAcce_clave($_REQUEST['acce_clave']);


$datopersonalesTS->ModificarDatosPersonalesTS();

require_once("../vista/tsocial/vista_tsocial.php");

 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php
break;



case 53:

require_once("../vista/nutricionista/tablalistarPACIN.php");

break;


case 54:

require_once("../modelo/ValidarDatosNutricionista.php");


$datohistoriaN=new ValidarDatosN();

$datohistoriaN->setHcn_id($_REQUEST['hcn_id']);
$datohistoriaN->setHcn_fecha($_REQUEST['hcn_fecha']);
$datohistoriaN->setHcn_pesoa($_REQUEST['hcn_pesoa']);
$datohistoriaN->setHcn_pesou($_REQUEST['hcn_pesou']);
$datohistoriaN->setHcn_talla($_REQUEST['hcn_talla']);
$datohistoriaN->setHcn_cintura($_REQUEST['hcn_cintura']);
$datohistoriaN->setHcn_cadera($_REQUEST['hcn_cadera']);
$datohistoriaN->setHcn_muneca($_REQUEST['hcn_muneca']);
$datohistoriaN->setHcn_mcorporal($_REQUEST['hcn_mcorporal']);
$datohistoriaN->setHcn_habito($_REQUEST['hcn_habito']);
$datohistoriaN->setHcn_actividad($_REQUEST['hcn_actividad']);
$datohistoriaN->setHcn_liquidos($_REQUEST['hcn_liquidos']);
$datohistoriaN->setHcn_alimentos($_REQUEST['hcn_alimentos']);
$datohistoriaN->setHcn_gastritis($_REQUEST['hcn_gastritis']);
$datohistoriaN->setHcn_colon($_REQUEST['hcn_colon']);
$datohistoriaN->setHcn_reflujo($_REQUEST['hcn_reflujo']);
$datohistoriaN->setHcn_enfermedad($_REQUEST['hcn_enfermedad']);
$datohistoriaN->setHcn_azucares($_REQUEST['hcn_azucares']);
$datohistoriaN->setHcn_grasas($_REQUEST['hcn_grasas']);
$datohistoriaN->setHcn_cafe($_REQUEST['hcn_cafe']);
$datohistoriaN->setHcn_alcohol($_REQUEST['hcn_alcohol']);
$datohistoriaN->setHcn_condimentos($_REQUEST['hcn_condimentos']);
$datohistoriaN->setHcn_sal($_REQUEST['hcn_sal']);
$datohistoriaN->setHcn_lacteos($_REQUEST['hcn_lacteos']);
$datohistoriaN->setHcn_proteicos($_REQUEST['hcn_proteicos']);
$datohistoriaN->setHcn_frutas($_REQUEST['hcn_frutas']);
$datohistoriaN->setHcn_hortalizas($_REQUEST['hcn_hortalizas']);
$datohistoriaN->setHcn_gaseosas($_REQUEST['hcn_gaseosas']);
$datohistoriaN->setHcn_desayuno($_REQUEST['hcn_desayuno']);
$datohistoriaN->setHcn_onces($_REQUEST['hcn_onces']);
$datohistoriaN->setHcn_almuerzo($_REQUEST['hcn_almuerzo']);
$datohistoriaN->setHcn_tarde($_REQUEST['hcn_tarde']);
$datohistoriaN->setHcn_comida($_REQUEST['hcn_comida']);
$datohistoriaN->setHcn_refrigerio($_REQUEST['hcn_refrigerio']);
$datohistoriaN->setHcn_diagnostico($_REQUEST['hcn_diagnostico']);
$datohistoriaN->setPaci_doc($_REQUEST['paci_doc']);
$datohistoriaN->setEmpl_doc($_REQUEST['empl_doc']);

$datohistoriaN->InsertarHistoriaN();

 require_once("../vista/nutricionista/vista_nutricionista.php");

  ?>
<script type="text/javascript">alert('Datos Guardados Correctamente');</script>
<?php

break;



case 55:

require_once("../vista/nutricionista/tablalistarHCN.php");

break;


case 56:

require_once("../modelo/ValidarDatosNutricionista.php");//para editar pacientes despues de listados

$datoeditarhistoriaN=new ValidarDatosN();
$datoeditarhistoriaN->setHcn_id($_REQUEST['hcn_id']);
$datoeditarhistoriaN->setHcn_fecha($_REQUEST['hcn_fecha']);
$datoeditarhistoriaN->setHcn_pesoa($_REQUEST['hcn_pesoa']);
$datoeditarhistoriaN->setHcn_pesou($_REQUEST['hcn_pesou']);
$datoeditarhistoriaN->setHcn_talla($_REQUEST['hcn_talla']);
$datoeditarhistoriaN->setHcn_cintura($_REQUEST['hcn_cintura']);
$datoeditarhistoriaN->setHcn_cadera($_REQUEST['hcn_cadera']);
$datoeditarhistoriaN->setHcn_muneca($_REQUEST['hcn_muneca']);
$datoeditarhistoriaN->setHcn_mcorporal($_REQUEST['hcn_mcorporal']);
$datoeditarhistoriaN->setHcn_habito($_REQUEST['hcn_habito']);
$datoeditarhistoriaN->setHcn_actividad($_REQUEST['hcn_actividad']);
$datoeditarhistoriaN->setHcn_liquidos($_REQUEST['hcn_liquidos']);
$datoeditarhistoriaN->setHcn_alimentos($_REQUEST['hcn_alimentos']);
$datoeditarhistoriaN->setHcn_gastritis($_REQUEST['hcn_gastritis']);
$datoeditarhistoriaN->setHcn_colon($_REQUEST['hcn_colon']);
$datoeditarhistoriaN->setHcn_reflujo($_REQUEST['hcn_reflujo']);
$datoeditarhistoriaN->setHcn_enfermedad($_REQUEST['hcn_enfermedad']);
$datoeditarhistoriaN->setHcn_azucares($_REQUEST['hcn_azucares']);
$datoeditarhistoriaN->setHcn_grasas($_REQUEST['hcn_grasas']);
$datoeditarhistoriaN->setHcn_cafe($_REQUEST['hcn_cafe']);
$datoeditarhistoriaN->setHcn_alcohol($_REQUEST['hcn_alcohol']);
$datoeditarhistoriaN->setHcn_condimentos($_REQUEST['hcn_condimentos']);
$datoeditarhistoriaN->setHcn_sal($_REQUEST['hcn_sal']);
$datoeditarhistoriaN->setHcn_lacteos($_REQUEST['hcn_lacteos']);
$datoeditarhistoriaN->setHcn_proteicos($_REQUEST['hcn_proteicos']);
$datoeditarhistoriaN->setHcn_frutas($_REQUEST['hcn_frutas']);
$datoeditarhistoriaN->setHcn_hortalizas($_REQUEST['hcn_hortalizas']);
$datoeditarhistoriaN->setHcn_gaseosas($_REQUEST['hcn_gaseosas']);
$datoeditarhistoriaN->setHcn_desayuno($_REQUEST['hcn_desayuno']);
$datoeditarhistoriaN->setHcn_onces($_REQUEST['hcn_onces']);
$datoeditarhistoriaN->setHcn_almuerzo($_REQUEST['hcn_almuerzo']);
$datoeditarhistoriaN->setHcn_tarde($_REQUEST['hcn_tarde']);
$datoeditarhistoriaN->setHcn_comida($_REQUEST['hcn_comida']);
$datoeditarhistoriaN->setHcn_refrigerio($_REQUEST['hcn_refrigerio']);
$datoeditarhistoriaN->setHcn_diagnostico($_REQUEST['hcn_diagnostico']);
$datoeditarhistoriaN->setPaci_doc($_REQUEST['paci_doc']);
$datoeditarhistoriaN->setEmpl_doc($_REQUEST['empl_doc']);

$datoeditarhistoriaN->ModificarHistoriaN();

require_once("../vista/nutricionista/vista_nutricionista.php");

 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php

break;

case 57:

require_once("../vista/nutricionista/tablalistarSN.php");

break;



case 58:

require_once("../modelo/ValidarDatosNutricionista.php");


$datoseguimientoN=new ValidarDatosN();

$datoseguimientoN->setSn_id($_REQUEST['sn_id']);
$datoseguimientoN->setSn_fecha($_REQUEST['sn_fecha']);
$datoseguimientoN->setSn_descripcion($_REQUEST['sn_descripcion']);
$datoseguimientoN->setEmpl_doc($_REQUEST['empl_doc']);
$datoseguimientoN->setHcn_id($_REQUEST['hcn_id']);

$datoseguimientoN->InsertarSeguimientoN();

 require_once("../vista/nutricionista/vista_nutricionista.php");

  ?>
<script type="text/javascript">alert('Seguimiento Guardado Correctamente');</script>
<?php

break;



case 59:

require_once("../modelo/ValidarDatosNutricionista.php");


$datoseguimientoN=new ValidarDatosN();

$datoseguimientoN->setSn_id($_REQUEST['sn_id']);
$datoseguimientoN->setSn_fecha($_REQUEST['sn_fecha']);
$datoseguimientoN->setSn_descripcion($_REQUEST['sn_descripcion']);
$datoseguimientoN->setEmpl_doc($_REQUEST['empl_doc']);
$datoseguimientoN->setHcn_id($_REQUEST['hcn_id']);

$datoseguimientoN->ModificarSeguimientoN();

 require_once("../vista/nutricionista/vista_nutricionista.php");

  ?>
<script type="text/javascript">alert('Seguimiento Modificado Correctamente');</script>
<?php

break;


case 60:

require_once("../vista/nutricionista/FormularioDatosPersonalesN.php");

break;

case 61:

require_once("../modelo/ValidarDatosNutricionista.php");

                                     
$datopersonalesN=new ValidarDatosN();
$datopersonalesN->setEmpl_doc($_REQUEST['empl_doc']);
$datopersonalesN->setEmpl_nom($_REQUEST['empl_nom']);
$datopersonalesN->setEmpl_ape($_REQUEST['empl_ape']);
$datopersonalesN->setEmpl_cel($_REQUEST['empl_cel']);
$datopersonalesN->setEmpl_tel($_REQUEST['empl_tel']);
$datopersonalesN->setEmpl_dir($_REQUEST['empl_dir']);
$datopersonalesN->setAcce_perfil($_REQUEST['acce_perfil']);
$datopersonalesN->setAcce_usuario($_REQUEST['acce_usuario']);
$datopersonalesN->setAcce_clave($_REQUEST['acce_clave']);
$datopersonalesN->ModificarDatosPersonalesN();

require_once("../vista/nutricionista/vista_nutricionista.php");

 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php
break;

//--------------------------------------------------------------------------------------------
case 62:

require_once("../vista/terapeuta/tablalistarPACIT.php");

break;



case 63:

require_once("../modelo/ValidarDatosTerapeuta.php");//para editar pacientes despues de listados


$datohistoriaT=new ValidarDatosT();

$datohistoriaT->setHco_id($_REQUEST['hco_id']);
$datohistoriaT->setHco_fecha($_REQUEST['hco_fecha']);
$datohistoriaT->setHco_escolaridad($_REQUEST['hco_escolaridad']);
$datohistoriaT->setHco_desescolarizacion($_REQUEST['hco_desescolarizacion']);
$datohistoriaT->setHco_institucion($_REQUEST['hco_institucion']);
$datohistoriaT->setHco_programa($_REQUEST['hco_programa']);
$datohistoriaT->setHco_rutina($_REQUEST['hco_rutina']);
$datohistoriaT->setHco_roles($_REQUEST['hco_roles']);
$datohistoriaT->setHco_actividad($_REQUEST['hco_actividad']);
$datohistoriaT->setHco_eventos($_REQUEST['hco_eventos']);
$datohistoriaT->setHco_ambientales($_REQUEST['hco_ambientales']);
$datohistoriaT->setHco_a($_REQUEST['hco_a']);
$datohistoriaT->setHco_b($_REQUEST['hco_b']);
$datohistoriaT->setHco_c($_REQUEST['hco_c']);
$datohistoriaT->setHco_d($_REQUEST['hco_d']);
$datohistoriaT->setHco_e($_REQUEST['hco_e']);
$datohistoriaT->setHco_f($_REQUEST['hco_f']);
$datohistoriaT->setHco_g($_REQUEST['hco_g']);
$datohistoriaT->setHco_h($_REQUEST['hco_h']);
$datohistoriaT->setHco_i($_REQUEST['hco_i']);
$datohistoriaT->setHco_j($_REQUEST['hco_j']);
$datohistoriaT->setHco_k($_REQUEST['hco_k']);
 $datohistoriaT->setHco_l($_REQUEST['hco_l']);
 $datohistoriaT->setHco_m($_REQUEST['hco_m']);
 $datohistoriaT->setHco_n($_REQUEST['hco_n']);
 $datohistoriaT->setHco_o($_REQUEST['hco_o']);
 $datohistoriaT->setHco_p($_REQUEST['hco_p']);
 $datohistoriaT->setHco_q($_REQUEST['hco_q']);
 $datohistoriaT->setHco_r($_REQUEST['hco_r']);
 $datohistoriaT->setHco_s($_REQUEST['hco_s']);
 $datohistoriaT->setHco_t($_REQUEST['hco_t']);
 $datohistoriaT->setHco_u($_REQUEST['hco_u']);
 $datohistoriaT->setHco_v($_REQUEST['hco_v']);
 $datohistoriaT->setHco_w($_REQUEST['hco_w']);
 $datohistoriaT->setHco_x($_REQUEST['hco_x']);
 $datohistoriaT->setHco_y($_REQUEST['hco_y']);
 $datohistoriaT->setHco_z($_REQUEST['hco_z']);
 $datohistoriaT->setHco_aa($_REQUEST['hco_aa']);
 $datohistoriaT->setHco_bb($_REQUEST['hco_bb']);
 $datohistoriaT->setHco_cc($_REQUEST['hco_cc']);
 $datohistoriaT->setHco_psicologicos($_REQUEST['hco_psicologicos']);
 $datohistoriaT->setHco_social($_REQUEST['hco_social']);
 $datohistoriaT->setHco_mismo($_REQUEST['hco_mismo']);
 $datohistoriaT->setHco_presente($_REQUEST['hco_presente']);
 $datohistoriaT->setHco_pasado($_REQUEST['hco_pasado']);
 $datohistoriaT->setHco_futuro($_REQUEST['hco_futuro']);
 $datohistoriaT->setPaci_doc($_REQUEST['paci_doc']);
 $datohistoriaT->setEmpl_doc($_REQUEST['empl_doc']);


 $datohistoriaT->InsertarHistoriaT();

require_once("../vista/terapeuta/vista_terapeuta.php");

 ?>
<script type="text/javascript">alert('Datos Guardados Correctamente');</script>
<?php

break;


case 64:

require_once("../vista/terapeuta/tablalistarHCT.php");

break;



case 65:

require_once("../modelo/ValidarDatosTerapeuta.php");//para editar pacientes despues de listados



$datoeditarhistoriaT=new ValidarDatosT();

$datoeditarhistoriaT->setHco_id($_REQUEST['hco_id']);

$datoeditarhistoriaT->setHco_fecha($_REQUEST['hco_fecha']);

$datoeditarhistoriaT->setHco_escolaridad($_REQUEST['hco_escolaridad']);
$datoeditarhistoriaT->setHco_desescolarizacion($_REQUEST['hco_desescolarizacion']);
$datoeditarhistoriaT->setHco_institucion($_REQUEST['hco_institucion']);
$datoeditarhistoriaT->setHco_programa($_REQUEST['hco_programa']);
$datoeditarhistoriaT->setHco_rutina($_REQUEST['hco_rutina']);
$datoeditarhistoriaT->setHco_roles($_REQUEST['hco_roles']);
$datoeditarhistoriaT->setHco_actividad($_REQUEST['hco_actividad']);
$datoeditarhistoriaT->setHco_eventos($_REQUEST['hco_eventos']);
$datoeditarhistoriaT->setHco_ambientales($_REQUEST['hco_ambientales']);
$datoeditarhistoriaT->setHco_a($_REQUEST['hco_a']);
$datoeditarhistoriaT->setHco_b($_REQUEST['hco_b']);
$datoeditarhistoriaT->setHco_c($_REQUEST['hco_c']);
$datoeditarhistoriaT->setHco_d($_REQUEST['hco_d']);
$datoeditarhistoriaT->setHco_e($_REQUEST['hco_e']);
$datoeditarhistoriaT->setHco_f($_REQUEST['hco_f']);
$datoeditarhistoriaT->setHco_g($_REQUEST['hco_g']);
$datoeditarhistoriaT->setHco_h($_REQUEST['hco_h']);
$datoeditarhistoriaT->setHco_i($_REQUEST['hco_i']);
$datoeditarhistoriaT->setHco_j($_REQUEST['hco_j']);
$datoeditarhistoriaT->setHco_k($_REQUEST['hco_k']);  
$datoeditarhistoriaT->setHco_l($_REQUEST['hco_l']);
$datoeditarhistoriaT->setHco_m($_REQUEST['hco_m']);
$datoeditarhistoriaT->setHco_n($_REQUEST['hco_n']);
$datoeditarhistoriaT->setHco_o($_REQUEST['hco_o']);
$datoeditarhistoriaT->setHco_p($_REQUEST['hco_p']);
$datoeditarhistoriaT->setHco_q($_REQUEST['hco_q']);
$datoeditarhistoriaT->setHco_r($_REQUEST['hco_r']);
$datoeditarhistoriaT->setHco_s($_REQUEST['hco_s']);
$datoeditarhistoriaT->setHco_t($_REQUEST['hco_t']);
$datoeditarhistoriaT->setHco_u($_REQUEST['hco_u']);
$datoeditarhistoriaT->setHco_v($_REQUEST['hco_v']);
$datoeditarhistoriaT->setHco_w($_REQUEST['hco_w']);
$datoeditarhistoriaT->setHco_x($_REQUEST['hco_x']);
$datoeditarhistoriaT->setHco_y($_REQUEST['hco_y']);
$datoeditarhistoriaT->setHco_z($_REQUEST['hco_z']);
$datoeditarhistoriaT->setHco_aa($_REQUEST['hco_aa']);
$datoeditarhistoriaT->setHco_bb($_REQUEST['hco_bb']);
$datoeditarhistoriaT->setHco_cc($_REQUEST['hco_cc']);
$datoeditarhistoriaT->setHco_psicologicos($_REQUEST['hco_psicologicos']);
$datoeditarhistoriaT->setHco_social($_REQUEST['hco_social']);
$datoeditarhistoriaT->setHco_mismo($_REQUEST['hco_mismo']);
$datoeditarhistoriaT->setHco_presente($_REQUEST['hco_presente']);
$datoeditarhistoriaT->setHco_pasado($_REQUEST['hco_pasado']);
$datoeditarhistoriaT->setHco_futuro($_REQUEST['hco_futuro']);
$datoeditarhistoriaT->setPaci_doc($_REQUEST['paci_doc']);
$datoeditarhistoriaT->setEmpl_doc($_REQUEST['empl_doc']);


$datoeditarhistoriaT->ModificarHistoriaT();

require_once("../vista/terapeuta/vista_terapeuta.php");
 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php

break;


case 66:

require_once("../vista/terapeuta/tablalistarST.php");

break;

case 67:

require_once("../modelo/ValidarDatosTerapeuta.php");

$datoseguimientoT=new ValidarDatosT();

$datoseguimientoT->setSt_id($_REQUEST['st_id']);
$datoseguimientoT->setSt_fecha($_REQUEST['st_fecha']);
$datoseguimientoT->setSt_descripcion($_REQUEST['st_descripcion']);
$datoseguimientoT->setEmpl_doc($_REQUEST['empl_doc']);
$datoseguimientoT->setHco_id($_REQUEST['hco_id']);
$datoseguimientoT->InsertarSeguimientoT();

 require_once("../vista/terapeuta/vista_terapeuta.php");
  ?>
<script type="text/javascript">alert('Seguimiento Guardado Correctamente');</script>
<?php

break;


case 68:

require_once("../modelo/ValidarDatosTerapeuta.php");

$datoseguimientoT=new ValidarDatosT();
$datoseguimientoT->setSt_id($_REQUEST['st_id']);
$datoseguimientoT->setSt_fecha($_REQUEST['st_fecha']);
$datoseguimientoT->setSt_descripcion($_REQUEST['st_descripcion']);
$datoseguimientoT->setEmpl_doc($_REQUEST['empl_doc']);
$datoseguimientoT->setHco_id($_REQUEST['hco_id']);

$datoseguimientoT->ModificarSeguimientoT();

 require_once("../vista/terapeuta/vista_terapeuta.php");
  ?>
<script type="text/javascript">alert('Seguimiento Modificado Correctamente');</script>
<?php

break;


case 69:

require_once("../vista/terapeuta/FormularioDatosPersonalesT.php");

break;



case 70:

require_once("../modelo/ValidarDatosTerapeuta.php");

                                     
$datopersonalesT=new ValidarDatosT();
$datopersonalesT->setEmpl_doc($_REQUEST['empl_doc']);
$datopersonalesT->setEmpl_nom($_REQUEST['empl_nom']);
$datopersonalesT->setEmpl_ape($_REQUEST['empl_ape']);
$datopersonalesT->setEmpl_cel($_REQUEST['empl_cel']);
$datopersonalesT->setEmpl_tel($_REQUEST['empl_tel']);
$datopersonalesT->setEmpl_dir($_REQUEST['empl_dir']);
$datopersonalesT->setAcce_perfil($_REQUEST['acce_perfil']);
$datopersonalesT->setAcce_usuario($_REQUEST['acce_usuario']);
$datopersonalesT->setAcce_clave($_REQUEST['acce_clave']);

$datopersonalesT->ModificarDatosPersonalesT();

require_once("../vista/terapeuta/vista_terapeuta.php");
 ?>
<script type="text/javascript">alert('Datos Modificados Correctamente');</script>
<?php
break;

//--------------------------------------------------------------------------------------------
case 71:

include('../vista/psiquiatra/data_pdf.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<BR>

     <div class="col-sm-12" >
    <img  src="../vista/assets/img/titulo.png"   >
    </div>

      <table>
  <tr><td  align="center" width="100%">HISTORIAS CLINICAS PSIQUIATRICAS</td></tr>
  </table>

<br>
<br>
<br>

  
  <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
    <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="5%">ID</th>
        <th bgcolor="#238271" width="10%">FECHA</th>
        <th bgcolor="#238271" width="10%">MOTIVO CONSULTA</th>
       <th bgcolor="#238271" width="10%">ENFERMEDAD ACTUAL</th>
        <th bgcolor="#238271" width="12%">EXAMEN FISICO</th>
        <th bgcolor="#238271" width="12%">EXAMEN MENTAL</th>
        <th bgcolor="#238271" width="10%">DIAGNOSTICO</th>
         <th bgcolor="#238271" width="10%">PLAN TERAPEUTICO</th>
        <th bgcolor="#238271" width="10%">C.C PACIENTE</th>
        <th bgcolor="#238271" width="12%">C.C EMPLEADO</th>
    

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  

break;



case 72:

include('../vista/psiquiatra/data_pdf1.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  

<br>

     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo.png"   >
      </div>

     <table>
     <tr><td  align="center" width="100%">SEGUIMIENTOS PACIENTES</td></tr>
     </table>

<br>
<br>
<br>

  
  <table id="pres" class="display" cellpadding="2" width="100%">
    <thead>

      <tr style="color:#FAFAFA">

       <th bgcolor="#238271" width="20%">Nº SEGUIMIENTO</th>
        <th bgcolor="#238271" width="20%">FECHA</th>
        <th bgcolor="#238271" width="20%">DESCRIPCION</th>
        <th bgcolor="#238271" width="20%">C.C EMPLEADO</th>
        <th bgcolor="#238271" width="20%">Nº HISTORIA</th>
   
      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  
break;



case 73:


include('../vista/psiquiatra/data_pdf2.php'); 
  
$_SESSION['hcq_id']=$_POST['hcq_id'];

  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  
<br>
<br>
<br>

<div class="col-sm-12" >
<img  src="../vista/assets/img/titulo.png">
</div>

<br>

<table>

    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I'); 


break;








//reportes psicologooooooooooooooooooooooooooooooooooooooooo


case 74:

require_once("../vista/psicologo/reportes.php");

break;


case 75:

include('../vista/psicologo/data_pdf3.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>


     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo1.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">HISTORIAS CLINICAS PSICOLOGICAS</td></tr>
  </table>

<br>
<br>
<br>
  
     <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="10%">Nº HISTORIA</th>
        <th bgcolor="#238271" width="10%">FECHA</th>
      
        <th bgcolor="#238271" width="12%">EXAMEN MENTAL</th>
      
        <th bgcolor="#238271" width="10%">MOTIVACION </th>
        <th bgcolor="#238271" width="12%">ANTECEDENTES </th>
       
        <th bgcolor="#238271" width="10%">DIAGNOSTICO</th>
        <th bgcolor="#238271" width="15%">OBJ TERAPEUTICOS</th>
        <th bgcolor="#238271" width="10%">C.C PAC</th>
        <th bgcolor="#238271" width="10%">C.C EMPL</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  

break;



case 76:

include('../vista/psicologo/data_pdf4.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  

<br>


     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo1.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">SEGUIMIENTOS PACIENTES</td></tr>
  </table>

<br>
<br>
<br>
  
     <table id="pres" class="display" cellpadding="2" width="100%">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="20%">Nº SEGUIMIENTO</th>
        <th bgcolor="#238271" width="20%">FECHA</th>
        <th bgcolor="#238271" width="20%">DESCRIPCION</th>
        <th bgcolor="#238271" width="20%">C.C EMPLEADO</th>
        <th bgcolor="#238271" width="20%">Nº HISTORIA</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  

break;





case 77:


include('../vista/psicologo/data_pdf5.php'); 
  
$_SESSION['hcs_id']=$_POST['hcs_id'];

  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  
<br>
<br>
<br>

<div class="col-sm-12">
<img  src="../vista/assets/img/titulo1.png">
</div>

<br>

<table>

    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I'); 


break;


//REPORTES TRABAJADOR SOCIAL


case 78:

require_once("../vista/tsocial/reportes.php");

break;



case 79:

include('../vista/tsocial/data_pdf6.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>


     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo2.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">HISTORIAS CLINICAS PSICOSOCIAL</td></tr>
  </table>

<br>
<br>
<br>
  
     <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="10%">Nº HISTORIA</th>
        <th bgcolor="#238271" width="10%">FECHA</th>
        <th bgcolor="#238271" width="20%">RAZONES DE REHABILITACION</th>
        <th bgcolor="#238271" width="20%">TIPOS DE DROGAS CONSUMIDAS</th>
        <th bgcolor="#238271" width="15%">C.C PACIENTE</th>
        <th bgcolor="#238271" width="15%">C.C EMPLEADO</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  

break;



case 80:

include('../vista/tsocial/data_pdf7.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  

<br>


     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo2.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">SEGUIMIENTOS PACIENTES</td></tr>
  </table>

<br>
<br>
<br>
  
     <table id="pres" class="display" cellpadding="2" width="100%">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="20%">Nº SEGUIMIENTO</th>
        <th bgcolor="#238271" width="20%">FECHA</th>
        <th bgcolor="#238271" width="20%">DESCRIPCION</th>
        <th bgcolor="#238271" width="20%">C.C EMPLEADO</th>
        <th bgcolor="#238271" width="20%">Nº HISTORIA</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  

break;





case 81:


include('../vista/tsocial/data_pdf8.php'); 
  
$_SESSION['hct_id']=$_POST['hct_id'];

  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  
<br>
<br>
<br>

<div class="col-sm-12">
<img  src="../vista/assets/img/titulo2.png">
</div>

<br>

<table>

    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I'); 


break;





case 82:

require_once("../vista/nutricionista/reportes.php");

break;


case 83:

include('../vista/nutricionista/data_pdf9.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>


     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo3.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">HISTORIAS CLINICAS NUTRICIONISTA</td></tr>
  </table>

<br>
<br>
<br>
  
     <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="10%">Nº HISTORIA</th>
        <th bgcolor="#238271" width="10%">FECHA</th>
        <th bgcolor="#238271" width="10%">PESO ACTUAL</th>
      
            <th bgcolor="#238271" width="10%">IMC</th>
        <th bgcolor="#238271" width="15%">ACTIVIDAD FISICA</th>
          <th bgcolor="#238271" width="20%">ENFERMEDAD ACTUAL</th>
        <th bgcolor="#238271" width="12%">C.C PACIENTE</th>
        <th bgcolor="#238271" width="12%">C.C EMPLEADO</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  

break;



case 84:

 
  include('../vista/nutricionista/data_pdf10.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  

<br>


     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo3.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">SEGUIMIENTOS PACIENTES NUTRICIONISTA</td></tr>
  </table>

<br>
<br>
<br>
  
     <table id="pres" class="display" cellpadding="2" width="100%">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="20%">Nº SEGUIMIENTO</th>
        <th bgcolor="#238271" width="20%">FECHA</th>
        <th bgcolor="#238271" width="20%">DESCRIPCION</th>
        <th bgcolor="#238271" width="20%">C.C EMPLEADO</th>
        <th bgcolor="#238271" width="20%">Nº HISTORIA</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  


break;



case 85:


include('../vista/nutricionista/data_pdf11.php'); 
  
$_SESSION['hcn_id']=$_POST['hcn_id'];

  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  
<br>
<br>
<br>

<div class="col-sm-12">
<img  src="../vista/assets/img/titulo3.png">
</div>

<br>

<table>

    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I'); 


break;

//--------------------------------------------------------------------------------------------
case 86:

require_once("../vista/terapeuta/reportes.php");

break;


case 87:

include('../vista/terapeuta/data_pdf12.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>
     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo4.png"   >
     </div>

     <table>
     <tr><td  align="center" width="100%">HISTORIAS CLINICAS TERAPEUTA</td></tr>
     </table>

<br>
<br>
<br>
  
      <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="10%">Nº HISTORIA</th>
        <th bgcolor="#238271" width="10%">FECHA</th>
        <th bgcolor="#238271" width="10%">RUTINA</th>
        <th bgcolor="#238271" width="10%">ROLES</th>
        <th bgcolor="#238271" width="10%">ACTIVIDAD</th>
        <th bgcolor="#238271" width="13%">COMPONENTE PSICOLOGICO</th>
        <th bgcolor="#238271" width="13%">COMPONENTE SOCIAL</th>
        <th bgcolor="#238271" width="12%">C.C PACIENTE</th>
        <th bgcolor="#238271" width="12%">C.C EMPLEADO</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  

break;


case 88:

 
  include('../vista/terapeuta/data_pdf13.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  

<br>


     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo4.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">SEGUIMIENTOS PACIENTES TERAPEUTA</td></tr>
  </table>

<br>
<br>
<br>
  
     <table id="pres" class="display" cellpadding="2" width="100%">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="20%">Nº SEGUIMIENTO</th>
        <th bgcolor="#238271" width="20%">FECHA</th>
        <th bgcolor="#238271" width="20%">DESCRIPCION</th>
        <th bgcolor="#238271" width="20%">C.C EMPLEADO</th>
        <th bgcolor="#238271" width="20%">Nº HISTORIA</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  


break;



case 89:


include('../vista/terapeuta/data_pdf14.php'); 
  
$_SESSION['hco_id']=$_POST['hco_id'];

  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

   $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P'); 


  $content = '';  
  $content .= '  


<br>

     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulotera.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">HISTORIA PACIENTE</td></tr>
  </table>

<br>
<br>
<br>





<table>


    ';  

   $content .= fetch_data();
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);
   $obj_pdf->Output('Reporte.pdf', 'I'); 


break;


//-------------------------------------------------------------------------------------------------
case 90:

require_once("../vista/medico/reportes.php");

break;


case 91:

include('../vista/medico/data_pdf15.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>
     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo5.png"   >
     </div>

     <table>
     <tr><td  align="center" width="100%">HISTORIAS CLINICAS MEDICO</td></tr>
     </table>

<br>
<br>
<br>
  
      <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="5%">Nº </th>
        <th bgcolor="#238271" width="10%">FECHA</th>
        <th bgcolor="#238271" width="12%">MOTIVO DE CONSULTA</th>
        <th bgcolor="#238271" width="12%">ENFERMEDAD ACTUAL</th>
        <th bgcolor="#238271" width="12%">REVISION POR SISTEMAS</th>
        <th bgcolor="#238271" width="12%">EXAMEN FISICO</th>
        <th bgcolor="#238271" width="10%">DIAGNOSTICO</th>
        <th bgcolor="#238271" width="10%">PLAN</th>
        <th bgcolor="#238271" width="10%">C.C PACI</th>
        <th bgcolor="#238271" width="10%">C.C EMPL</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  
break;


case 92:

 include('../vista/medico/data_pdf16.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  

<br>


     <div class="col-sm-12" >
     <img  src="../vista/assets/img/titulo5.png"   >
     </div>


  <table>
  <tr><td  align="center" width="100%">SEGUIMIENTOS PACIENTES MEDICO</td></tr>

  </table>
<br>
<br>
<br>
<br>
  
     <table id="pres" class="display" cellpadding="2" width="100%">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="20%">Nº SEGUIMIENTO</th>
        <th bgcolor="#238271" width="20%">FECHA</th>
        <th bgcolor="#238271" width="20%">DESCRIPCION</th>
        <th bgcolor="#238271" width="20%">C.C EMPLEADO</th>
        <th bgcolor="#238271" width="20%">Nº HISTORIA</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  


break;



case 93:


include('../vista/medico/data_pdf17.php'); 
  
$_SESSION['hcg_id']=$_POST['hcg_id'];

  ob_start();
  ob_clean();

  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('P');  


  $content = '';  
  $content .= '  
<br>
<br>
<br>

<div class="col-sm-12">
<img  src="../vista/assets/img/titulo5.png">
</div>

<br>

<table>

    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I'); 

 
break;


case 94:

require_once("../vista/reportesSecretaria.php");

break;




case 95:

include('../vista/data_pdf18.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>


<div class="col-sm-12">
<img  src="../vista/assets/img/titulo5.png">
</div>


     <div class="col-sm-12" >
     <img  src="" >
     </div>

     <table>
     <tr><td  align="center" width="100%">PACIENTES REGISTRADOS</td></tr>
     </table>

<br>
<br>
<br>
  
      <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="8%">CEDULA</th>
        <th bgcolor="#238271" width="8%">NOMBRE</th>
        <th bgcolor="#238271" width="8%">APELLIDO</th>
        <th bgcolor="#238271" width="8%">CELULAR</th>
        <th bgcolor="#238271" width="8%">TELEFONO</th>
        <th bgcolor="#238271" width="8%">DIRECCION</th>
        <th bgcolor="#238271" width="5%">EPS</th>
        <th bgcolor="#238271" width="5%">ESTADO CIVIL</th>
        <th bgcolor="#238271" width="5%">OCUPACION</th>
        <th bgcolor="#238271" width="8%">FECHA INGRESO</th>
        <th bgcolor="#238271" width="8%">FECHA NACIMIENTO</th>
        <th bgcolor="#238271" width="5%">ACOMPAÑANTE</th>
        <th bgcolor="#238271" width="5%">RELIGION</th>
        <th bgcolor="#238271" width="5%">FOTO</th>
        <th bgcolor="#238271" width="5%">PROFESION</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  
break;


case 96:

include('../vista/data_pdf19.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>


<div class="col-sm-12">
<img  src="../vista/assets/img/titulo5.png">
</div>


     <div class="col-sm-12" >
     <img  src="" >
     </div>

     <table>
     <tr><td  align="center" width="100%">EMPLEADOS REGISTRADOS</td></tr>
     </table>

<br>
<br>
<br>
  
      <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="10%">CEDULA</th>
        <th bgcolor="#238271" width="10%">NOMBRE</th>
        <th bgcolor="#238271" width="10%">APELLIDO</th>
        <th bgcolor="#238271" width="10%">CELULAR</th>
        <th bgcolor="#238271" width="10%">TELEFONO</th>
        <th bgcolor="#238271" width="10%">DIRECCION</th>
        <th bgcolor="#238271" width="10%">ESTADO CIVIL</th>
        <th bgcolor="#238271" width="8%">PERFIL</th>
        <th bgcolor="#238271" width="8%">FECHA INGRESO</th>
        <th bgcolor="#238271" width="8%">FECHA NACIMIENTO</th>
        <th bgcolor="#238271" width="8%">FOTO</th>
 

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  
break;



case 97:

require_once("../vista/administrador/reportesAdmin.php");

break;


case 98:

include('../vista/administrador/data_pdf20.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 5);  
  $obj_pdf->SetFont('helvetica', '', 8);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>


<div class="col-sm-12">
<img  src="../vista/assets/img/titulo5.png">
</div>


     <div class="col-sm-12" >
     <img  src="" >
     </div>

     <table>
     <tr><td  align="center" width="100%">REGISTRO DE PACIENTES</td></tr>
     </table>

<br>
<br>
<br>
  
      <table id="pres" class="display" cellpadding="2" width="95%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="8%">CEDULA</th>
        <th bgcolor="#238271" width="7%">NOMBRE</th>
        <th bgcolor="#238271" width="7%">APELLIDO</th>
        <th bgcolor="#238271" width="7%">CELULAR</th>
        <th bgcolor="#238271" width="7%">TELEFONO</th>
        <th bgcolor="#238271" width="8%">DIRECCION</th>
        <th bgcolor="#238271" width="5%">EPS</th>
        <th bgcolor="#238271" width="7%">ESTADO CIVIL</th>
        <th bgcolor="#238271" width="7%">OCUPACION</th>
        <th bgcolor="#238271" width="8%">FECHA ING</th>
        <th bgcolor="#238271" width="8%">FECHA NAC</th>
        <th bgcolor="#238271" width="7%">ACOMPAÑANTE</th>
        <th bgcolor="#238271" width="7%">RELIGION</th>
        <th bgcolor="#238271" width="7%">FOTO</th>
        <th bgcolor="#238271" width="7%">PROFESION</th>

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  
break;



case 99:

include('../vista/administrador/data_pdf21.php'); 
  
  ob_start();
  ob_clean();


  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 5);  
  $obj_pdf->SetFont('helvetica', '', 8);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  

<br>


<div class="col-sm-12">
<img  src="../vista/assets/img/titulo5.png">
</div>


     <div class="col-sm-12" >
     <img  src="" >
     </div>

     <table>
     <tr><td  align="center" width="100%">EMPLEADOS REGISTRADOS</td></tr>
     </table>

<br>
<br>
<br>
  
      <table id="pres" class="display" cellpadding="2" width="100%"  border="1">
      <thead>

      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="10%">CEDULA</th>
        <th bgcolor="#238271" width="10%">NOMBRE</th>
        <th bgcolor="#238271" width="10%">APELLIDO</th>
        <th bgcolor="#238271" width="10%">CELULAR</th>
        <th bgcolor="#238271" width="10%">TELEFONO</th>
        <th bgcolor="#238271" width="10%">DIRECCION</th>
        <th bgcolor="#238271" width="10%">ESTADO CIVIL</th>
        <th bgcolor="#238271" width="8%">PERFIL</th>
        <th bgcolor="#238271" width="8%">FECHA INGRESO</th>
        <th bgcolor="#238271" width="8%">FECHA NACIMIENTO</th>
        <th bgcolor="#238271" width="8%">FOTO</th>
 

      </tr>
    </thead>
    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I');  
break;



case 100:

include('../vista/administrador/data_pdf22.php'); 
  


  ob_start();
  ob_clean();

  require_once('../vista/assets/tcpdf/tcpdf.php'); 

  $obj_pdf = new TCPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $obj_pdf->SetCreator(PDF_CREATOR);  
  $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
  $obj_pdf->setPrintHeader(false);  
  $obj_pdf->setPrintFooter(false);  
  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
  $obj_pdf->SetFont('helvetica', '', 10);  
  $obj_pdf->AddPage('l');  


  $content = '';  
  $content .= '  
<br>
<br>
<br>

<div class="col-sm-12">
<img  src="../vista/assets/img/titulo5.png">
</div>
<br>

  <table>
     <tr><td  align="center" width="100%">ACCESOS EMPLEADOS</td></tr>
     </table>

<br>
<br>
<br>

<table id="pres" class="display" cellpadding="2" width="100%"  border="1">


      <tr style="color:#FAFAFA">

        <th bgcolor="#238271" width="16%">DOCUMENTO</th>
        <th bgcolor="#238271" width="16%">NOMBRE</th>
        <th bgcolor="#238271" width="16%">APELLIDO</th>
        <th bgcolor="#238271" width="16%">ID</th>
        <th bgcolor="#238271" width="16%">PERFIL</th>
        <th bgcolor="#238271" width="16%">ESTADO</th>


      </tr>
   

    ';  
   $content .= fetch_data();  
   $content .= '</table>';  
   $obj_pdf->writeHTML($content);  
   $obj_pdf->Output('Reporte.pdf', 'I'); 


break;




}
?>
