// by default it's hidden
let hiddenCart=true;
let hiddenMenu=true; 

// We show or hide the vertical menu, depending on the previous state ('hide' or 'show')
function changeMenuDisplay(){
	let verticalMenu = document.getElementsByClassName("verticalMenu")[0];
	let verticalMenuTextElements = document.getElementsByClassName("verticalMenuText");

	if(hiddenMenu){
		verticalMenu.style.width="330px";
		for(let i=0; i<verticalMenuTextElements.length; i++)
			verticalMenuTextElements[i].style.display="inline-block";
		hiddenMenu=false;
	}
	else{
		verticalMenu.style.width="70px";
		for(let i=0; i<verticalMenuTextElements.length; i++)
			verticalMenuTextElements[i].style.display="none";
		hiddenMenu=true;
	}
}


// Get the current cart form session variables with AJAX
function getCartHTML(){
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			let carts = document.getElementsByClassName("tableCart");
			for(let i=0; i<carts.length; i++)
				carts[i].innerHTML+=this.responseText;
		}
	};
	xhttp.open("GET", "../php/updateCart.php", true);
	xhttp.send();
}

// Show or hide the cart in the header
function updateCartDisplay(mode){
	let cartdiv = document.getElementById("cartdiv");
	
	//Update the cart content
	let carts = document.getElementsByClassName("tableCart");
	for(let i=0; i<carts.length; i++)
		carts[i].innerHTML="";
	getCartHTML();

	if(mode!="onlyRefresh"){ // if we don't only refresh the content of cartdiv
		if(hiddenCart){
			cartdiv.style.display="block";
			hiddenCart=false;
		}
		else{
			cartdiv.style.display="none";
			hiddenCart=true;
		}
	}
}

// Clear the cart by unsetting all the session variables that contain it
function clearSessionCart(){
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			const returnedStatus = this.responseText;
			if(returnedStatus=="error")
				console.log("Error in addToCart()");
			updateCartDisplay("onlyRefresh");
		}
	};
	xhttp.open("POST", "../php/clearSessionCart.php", true);
	xhttp.send();
}