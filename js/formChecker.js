function checkStringFormat(element, mode="default"){
	let parent = element.parentNode;
	let isActive = (document.getElementById(element.id+"_format")!=null);
	let isIncorrect = false;
	let errorMsg="";
	const regex_default = new RegExp('^([A-Za-zÀ-ú0-9À-ÖØ-Ýà-öø-ý\' -]*)$');
	const regex_tel = new RegExp('^([0-9]*)$');
	const regex_username = new RegExp('^([A-Za-z0-9_]*)$');
	const regex_passwd = new RegExp('^([A-Za-z0-9À-ÖØ-Ýà-öø-ý~!@#$%^&*_+=<>.?/-]*)$');

	if(element.value==""){
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
	else{
		isIncorrect = !regex_default.test(element.value);
		errorMsg = "<br>Ne doit pas contenir de caractères spéciaux (mais plusieurs accents sont autorisés)";
	}

	console.log(isIncorrect);

	if(isIncorrect){ // if the format is incorrect
		if(!isActive){ // if format_info_box doesn't exists
			element.style.border = "solid red 1px";
			let format_info_box = document.createElement("span");
			format_info_box.innerHTML = errorMsg;
			format_info_box.style.color = "red";
			format_info_box.id=element.id+"_format";

			parent.appendChild(format_info_box);
		}
		else{
			document.getElementById(element.id+"_format").innerHTML=errorMsg;
		}
	}
	else{
		if(isActive){ // if format_info_box exists
			element.style.border = "";
			parent.removeChild(document.getElementById(element.id+"_format"));
		}
	}
}