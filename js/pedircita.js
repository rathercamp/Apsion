function modalReserva() {

	var nombre = document.getElementById("formNombre").value;
	var fecha = document.getElementById("formFecha").value;
	var psicologo = document.getElementById("formPsicologo").value;
    var modalidad = document.getElementById("formModalidad").value;
    var email = document.getElementById("formEmail").value;

	var mensaje;


	(function formCheck(){
		if(!document.getElementById("formNombre").checkValidity()){
			mensaje ="Introduce un nombre correcto.";
			alert(mensaje);
		}

            else if (!document.getElementById("formFecha").checkValidity()){
            mensaje ="Introduce una fecha correcta.";
            alert(mensaje);
			}

				else if (!document.getElementById("formPsicologo").checkValidity()){
				mensaje ="Seleccione un psicólogo.";
				alert(mensaje);
				}

					else if (!document.getElementById("formModalidad").checkValidity()){
					mensaje ="Seleccione una modalidad.";
					alert(mensaje);
					}
                    else if (!document.getElementById("formEmail").checkValidity()){
                    mensaje ="Seleccione una modalidad.";
                    alert(mensaje);
                    }
                        else {

						    mensaje = nombre +", le confirmamos que se ha reservado la cita con " + psicologo + " en el dia " + fecha + " en la modalidad " + modalidad + ". Recibirá un correo de confirmación en la dirección: " + email + ".";

						    alert(mensaje);
					    }
    })();
}