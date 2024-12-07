document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const loginError = document.getElementById('login-error');

    loginForm.addEventListener('submit', function(event) {
        const email = document.getElementById('login-email');
        const password = document.getElementById('login-password');

        let errors = [];

        if (!email.value) {
            errors.push('Email');
            email.style.borderColor = 'red';
        } else {
            email.style.borderColor = '';
        }

        if (!password.value) {
            errors.push('Contraseña');
            password.style.borderColor = 'red';
        } else {
            password.style.borderColor = '';
        }

        if (errors.length > 0) {
            event.preventDefault();
            const errorMessage = 'Faltan los siguientes campos: ' + errors.join(', ') + '.';
            loginError.textContent = errorMessage; 
            loginError.setAttribute('aria-live', 'assertive');  
        } else {
            loginError.textContent = ''; 
        }
    });


    const registerForm = document.getElementById('register-form');
    const registerError = document.getElementById('register-error');

    registerForm.addEventListener('submit', function(event) {
        const name = document.getElementById('nombre');
        const lastname = document.getElementById('apellidos');
        const phone = document.getElementById('telefono');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        

        let errors = [];

        if (!name.value) {
            errors.push('Nombre');
            name.style.borderColor = 'red';
        } else {
            name.style.borderColor = '';
        }

        if (!lastname.value) {
            errors.push('Apellidos');
            lastname.style.borderColor = 'red';
        } else {
            lastname.style.borderColor = '';
        }

        if (!phone.value) {
            errors.push('Teléfono');
            phone.style.borderColor = 'red';
        } else {
            phone.style.borderColor = '';
        }

        if (!email.value) {
            errors.push('Email');
            email.style.borderColor = 'red';
        } else {
            email.style.borderColor = '';
        }

        if (!password.value) {
            errors.push('Contraseña');
            password.style.borderColor = 'red';
        } else {
            password.style.borderColor = '';
        }

        

        if (errors.length > 0) {
            event.preventDefault();
            const errorMessage = 'Faltan los siguientes campos: ' + errors.join(', ') + '.';
            registerError.textContent = errorMessage; 
            registerError.setAttribute('aria-live', 'assertive');  
        } else {
            registerError.textContent = ''; 
        }
    });
});
