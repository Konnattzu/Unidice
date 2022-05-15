

caracset = document.getElementsByClassName("caracset");
caracset.addEventListener("click", rollset);

$(document).ready(function () {
    $(caracset).click(function(e) {

            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            return false;
    });});

function rollset(){
id = this.getAttribute("id");
var roll = 20;
fieldset = document.getElementByName("carac"+id);
fieldset.setAttribute("value",roll);
}

