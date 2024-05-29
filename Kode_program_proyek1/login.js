document.getElementById('loginButton').addEventListener('click', function() {
    var email = document.getElementById('inputEmail').value;
    var password = document.getElementById('inputPassword').value;

    if (email === "fadill222@gmail.com" || password === "123") {
        alert("Email dan Kata Sandi harus diisi.");
    } else {
        // Simulate login process
        alert("Login berhasil!");
        // Redirect to another page, for example, index.html
        window.location.href = "index.html";
    }
})