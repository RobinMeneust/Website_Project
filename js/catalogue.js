var hidden = 0; // Used to now whether we should hide or show the content depending on this value

// Increase the quantity of the list id
function increase(id) {
	var value = parseInt(document.getElementById('quantity'+id).value); // Get the product current ordered quantity
	var max = parseInt(document.getElementById('stockID'+id).innerHTML);
	value = isNaN(value) ? 0 : value;// If there is no value then we put a 0 by default, in the other case we keep the value as it is
	max = isNaN(max) ? 0 : max;
	value++;// We increase the quantity by one
	if(value<=max)
		document.getElementById('quantity'+id).value = value;// Update the displayed value
		if (value > 0) {
			document.getElementById('button-'+id).disabled = false;
		}
	if(value>=max)
		document.getElementById('button+'+id).disabled = true;
}

// Decrease the quantity of the list id
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

// Checks if the user input (ordered quantity) is correct
function checkIfCorrectValue(value, id){
	var max = parseInt(document.getElementById('stockID'+id).innerHTML);
	if(value>max){
		document.getElementById('quantity'+id).value = 1;
	}
	if(value<0){
		document.getElementById('quantity'+id).value = 0;
	}
}

// Hide (or show) the stock column
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

// Zoom in the image
function zoomIn(element){
	element.style.width="500px";
	let background = document.createElement("div");
	background.id="backgroundForImg";
	document.body.appendChild(background);
	
	element.setAttribute("onclick", "zoomOut(this)");
	element.style.cursor="zoom-out";
	element.style.zIndex="101";
}

// Zoom out the image
function zoomOut(element){
	if(backgroundForImg!=null){
		document.getElementById("backgroundForImg").remove();
	}
	element.style.width="150px";
	element.style.cursor="zoom-in";
	element.style.zIndex="1";
	element.setAttribute("onclick", "zoomIn(this)");
}

// Add an product to the cart with the given parameter (to be put in a session variable)
function addToCart(imgSrc, id, description, price, stock, cellID){
	let quantity = parseInt(document.getElementById("quantity"+cellID).value);
	if(quantity>0){
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function () {
			if(this.readyState == 4 && this.status == 200){
				const returnedStatus = this.responseText;
				if(returnedStatus=="error")
					console.log("Error in addToCart()");
			}
		};
		xhttp.open("POST", "../php/addToSessionCart.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("imgSrc="+imgSrc+"&id="+id+"&description="+description+"&price="+price+"&stock="+stock+"&quantity="+quantity);
	}
}