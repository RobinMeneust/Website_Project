// change the size of the cart when a product is removed with the button "+" in the cart
function plusSize(id) {
	// 'id' is the number of the element in the table that we need the information of

	// we get all the elements necessary for the management of the buttons
	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	let stock = parseInt(document.getElementById('stockID'+id).innerHTML);
	let button = document.getElementById('button+'+id);

	// we disable the button or not depending on the stock and quantity
	if(value >= stock ){
		size++;
		total+=price;
		button.disabled = true;
	}else{
		size++;
		total+=price;
		button.disabled = false;
	}
	
	// we rewrite the element with new value
	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total.toFixed(2);
}

// change the size of the cart when a product is added with the button "-" in the cart
function minusSize(id) {
	// 'id' is the number of the element in the table that we need the information of


	// we get all the elements necessary for the management of the buttons
	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	let button = document.getElementById('button-'+id);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);

	// we disable the button or not depending on the stock and quantity
	if(value > 1){
		size--;
		total -= price;
		button.disabled = false;
	}else{
		size--;
		total -= price;
		button.disabled = true;
	}

	// we rewrite the element with new value
	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total.toFixed(2);
}

// remove a product of the cart when the button "X" is clicked
function deleteTr(id, idProduct) {
	/*
	'id' is the number of the element in the table that we need the information of
	'idProduct' is the real id of the product, within the session variable "$_SESSION['cart'];"
	*/

	// we get all the elements necessary for the management of the buttons
	let tr = document.getElementById(id);
	let size = parseInt(document.getElementById('cartSize').innerHTML);
	let total = parseFloat(document.getElementById('total').innerHTML);
	let price = parseFloat(document.getElementById('price'+id).innerHTML);
	let value = parseInt(document.getElementById('quantity'+id).value);
	let confirmation = document.getElementById('buttonConfirmation');

	// we remove the element from the size and from the total price
	size -= value;
	total -= value*price;

	// we check if the cart has still product inside. If not, we disable the button for the confirmation
	if(total <= 0){
		confirmation.setAttribute('disabled', '');
	}else{
		confirmation.setAttribute('enabled', '');
	}

	// we rewrite the element with new value
	document.getElementById('cartSize').innerHTML = size;
	document.getElementById('total').innerHTML = total.toFixed(2);
	// we remove de the row of the product in the table
	tr.remove();
	// we update the session variable "$_SESSION['cart']";
	updateCartSession(idProduct);
}

// call the php file "/php/deleteElementCart.php" and remove the product from the cart
function updateCartSession(idProduct) {
	// 'idProduct' is the real id of the product, within the session variable "$_SESSION['cart'];"

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			//console.log(idProduct);
		}
	};
	xhttp.open("GET", "../php/deleteElementCart.php?id=" + idProduct, true);
	xhttp.send();
}

// enable every input inside the cart, necessary to send the form
function changeDisabled() {
	let input = document.getElementsByClassName('quantity');

	for (let i = 0; i < input.length; i++) {
		input[i].disabled = false;
	}
}

// change to a new file
function goToInvoicePage(){
	window.location="../invoice.php";
}

/*
call the php file "/php/cartSession.php" and to update the quantity inside the session variable "$_SESSION['cart'];"
and add or remove a quantity depending on the button clicked (+1 or -1)
*/
function saveSessionJs(id,PorM){
	/*
	'id' is the real id of the product, within the session variable "$_SESSION['cart'];"
	'PorM' is either a '+' or a '-'
	*/

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			//console.log(idProduct);
		}
	};
	xhttp.open("GET", "../php/cartSession.php?id="+id+"&PorM="+PorM, true);
	xhttp.send();
}