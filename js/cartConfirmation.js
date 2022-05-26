function plusSize(id) {

	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	let stock = parseInt(document.getElementById('stockID'+id).innerHTML);
	let button = document.getElementById('button+'+id);

	if(value >= stock ){
		button.disabled = true;
	}else{
		button.disabled = false;
	}
	
	size++;
	total+=price;
	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total;
}

function minusSize(id) {

	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	let button = document.getElementById('button-'+id);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);

	if(value > 0){
		size--;
		total -= price;
		button.disabled = false;
	}else{
		size--;
		total -= price;
		button.disabled = true;
	}
	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total;
}

function deleteTr(id, idProduct) {
	let tr = document.getElementById(id);
	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	
	size -= value;
	total -= value*price;

	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total;
	tr.remove();
	updateCartSession(idProduct);
}

function updateCartSession(idProduct) {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			console.log(idProduct);
		}
	};
	xhttp.open("GET", "../php/deleteElementCart.php?id=" + idProduct, true);
	xhttp.send();
}
