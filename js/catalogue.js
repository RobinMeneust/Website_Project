var hidden = 0;

function increase(id) {
	var value = parseInt(document.getElementById('quantity'+id).value); //*Récupère la valeur de l'élément en entier*//
	var max = parseInt(document.getElementById('stockID'+id).innerHTML);
	value = isNaN(value) ? 0 : value;//*S'il n'y a pas de valeur, on met 0. Sinon, on garde la valeur*//
	max = isNaN(max) ? 0 : max;
	value++;//*On augmente la valeur de 1*//
	if(value<=max)
		document.getElementById('quantity'+id).value = value;//*Mettre à jour la valeur affichée*//
		if (value > 0) {
			document.getElementById('button-'+id).disabled = false;
		}
	if(value>=max)
		document.getElementById('button+'+id).disabled = true;
}

function decrease(id) {
	var value = parseInt(document.getElementById('quantity'+id).value);
	value = isNaN(value) ? 0 : value;
	if (value > 0) {
		value--;
		document.getElementById('button+'+id).disabled = false;
	}
	else{
		document.getElementById('button-'+id).disabled = true;
	}
	document.getElementById('quantity'+id).value = value;
}

function checkIfCorrectValue(value, id){
	var max = parseInt(document.getElementById('stockID'+id).innerHTML);
	if(value>max){
		document.getElementById('quantity'+id).value = 1;
	}
	if(value<0){
		document.getElementById('quantity'+id).value = 0;
	}
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