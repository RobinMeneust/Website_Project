// We show or hide the vertical menu, depending on the previous state ('hide' or 'show')
function changeMenuDisplay(newState){
	let verticalMenu = document.getElementsByClassName("verticalMenu")[0];
	let verticalMenuTextElements = document.getElementsByClassName("verticalMenuText");

	if(newState=="show"){
		verticalMenu.style.width="330px";
		for(let i=0; i<verticalMenuTextElements.length; i++)
			verticalMenuTextElements[i].style.display="inline-block";
		document.getElementsByClassName("verticalMenuButton")[0].setAttribute("onclick", "changeMenuDisplay('hide')");
	}
	else if(newState=="hide"){
		verticalMenu.style.width="70px";
		for(let i=0; i<verticalMenuTextElements.length; i++)
			verticalMenuTextElements[i].style.display="none";
		document.getElementsByClassName("verticalMenuButton")[0].setAttribute("onclick", "changeMenuDisplay('show')");
	}
}


// Get the current cart form session variables with AJAX
function getCartHTML(){
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("tableCart").innerHTML+=this.responseText;
		}
	};
	xhttp.open("GET", "../php/updateCart.php", true);
	xhttp.send();
}

// Show or hide the cart in the header
function updateCartDisplay(newState){
	let cartdiv = document.getElementById("cartdiv");

	if(newState=="show"){
		document.getElementById("tableCart").innerHTML='';
		getCartHTML();
		cartdiv.style.display="block";
		document.getElementsByClassName("cartButton")[0].setAttribute("onclick", "updateCartDisplay('hide')");
	}
	else if(newState=="hide"){
		cartdiv.style.display="none";
		document.getElementsByClassName("cartButton")[0].setAttribute("onclick", "updateCartDisplay('show')");
		document.getElementById("tableCart").innerHTML="";
	}
}
