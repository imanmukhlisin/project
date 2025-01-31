document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var errorMessage = document.getElementById("error-message");
    
    if (username === "admin" && password === "1234") {
        document.body.style.background = "linear-gradient(to right, #11998e, #38ef7d)";
        alert("Login berhasil!");
    } else {
        errorMessage.style.display = "block";
        errorMessage.classList.add("shake");
        setTimeout(() => {
            errorMessage.style.display = "none";
            errorMessage.classList.remove("shake");
        }, 3000);
    }
});