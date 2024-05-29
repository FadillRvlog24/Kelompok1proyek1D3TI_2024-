document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    const registerButton = document.getElementById('registerButton');
    
    registerForm.addEventListener('submit', function(event) {
        let valid = true;

        // Get form values
        const firstName = document.getElementById('inputFirstName').value.trim();
        const lastName = document.getElementById('inputLastName').value.trim();
        const email = document.getElementById('inputEmail').value.trim();
        const password = document.getElementById('inputPassword').value.trim();
        const confirmPassword = document.getElementById('inputPasswordConfirm').value.trim();

        // Clear previous error messages
        clearErrors();

        // Validate form fields
        if (firstName === '') {
            showError('inputFirstName', 'Nama depan harus diisi');
            valid = false;
        }

        if (lastName === '') {
            showError('inputLastName', 'Nama belakang harus diisi');
            valid = false;
        }

        if (email === '') {
            showError('inputEmail', 'Email harus diisi');
            valid = false;
        } else if (!validateEmail(email)) {
            showError('inputEmail', 'Email tidak valid');
            valid = false;
        }

        if (password === '') {
            showError('inputPassword', 'Kata sandi harus diisi');
            valid = false;
        }

        if (confirmPassword === '') {
            showError('inputPasswordConfirm', 'Konfirmasi kata sandi harus diisi');
            valid = false;
        } else if (password !== confirmPassword) {
            showError('inputPasswordConfirm', 'Kata sandi dan konfirmasi kata sandi tidak cocok');
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });

    function showError(inputId, message) {
        const inputElement = document.getElementById(inputId);
        const formGroup = inputElement.closest('.form-floating');
        const errorElement = document.createElement('div');
        errorElement.className = 'text-danger mt-2';
        errorElement.innerText = message;
        formGroup.appendChild(errorElement);
    }

    function clearErrors() {
        const errors = document.querySelectorAll('.text-danger');
        errors.forEach(function(error) {
            error.remove();
        });
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
});
