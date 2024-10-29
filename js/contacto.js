document.addEventListener("DOMContentLoaded", function() {
    const button = document.querySelector(".apsion-button-md3");
    const nombreInput = document.querySelector(".apsion-nombreyapellidos1 input");
    const emailInput = document.querySelector(".apsion-email1 input");
    const mensajeInput = document.querySelector(".apsion-mensaje textarea");
  
    button.addEventListener("click", function() {
      const nombre = nombreInput.value;
      const email = emailInput.value;
      const mensaje = mensajeInput.value;
  
      if (nombre && email && mensaje) {
        // llamada a una API para enviar el formulario
        alert("Mensaje enviado correctamente. ¡Gracias por contactarnos!");
      } else {
        alert("Por favor complete todos los campos.");
      }
    });
  });