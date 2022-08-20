
const form =document.getElementsByClassName("newUserForm");
const pass= document.getElementById('password');
const validationPass= document.getElementById('validationPass');

validationPass.addEventListener("input", (e)=>{
    const p1=pass.value;
    const p2=e.target.value;
    
    if(p1!=p2){
        validationPass.setCustomValidity("Las Contraseñas no coinciden! Las Contraseñas deben de coincidir")

    }else{
        validationPass.setCustomValidity('')
    }
    




});

form.addEventListener('submit', (e)=>{
    

})