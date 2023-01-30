
/* Ejemplo Estructura IF - aprenderaprogramar.com */

function confirmacion(){

if (confirm("¿esta seguro que desea eliminar el registro?")) {

    return true;

} else {

    e.preventDefault();

}}

let linkDelete= document.querySelectorAll(".dropdown-item");

for(var i=0;i< linkDelete.length; i++){

    linkDelete[i].addEventListener('Click',confirmacion);
}