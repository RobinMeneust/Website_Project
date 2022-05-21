function checkStringFormat(element){
    let parent = element.parentNode;
    let isActive = (document.getElementById(element.id+"_format")!=null);
    const regex = new RegExp('^([A-Za-zÀ-ú0-9À-ÖØ-Ýà-öø-ý\' -]*)$');
    //const regex_accents = new RegExp('[À-úÀ-ÖØ-Ýà-öø-ý]');
    //const regex_numbers = new RegExp('[0-9]');
    //const regex_special = new RegExp('[\' -]');


    if(!regex.test(element.value)){ // if the format is incorrect
        if(!isActive){ // if format_info_box doesn't exists
            element.style.border = "solid red 1px";
            let format_info_box = document.createElement("span");
            format_info_box.innerHTML = "Ne doit pas contenir de caractères spéciaux";
            format_info_box.style.color = "red";
            format_info_box.id=element.id+"_format";

            parent.appendChild(format_info_box);
        }
    }
    else{
        if(isActive){ // if format_info_box exists
            element.style.border = "";
            parent.removeChild(document.getElementById(element.id+"_format"));
        }
    }
}