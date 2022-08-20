const selectElement =document.querySelector('.titulo_libro');
const input =document.querySelector('.ISBN_libro');

selectElement.addEventListener('change', (event)=>{
    
    input.placeholder=event.target.value;

})