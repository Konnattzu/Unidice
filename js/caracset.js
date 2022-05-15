

caracset = document.getElementByClass("caracset");
caracset.addEventListener("click", rollset);

$(document).ready(function () {
    $(caracset).click(function(e) {

            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            return false;
    });});

function click(){
id = this.getAttribute("id");
var roll = 20;
fieldset = document.getElementByName("carac"+id);
fieldset.setAttribute("value",roll);
}

