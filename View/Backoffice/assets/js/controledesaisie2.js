function validerFormulaire() {
    const contenu = document.getElementById("contenu_rep").value.trim();

    clearErrors();

    let hasErrors = false;

    if (contenu === "") {
        document.getElementById("errcontenu").innerHTML = "<span style='color: red;'>La réponse ne peut pas être vide.</span>";
        hasErrors = true;
    } else if (contenu.length < 10) {
        document.getElementById("errcontenu").innerHTML = "<span style='color: red;'>La réponse doit contenir au moins 10 caractères.</span>";
        hasErrors = true;
    } else {
        document.getElementById("errcontenu").innerHTML = "<span style='color: green;'>Correct</span>";
    }

    return !hasErrors;
}

function clearErrors() {
    const errorContainers = [
        document.getElementById("errcontenu")
    ];

    errorContainers.forEach(container => {
        container.innerHTML = ""; 
    });
}

document.getElementById("contenu_rep").addEventListener('keyup', function () {
    validerFormulaire();
});

document.getElementById("formrep").onsubmit = function (event) {
    if (!validerFormulaire()) {
        event.preventDefault();
    }
};