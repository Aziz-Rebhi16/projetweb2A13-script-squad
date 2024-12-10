                    let panier = [];
        
            document.querySelectorAll('.btn-primary').forEach((button, index) => {
                button.addEventListener('click', () => {
                    const produit = {
                        nom: button.previousElementSibling.previousElementSibling.textContent.trim(),
                        prix: button.previousElementSibling.textContent.trim(),
                    };
                    panier.push(produit);
                    alert(`${produit.nom} ajouté au panier.`);
                    localStorage.setItem('panier', JSON.stringify(panier));
                });
            });
            document.querySelector('form').onsubmit = function(event) {
                console.log('Formulaire soumis !');
            };
            