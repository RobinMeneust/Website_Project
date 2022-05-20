function augmenter(idQuantity, idButton) {

    var value = parseInt(document.getElementById(idQuantity).value); //*Récupère la valeur de l'élément en entier*//
    value = isNaN(value) ? 0 : value;//*S'il n'y a pas de valeur, on met 0. Sinon, on garde la valeur*//
    value++;//*On augmente la valeur de 1*//
    document.getElementById(idQuantity).value = value;//*Mettre à jour la valeur affichée*//
    if (value > 0) {
        document.getElementById(idButton).disabled = false;
    }
}
function diminuer(idQuantity, idButton) {

    var value = parseInt(document.getElementById(idQuantity).value);
    value = isNaN(value) ? 0 : value;
    if (value > 0) {
        value--;
    }
    else if (value == 0) {
        document.getElementById(idButton).disabled = true;
    }
    document.getElementById(idQuantity).value = value;

}
var cacher = 0;
function Cacher() {
    var tds = document.getElementsByClassName('colonne');
    var i;
    if (cacher == 0) {
        for(var i=0;i<tds.length;i++)
  {
   tds[i].style.display="none";
  }
        document.getElementById("aligneDroit").textContent = "Afficher stock";
        cacher=1;
    }
    else{
        for(var i=0;i<tds.length;i++)
  {
   tds[i].style.display="table-cell";
  }
  document.getElementById("aligneDroit").textContent = "Cacher stock";
        cacher=0;
    }
}