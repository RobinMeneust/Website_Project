function buttonDisabled(nbElement) {
	for (let i = 0; i < nbElement; i++) {
		let value = parseInt(document.getElementById('quantity'+i).value);
		let stock = parseInt(document.getElementById('stockID'+i).innerHTML);
		let buttonP = document.getElementById('button+'+i);
		let buttonM = document.getElementById('button-'+i);

		if(value >= stock){
			buttonP.disabled = true;
		}
		if(value <= 1){
			buttonM.disabled = true;
		}
	}


}

function plusSize(id) {

	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	let stock = parseInt(document.getElementById('stockID'+id).innerHTML);
	let button = document.getElementById('button+'+id);

	if(value >= stock ){
		size++;
		total+=price;
		button.disabled = true;
	}else{
		size++;
		total+=price;
		button.disabled = false;
	}
	

	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total.toFixed(2);
}

function minusSize(id) {

	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	let button = document.getElementById('button-'+id);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);


	if(value > 1){
		size--;
		total -= price;
		button.disabled = false;
	}else{
		size--;
		total -= price;
		button.disabled = true;
	}
	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total.toFixed(2);
}

function deleteTr(id, idProduct) {
	let tr = document.getElementById(id);
	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	let confirmation = document.getElementById('buttonConfirmation');

	size -= value;
	total -= value*price;

	if(total <= 0){
		confirmation.setAttribute('disabled', '');
	}else{
		confirmation.setAttribute('enabled', '');
	}

	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total.toFixed(2);
	tr.remove();
	updateCartSession(idProduct);
}

function updateCartSession(idProduct) {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			//console.log(idProduct);
		}
	};
	xhttp.open("GET", "../php/deleteElementCart.php?id=" + idProduct, true);
	xhttp.send();
}

function changeDisabled() {
	let input = document.getElementsByClassName('quantity');

	for (let i = 0; i < input.length; i++) {
		input[i].disabled = false;
	}
}

function goToInvoicePage(){
	window.location="../invoice.php";
}


function saveSessionJs(id,PorM){

	console.log(id);
	console.log(PorM);

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			//console.log(idProduct);
		}
	};
	xhttp.open("GET", "../php/cartSession.php?id="+id+"&PorM="+PorM, true);
	xhttp.send();
}