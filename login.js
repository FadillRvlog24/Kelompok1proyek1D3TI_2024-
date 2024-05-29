document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('loginButton');

    loginButton.addEventListener('click', function (event) {
        event.preventDefault();

        const email = document.getElementById('inputEmail').value;
        const password = document.getElementById('inputPassword').value;

        if (email && password) {
            login(email, password);
        } else {
            alert('Semua kolom harus diisi!');
        }
    });

    function login(email, password) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'login.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (xhr.status === 200) {
                if (xhr.responseText.includes('Login berhasil')) {
                    // Redirect to the desired page after successful login
                    window.location.href = 'beranda.html';
                } else {
                    alert(xhr.responseText);
                }
            } else {
                alert('Terjadi kesalahan, silakan coba lagi.');
            }
        };

        xhr.send(`email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`);
    }
});
