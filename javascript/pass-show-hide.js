let eye = document.querySelector(".form .field .fa-eye");
const input = document.querySelector(".form .field input[type='password']");

eye.addEventListener("click", function() {
    if (input.type === "password") {
        input.type = "text"
        eye.classList.add("active")
    } else {
        input.type = "password"
        eye.classList.remove("active")
    }
})