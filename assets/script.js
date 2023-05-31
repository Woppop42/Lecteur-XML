// Fonction permettant l'affichage des infos après le click sur les liens de suggestion
function copyLink(event, link){
    // Préviens le rechargement de la page lors du click : 
    event.preventDefault();
    let url = link;
    // Copie du lien cliqué dans l'input
    document.querySelector('#input').value = url;
    // Click sur le bouton submit afin d'appeler la fonction de lecture et d'affichage
    document.querySelector('#btn').click();
    console.log("ok");
}