document.addEventListener("DOMContentLoaded", function(){

var musee_nameElement= document.getElementById("musee_name");
var locationElement= document.getElementById("location");

musee_nameElement.addEventListener("keyup", function(){
    var musee_nameErrorElement= document.getElementById("musee_name_error");
    var musee_nameErrorValue=musee_nameElement.value;
    if(musee_nameErrorValue.length < 3) {
        musee_nameErrorElement.innerHTML = "Le nom doit contenir au moins 3 caractères";
        musee_nameErrorElement.style.color = "red";
    }
    else {
        musee_nameErrorElement.innerHTML = "Correct";
        musee_nameErrorElement.style.color = "green";
    }
})
locationElement.addEventListener("keyup",function(){
    var locationErrorElement= document.getElementById("location_error");
    var locationErrorValue=locationElement.value;
    var pattern = /^[A-Za-z]{3,}$/
    if(!pattern.test(locationErrorValue)){
        locationErrorElement.innerHTML = "La location doit contenir  uniquement des lettres et des espaces et au moins 3 caractères";
        locationErrorElement.style.color = "red";
    }else
    { locationErrorElement.innerHTML = "Correct";
        locationErrorElement.style.color = "green";

    }
});

})