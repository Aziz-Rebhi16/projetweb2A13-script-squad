// Function to validate the form before submission
function validateForm() {
    var musee_nameElement = document.getElementById("musee_name");
    var locationElement = document.getElementById("location");
    var musee_nameErrorElement = document.getElementById("musee_name_error");
    var locationErrorElement = document.getElementById("location_error");

    var isValid = true;

    // Validate title
    if (musee_nameElement.value.length < 3) {
        musee_nameErrorElement.innerHTML = "Le musee_name doit contenir au moins 3 caractères";
        musee_nameErrorElement.style.color = "red";
        isValid = false;
    } else {
        musee_nameErrorElement.innerHTML = "Correct";
        musee_nameErrorElement.style.color = "green";
    }

    // Validate destination
    var pattern = /^[A-Za-z\s]{3,}$/;
    if (!pattern.test(locationElement.value)) {
        locationErrorElement.innerHTML = "La location doit contenir uniquement des lettres et des espaces et au moins 3 caractères";
        locationErrorElement.style.color = "red";
        isValid = false;
    } else {
        locationErrorElement.innerHTML = "Correct";
        locationErrorElement.style.color = "green";
    }

    return isValid;
}

// Attach the validateForm function to the form's submit event
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("ticketForm");
    form.addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
});

document.addEventListener("DOMContentLoaded", function(){

var musee_nameElement= document.getElementById("musee_name");
var locationelement= document.getElementById("location");

musee_nameElement.addEventListener("keyup", function(){
    var musee_nameerrorElement= document.getElementById("musee_name_error");
    var musee_nameErrorValue=musee_nameElement.value;
    if(musee_nameErrorValue.length < 3) {
        musee_nameerrorElement.innerHTML = "Le musee_name doit contenir au moins 3 caractères";
        musee_nameerrorElement.style.color = "red";
    }
    else {
        musee_nameerrorElement.innerHTML = "Correct";
        musee_nameerrorElement.style.color = "green";
    }
})
locationelement.addEventListener("keyup",function(){
    var locationErrorElement= document.getElementById("location_error");
    var locationErrorValue=destinationelement.value;
    var pattern = /^[A-Za-z]{3,}$/
    if(!pattern.test(destinationErrorValue)){
        locationErrorElement.innerHTML = "La location doit contenir  uniquement des lettres et des espaces et au moins 3 caractères";
        locationErrorElement.style.color = "red";
    }else
    { locationErrorElement.innerHTML = "Correct";
        locationErrorElement.style.color = "green";

    }
});

})