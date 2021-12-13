

function calcsurface() {
    var city = document.querySelector('#city').value;
    var length = document.querySelector('#length').value;
    var width = document.querySelector('#width').value;
    var surface = width * length;
    if (city != "") {
        if (length != "" && width != "") {
            res = width * length
            alert("Votre terrain à " + city + " fait " + res + " m2")
        } else {
            alert("Merci de saisir des valeurs pour la longueur et la largeur.")
        }
    } else {
        alert("Merci de saisir une valeur pour le champ \"ville\".")
    }
}