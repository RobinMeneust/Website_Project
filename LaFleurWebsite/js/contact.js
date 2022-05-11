function checkStringFormat(element){
    let isNotValid = false;
    let parent = element.parentNode;
    let isActive = document.getElementById(element.id+"_format");
    //const regexWithAccents = new RegExp('[A-zÀ-ú0-9\-_@]*');
    ///^([a-z0-9]{5,})$/
    //const regexWithoutAccents = new RegExp('[A-z0-9\-_@]*');

    isNotValid = ! (/^([A-zÀ-ú0-9\-@]*)$/.test(element.value));
    isNotValid |= / /.test(element.value);
    if(isNotValid){
        if(!isActive){ // if format_info_box doesn't exists
            element.style.border = "solid red 1px";
            let format_info_box = document.createElement("span");
            format_info_box.innerHTML = "Ne doit pas contenir de caractères spéciaux"
            format_info_box.style.color = "red";
            format_info_box.id=element.id+"_format"

            parent.appendChild(format_info_box);
        }
    }
    else{
        if(isActive){ // if format_info_box exists
            element.style.border = "";
            parent.removeChild(document.getElementById(element.id+"_format")); // remove(isActive) is equivalent but for semantic purposes it's clearer to do so
        }
    }
}