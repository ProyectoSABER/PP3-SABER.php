const selectElementNombre =document.querySelector('.NombreApellido');
const input =document.querySelector('.DNI');

selectElementNombre.addEventListener('change', (event)=>{
    
    input.placeholder=event.target.value;

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