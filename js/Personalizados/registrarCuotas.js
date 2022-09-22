//funcion que devuelve las fechas seleccionables de un mes
function fechaInicio(primerDia) {
  let hoy = new Date();
  hoy.setDate(hoy.getDate() + 1);
  return primerDia > hoy ? primerDia : hoy;
}
function ocultarInputInicio(){
  $("div .FVencimiento").hide();
  $("#FVencimiento").attr("disabled", true);
  $(".Categoria_Socios").hide();
  $(".input_valorCuota").hide();
  $(".input_valorCuota input").attr("disabled", true);
}
$(document).ready(function () {
  ocultarInputInicio();
 //Evento en Input Mes
  $("#InputMes").change(function () {
    //obtenemos año y mes seleccionado del input
    let añoSeleccionado = $(this).val().substr(0, 4);
    let mesSeleccionado = $(this).val().substr(5);

    //mostramos el selector de fecha de vencimiento
    if($(this).val()==""){
      $("#FVencimiento").attr("disabled",true)
      $("div .FVencimiento").hide();
      }      
      else{
        
        $("div .FVencimiento").show(500);
        $("#FVencimiento").attr("disabled",false)

     
    
      }

    
    //mostramos el input#FVencimiento
  
  
    

    let date = new Date(añoSeleccionado, mesSeleccionado);
    let primerDia = new Date(date.getFullYear(), date.getMonth() - 1, 1);

    let fechainicio = fechaInicio(primerDia);
    let ultimoDia = new Date(date.getFullYear(), date.getMonth(), 0);

    primerDia = String(fechainicio.getDate()).padStart(2, "0");
    ultimoDia = ultimoDia.getDate();

    let fechaMinimaASeleccionar =
      añoSeleccionado + "-" + mesSeleccionado + "-" + primerDia;

    let fechaMaximaASeleccionar =
      añoSeleccionado + "-" + mesSeleccionado + "-" + ultimoDia;

    $("#FVencimiento").attr("min", fechaMinimaASeleccionar);
    $("#FVencimiento").attr("max", fechaMaximaASeleccionar);
  });


 //Evento en Input FechaVencimiento
  $("#FVencimiento").change(function () {
    
     //mostramos el selector de fecha de vencimiento

     if($(this).val()==""){
       /* $("Categoria_Socios").hide(); */
       resetCheckbox();
       resetInputValorCuota();
      }      
      else{
        
       //mostramos los imputCheck
      $("div .Categoria_Socios").show(500);

     
    
      }


  });

 //Evento en Input Check
  $(".checkSocio").change(function () {
    //mostramos los imput money
    let attrName = $(this).attr("name");
    
    $(this).siblings("div").toggle(500).children();
    
    if (
      $(this).siblings("div").children("div:last").children("input").attr("disabled") == "disabled"
      ) {
        $(this).siblings("div").children("div:last").children("input").attr("disabled", false);
      } else {
        $(this).siblings("div").children("div:last").children("input").attr("disabled", true).val("");
        
    }
  });
//Evento en ButtonRegistrar
  $("#btn_registrar").click(function(e){
    e.preventDefault();
    agregar_datos();

  })

});

function agregar_datos(){
  let datos = $("#formAñadirCuota").serialize();
  console.log(datos);
}

function resetCheckbox(){
  $(".checkSocio").prop("checked",false)
}
function resetInputValorCuota(){
  $(".inputVcuota").attr("disabled", true).val("")
}