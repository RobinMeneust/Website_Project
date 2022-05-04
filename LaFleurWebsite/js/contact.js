function checkIfEmpty(element){
    format_info_box = document.getElementById(element.id+"_format");
    if(element.value.trim()==""){
        element.style.border="solid red 1px";
        format_info_box.style.display="inline";
    }
    else{
        element.style.border="none";
        format_info_box.style.display="none";
    }
}