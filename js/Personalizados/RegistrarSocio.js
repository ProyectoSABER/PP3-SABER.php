const selectElementNombre =document.querySelector('.NombreApellido');
const input =document.querySelector('.DNI');
const MAIL =document.querySelector('.Mail');
const optionDni =document.querySelectorAll('.option');


selectElementNombre.addEventListener('change', (event)=>{
    const dni= event.target.value;
    input.placeholder=dni
    let mailbuscado;
    optionDni.forEach(element=>{
      const opt=element.dataset.mail;
      

      if (element.value==dni) {
            
        mailbuscado=opt;
        console.log("mailbuscado",mailbuscado)
    }

    })
    MAIL.placeholder=mailbuscado

})

const selectCatSocio =document.querySelector('.CatSocio');
const inputValorCuota =document.querySelector('.ValorCuota');
const option =document.querySelectorAll('.optionCategoriaSocio');

selectCatSocio.addEventListener('change', (event)=>{
    
    const id = event.target.value;
    
    
    var valorCuota;
    
    option.forEach(element => {

        
        const valorC=element.dataset.cuota;
        

        if (element.value==id) {
            
            valorCuota=valorC;
        }

        
    });

    

    inputValorCuota.placeholder=valorCuota;

})