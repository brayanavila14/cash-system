function btn() {
    document.querySelector('.menuoculto').classList.toggle('menuvisto');
}

function mostrarContrasena(){
    var contra = document.getElementById("clave");
    
    if(contra.type == "password"){
        contra.type = "text";
    }else{
        contra.type = "password";
    }
    
}
function mostrarContrasena2() {
    var contra2 = document.getElementById("clavedos");

    if (contra2.type == "password") {
        contra2.type = "text";
    } else {
        contra2.type = "password";
    }
    
}
