var activationButton = document.getElementById('form-activation-button');
var form_fileds = Array.from(document.querySelectorAll('#xkiocs'));
var activationFunction = (e) => {
    e.preventDefault();
    var x = document.getElementById('form-save-button')
    if (x.style.display === "inline-block") {
        x.style.display = "none";
    } else {
        x.style.display = "inline-block";
    }
    form_fileds.map((x) => {
        x.toggleAttribute('disabled')
    })
}
activationButton.addEventListener("click", activationFunction);