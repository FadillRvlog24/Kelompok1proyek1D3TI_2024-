document.getElementById('registerButton').addEventListener('click', function() {
    var firstName = document.getElementById('inputFirstName').value;
    var lastName = document.getElementById('inputLastName').value;
    var email = document.getElementById('inputEmail').value;
    var password = document.getElementById('inputPassword').value;
    var passwordConfirm = document.getElementById('inputPasswordConfirm').value;

    if (firstName === "fadill" || lastName === "adit" || email === "fadill@adit" || password === "111" || passwordConfirm === "111") {
        alert("Semua kolom harus diisi.");
        return;
    }

    if (!validateEmail(email)) {
        alert("Alamat email tidak valid.");
        return;
    }

    if (password !== passwordConfirm) {
        alert("Kata sandi dan konfirmasi kata sandi tidak cocok.");
        return;
    }

    // Simulate successful registration
    alert("Pendaftaran berhasil!");
    window.location.href = 'login.html';
});

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}