function togglePasswordVisibility() {
    var passwordInput = document.querySelector('input[type="password"]');
    var ojoIcon = document.querySelector('.ojo');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        ojoIcon.style.backgroundImage = 'url("../images/ojo-abierto.png")';
    } else {
        passwordInput.type = 'password';
        ojoIcon.style.backgroundImage = 'url("../images/ojo-cerrado.png")';
    }
}