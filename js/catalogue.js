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

function zoomIn(element){
	element.style.width="500px";
	let background = document.createElement("div");
	background.id="backgroundForImg";
	document.body.appendChild(background);
	
	element.setAttribute("onclick", "zoomOut(this)");
	element.style.cursor="zoom-out";
	element.style.zIndex="101";
}

function zoomOut(element){
	if(backgroundForImg!=null){
		document.getElementById("backgroundForImg").remove();
	}
	element.style.width="150px";
	element.style.cursor="zoom-in";
	element.style.zIndex="1";
	element.setAttribute("onclick", "zoomIn(this)");
}

function addToCart(imgSrc, id, description, price, stock, cellID){
	let quantity = parseInt(document.getElementById("quantity"+cellID).value);
	if(quantity>0){
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function () {
			if(this.readyState == 4 && this.status == 200){
				const returnedStatus = this.responseText;
				if(returnedStatus=="error")
					console.log("Error in addToCart()");
				console.log(returnedStatus);
			}
		};
		xhttp.open("POST", "../php/addToSessionCart.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("imgSrc="+imgSrc+"&id="+id+"&description="+description+"&price="+price+"&stock="+stock+"&quantity="+quantity);
	}
}