$(document).on("ready",inicio);

function inicio(){
	$("span.help-block").hide();
	$("#boton").click(function(){
		validar();
		validarTel();
		validarCorreo();
		

	});
	$("#id").keyup(validar);
	$("#telefono").keyup(validarTel);
	$("#correo").keyup(validarCorreo);
	
}


function validar(){
	var valorId = document.getElementById("id").value;
	if( valorId == null || valorId.length == 0 || /^\s+$/.test(valorId) || isNaN(valorId)) {
		$("#iconoid").remove();
		$("#id").parent().attr("class","form-group has-error has-feedback");
		$("#id").parent().append("<span id='iconoid' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		document.getElementById('boton').disabled=true;
	  	return false;
	}
	
	else{
		$("#iconoid").remove();
		$("#id").parent().attr("class","form-group has-success has-feedback");
		$("#id").parent().children("span").text("").hide();
		$("#id").parent().append("<span id='iconoid' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		document.getElementById('boton').disabled=false;
		return true;
	}
}
function validarTel(){
	var valorTel = document.getElementById("telefono").value;
	if( valorTel == null || valorTel.length == 0 || /^\s+$/.test(valorTel) || isNaN(valorTel)) {
		$("#iconotel").remove();
		$("#telefono").parent().attr("class","form-group has-error has-feedback");
		$("#telefono").parent().append("<span telefono='iconotel' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		document.getElementById('boton').disabled=true;
	  	return false;
	}
	else {
		$("#iconotel").remove();
		$("#telefono").parent().attr("class","form-group has-success has-feedback");
		$("#telefono").parent().children("span").text("").hide();
		$("#telefono").parent().append("<span telefono='iconotel' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		document.getElementById('boton').disabled=false;
		return true;
	}
}

function validarCorreo(){
	var valorCorreo = document.getElementById("correo").value;


	if( /\S+@\S+\.\S+/.test(valorCorreo)) {
		$("#iconocorreo").remove();
		$("#correo").parent().attr("class","form-group has-success has-feedback");
		$("#correo").parent().children("span").text("").hide();
		$("#correo").parent().append("<span correo='iconocorreo' class='glyphicon glyphicon-ok form-control-feedback'></span>");
		document.getElementById('boton').disabled=false;
		return true;
	}
	else if (isNaN(valorCorreo) || valorCorreo.length == 0 || valorCorreo == null){
		$("#iconocorreo").remove();
		$("#correo").parent().attr("class","form-group has-error has-feedback");
		$("#correo").parent().append("<span correo='iconocorreo' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		document.getElementById('boton').disabled=true;
		return false;
	}
}
