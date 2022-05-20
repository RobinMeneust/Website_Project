function changeMenuDisplay(newState){
    let verticalMenu = document.getElementsByClassName("verticalMenu")[0];
    let verticalMenuTextElements = document.getElementsByClassName("verticalMenuText");

    if(newState=="show"){
        verticalMenu.style.width="17vw";
        for(let i=0; i<verticalMenuTextElements.length; i++)
            verticalMenuTextElements[i].style.display="inline-block";
        document.getElementsByClassName("verticalMenuButton")[0].setAttribute("onclick", "changeMenuDisplay('hide')");
    }
    else if(newState=="hide"){
        verticalMenu.style.width="2vw";
        for(let i=0; i<verticalMenuTextElements.length; i++)
            verticalMenuTextElements[i].style.display="none";
        document.getElementsByClassName("verticalMenuButton")[0].setAttribute("onclick", "changeMenuDisplay('show')");
    }
}