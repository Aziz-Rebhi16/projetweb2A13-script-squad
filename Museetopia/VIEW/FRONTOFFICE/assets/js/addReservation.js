document.addEventListener("DOMContentLoaded", function(){

    var nameElement= document.getElementById("name");
    var surnameElement= document.getElementById("surname");
    var emailElement = document.getElementById("email");
    var phoneElement = document.getElementById("phone");
    
    emailElementElement.addEventListener("change", function() {
        var emailErrorElement = document.getElementById("email");
        var emailValue = emailElementElement.value;
        if (!emailValue) {
            emailErrorElement.innerHTML = "L'email est requise";
            emailErrorElement.style.color = "red";
        } else {
            emailErrorElement.innerHTML = "Correct";
            emailErrorElement.style.color = "green";
        }
    });
    
    phoneElement.addEventListener("change", function() {
        var phoneErrorElement = document.getElementById("phone");
        var phoneValue = phoneElement.value;
        if (!phoneValue) {
            phoneErrorElement.innerHTML = "le phone est requise";
            phoneErrorElement.style.color = "red";
        } else {
            phoneErrorElement.innerHTML = "Correct";
            phoneErrorElement.style.color = "green";
        }
    });
    nameElement.addEventListener("keyup", function(){
        var nameErrorElement= document.getElementById("name_error");
        var nameErrorValue=nameElement.value;
        var pattern = /^[A-Za-z]{3,}$/
        if(!pattern.test(nameErrorValue)) {
            nameErrorElement.innerHTML = "Le name doit contenir  uniquement des lettres et des espaces et au moins 3 caractères";
            nameErrorElement.style.color = "red";
        }
        else {
            musee_nameErrorElement.innerHTML = "Correct";
            musee_nameErrorElement.style.color = "green";
        }
    })
    surnameElement.addEventListener("keyup",function(){
        var surnameErrorElement= document.getElementById("surname_error");
        var surnameErrorValue=surnameElement.value;
        var pattern = /^[A-Za-z]{3,}$/
        if(!pattern.test(surnameErrorValue)){
            surnameErrorElement.innerHTML = "Le surname doit contenir  uniquement des lettres et des espaces et au moins 3 caractères";
            surnameErrorElement.style.color = "red";
        }else
        { surnameErrorElement.innerHTML = "Correct";
            surnameErrorElement.style.color = "green";
    
        }
    });
    
    })