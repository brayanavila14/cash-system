document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
  });
  function validarFormulario(evento) {
    evento.preventDefault();
    var name = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var usuario = document.getElementById('usuario').value;
    var clave = document.getElementById('clave').value;
    var clave2 = document.getElementById('clave2').value;
    
    this.submit();
}