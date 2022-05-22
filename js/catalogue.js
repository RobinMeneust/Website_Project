var hidden = 0;

function increase(idQuantity, idButton) {
	var value = parseInt(document.getElementById(idQuantity).value); //*Récupère la valeur de l'élément en entier*//
	value = isNaN(value) ? 0 : value;//*S'il n'y a pas de valeur, on met 0. Sinon, on garde la valeur*//
	value++;//*On augmente la valeur de 1*//
	document.getElementById(idQuantity).value = value;//*Mettre à jour la valeur affichée*//
	if (value > 0) {
		document.getElementById(idButton).disabled = false;
	}
}

function decrease(idQuantity, idButton) {
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

function hide() {
	var elements = document.getElementsByClassName("stockColumn");
	var i;
	if (hidden == 0) {
		for(var i=0;i<elements.length;i++)
		{
			elements[i].style.display="none";
		}
		document.getElementById("buttonHideStock").textContent = "Afficher stock";
		hidden=1;
	}
	else{
		for(var i=0;i<elements.length;i++)
		{
			elements[i].style.display="table-cell";
		}
		document.getElementById("buttonHideStock").textContent = "Cacher stock";
		hidden=0;
	}
}