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

function changeCartDisplay(newState){
	let cartdiv = document.getElementsByClassName("cartdiv")[0];
	 

	if(newState=="show"){
		cartdiv.style.display="block";
		document.getElementsByClassName("cartButton")[0].setAttribute("onclick", "changeCartDisplay('hide')");
	}
	else if(newState=="hide"){
		cartdiv.style.display="none";
		document.getElementsByClassName("cartButton")[0].setAttribute("onclick", "changeCartDisplay('show')");
	}
}
