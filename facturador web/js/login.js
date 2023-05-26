document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});
function validarFormulario(evento) {
  evento.preventDefault();
  var usuario = document.getElementById('usuario').value;
  var clave = document.getElementById('clave').value;
  if(usuario.length == 0) {
    alert('No has escrito nada en el usuario'); 
    return;
  } else {
    if (clave.length == 0) {
      alert('La clave no es válida');
      return;
    } else {
      if (clave.length < 5) {
        alert('La clave es muy corta');
        return;
      }
    }
  }
  this.submit();
}

function cambiarAction(){
  var usuario = document.getElementById('usuario').value;
  formulario = document.getElementById('formulario');
  if(usuario == 'administrador'){
    formulario.setAttribute('action','inicio-administrador.php');
  } else {
    formulario.setAttribute('action','inicio-empleado.php');
  }
}