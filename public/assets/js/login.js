// mostrar u ocultar la contraseña
const boton = document.getElementById('ver-password');
const password = document.getElementById('password');

boton.addEventListener('click', function () {
    if (password.type === 'password') {
        password.type = 'text';
        boton.textContent = 'Hide';
    } else {
        password.type = 'password';
        boton.textContent = 'Show';
    }
});
