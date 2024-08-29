// login.js

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector("form");

    loginForm.addEventListener("submit", function (event) {
        // Prevenir el envío del formulario si no es válido
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        const username = document.getElementById("nombre").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("contrasena").value.trim();
        let isValid = true;

        // Validar el campo de nombre de usuario
        if (username === "") {
            alert("Por favor, ingresa tu nombre de usuario.");
            isValid = false;
        }

        // Validar el campo de correo electrónico
        if (email === "") {
            alert("Por favor, ingresa tu correo electrónico.");
            isValid = false;
        } else if (!validateEmail(email)) {
            alert("Por favor, ingresa un correo electrónico válido.");
            isValid = false;
        }

        // Validar el campo de contraseña
        if (password === "") {
            alert("Por favor, ingresa tu contraseña.");
            isValid = false;
        } else if (password.length < 6) {
            alert("La contraseña debe tener al menos 6 caracteres.");
            isValid = false;
        }

        return isValid;
    }

    function validateEmail(email) {
        // Expresión regular básica para validar correos electrónicos
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
