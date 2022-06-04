// Check if a string is in a valid format that is given as parameters
function checkStringFormat(element, mode="default", canBeEmpty=false){
	let parent = element.parentNode;
	let isActive = (document.getElementById(element.id+"_format")!=null);
	let isIncorrect = false;
	let errorMsg="";
	const regex_default = new RegExp('^([A-Za-zÀ-ú0-9À-ÖØ-Ýà-öø-ý\' -]*)$');
	const regex_withoutSpaces = new RegExp('^([A-Za-zÀ-ú0-9À-ÖØ-Ýà-öø-ý\'-]*)$');
	const regex_tel = new RegExp('^([0-9]*)$');
	const regex_username = new RegExp('^([A-Za-z0-9_]*)$');
	const regex_login = new RegExp('^([A-Za-z0-9_@.]*)$');
	const regex_passwd = new RegExp('^([A-Za-z0-9À-ÖØ-Ýà-öø-ý~!@#$%^&*_+=<>.?/-]*)$');
	const regex_name = new RegExp('^([A-Za-zÀ-ÖØ-Ýà-öø-ý \'-]*)$');
	

	if(!canBeEmpty && element.value.trim()==""){
		isIncorrect = true;
		errorMsg = "<br>Ne doit pas être vide";
	}
	else if(mode=="tel"){
		isIncorrect = !regex_tel.test(element.value);
		errorMsg = "<br>Ne doit contenir que des chiffres";
	}
	else if(mode=="username"){
		isIncorrect = !regex_username.test(element.value);
		errorMsg = "<br>Ne doit contenir que des lettres, des chiffres ou le caractère : _";
	}
	else if(mode=="passwd"){
		isIncorrect = !regex_passwd.test(element.value);
		errorMsg = "<br>Ne doit contenir que des lettres (accents acceptés), des chiffres ou les caractères : ~!@#$%^&*_+=<>.?/-";
	}
	else if(mode=="login"){
		isIncorrect = !regex_login.test(element.value);
		errorMsg = "<br>Ne doit contenir que des lettres (sans accent), des chiffres ou les caractères : @.";
	}
	else if(mode=="name"){
		isIncorrect = !regex_name.test(element.value);
		errorMsg = "<br>Ne doit contenir que des lettres des espaces ou les caractères : \'-";
	}
	else if(mode=="noSpaces"){
		isIncorrect = !regex_withoutSpaces.test(element.value);
		errorMsg = "<br>Ne doit pas contenir d'espace. Sont autorisés : les lettres et les caractères : \'-";
	}
	else{
		isIncorrect = !regex_default.test(element.value);
		errorMsg = "<br>Ne doit pas contenir de caractères spéciaux (mais plusieurs accents sont autorisés)";
	}

	if(isIncorrect){ // if the format is incorrect
		if(!isActive){ // if format_info_box doesn't exists (we create it)
			element.style.border = "solid red 1px";
			let format_info_box = document.createElement("span");
			format_info_box.innerHTML = errorMsg;
			format_info_box.style.color = "red";
			format_info_box.id=element.id+"_format";

			parent.appendChild(format_info_box);
		}
		else{ // if it exists we just update the error message
			document.getElementById(element.id+"_format").innerHTML=errorMsg;
		}
		document.getElementById("sendFormButton").disabled="disabled";
	}
	else{
		if(isActive){ // if format_info_box exists then we delete it (because the input is now valid)
			element.style.border = "";
			parent.removeChild(document.getElementById(element.id+"_format"));
		}
		document.getElementById("sendFormButton").disabled="";
	}
}