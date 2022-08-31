const form = document.querySelector(".login  form"),
    continueBtn = form.querySelector(".btn input"),
    errorText = document.querySelector(".error-text");


form.onsubmit = (event) => {
    event.preventDefault();

}
continueBtn.onclick = () => {
    //Ajax start
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                let data = xhr.response;
                if (data == "success") {
                    location.href = "user.php";
                } else {
                    errorText.style.display = "block"
                    errorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}