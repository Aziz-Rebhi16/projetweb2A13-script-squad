function validerFormulaire() {
    const nom = document.getElementById("nom").value;
    const prenom = document.getElementById("prenom").value;
    const sujet = document.getElementById("sujet").value;
    const description = document.getElementById("description").value.trim();

    clearErrors();

    let hasErrors = false;

    if (nom.length < 3) {
        document.getElementById("errnom").innerHTML = "<span style='color : red;'>Le nom doit contenir au moins 3 caractères.</span>";
        hasErrors = true;
    } else {
        document.getElementById("errnom").innerHTML = "<span style='color : green;'>Correct</span>";
    }

    if (prenom.length < 3) {
        document.getElementById("errprenom").innerHTML = "<span style='color : red;'>Le prénom doit contenir au moins 3 caractères.</span>";
        hasErrors = true;
    } else {
        document.getElementById("errprenom").innerHTML = "<span style='color : green;'>Correct</span>";
    }

    
    if (sujet == "-1") {
        document.getElementById("errsujet").innerHTML = "<span style='color : red;'>Veuillez choisir un problème.</span>";
        hasErrors = true;
    } else {
        document.getElementById("errsujet").innerHTML = "<span style='color : green;'>Correct</span>";
    }

  
    if (description.length < 10) {
        document.getElementById("errdescription").innerHTML = "<span style='color : red;'>La description doit contenir au moins 10 caractères.</span>";
        hasErrors = true;
    } else {
        document.getElementById("errdescription").innerHTML = "<span style='color : green;'>Correct</span>";
    }

    return !hasErrors;
}

function clearErrors() {
    const errorContainers = [
        document.getElementById("errnom"),
        document.getElementById("errprenom"),
        document.getElementById("errsujet"),
        document.getElementById("errdescription")
    ];

    errorContainers.forEach(container => {
        container.innerHTML = ""; 
    });
}


document.getElementById("formReclamation").addEventListener('keyup', function (event) {
    event.preventDefault(); 
    validerFormulaire();
});


document.getElementById("sujet").addEventListener('change', function () {
    validerFormulaire();
});


document.getElementById("formReclamation").onsubmit = function (event) {
    if (!validerFormulaire()) {
        event.preventDefault(); 
    }
};