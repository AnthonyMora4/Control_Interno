$(document).ready(function () {

    $("#btninicio").click(function () {
        var correo = $("#correo").val();
        var contra = $("#contra").val();
  
        if(correo==""){
            $("#error1").fadeIn();
            return false;
        }else{
            $("#error1").fadeOut();
            if(contra==""){
                $("#error2").fadeIn();
                return false;
            }else{
                $("#error2").fadeOut();
            }
        }
    });
   
});

//ocultar campos de section cuando se despliega el menu 
addEventListener('DOMContentLoaded', ()=>{
    const btn_menu = document.querySelector('.btn_menu')
    var idx=0;//cambio de variable para validar
    if(btn_menu){
        btn_menu.addEventListener('click', () =>{
            //cambios para mostrar y esconder cuando se despliega el menu con el boton
            if(idx==0){
                $("#correo").hide();
                $("#contra").hide();
                $("#btninicio").hide();
                $("#error1").hide();
                $("#error2").hide();
                idx=1;
            }else{
                idx=0;
                $("#correo").show();
                $("#contra").show();
                $("#btninicio").show();
                $("#error1").show();
                $("#error2").show();
            }
        })
    }    
    });