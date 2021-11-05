$(document).ready(function () {
   //validacion de todos los campos del registro
    $("#btnregistrar").click(function () {
        var exprecion = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
        var exptelefono=/^[0-9]+$/;
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var cedula = $("#cedula").val();
        var correo = $("#correo").val();
        var telefono = $("#telefono").val();
        var contra = $("#contra").val();
        var departamentos = $("#departamentos").val();
        if(nombre==""){
            $("#error1").fadeIn();
            return false;
        }else{
            $("#error1").fadeOut();
            if(apellido==""){
                $("#error2").fadeIn();
                return false;
            }else{
                $("#error2").fadeOut();
                if(cedula==""){
                    $("#error3").fadeIn();
                    return false;
                }else{
                    $("#error3").fadeOut();
                    if(correo=="" || !exprecion.test(correo)){
                        $("#error4").fadeIn();
                        return false;
                    }else{
                        $("#error4").fadeOut();
                        if(telefono=="" || !exptelefono.test(telefono)){
                            $("#error5").fadeIn();
                            return false;
                        }else{
                            $("#error5").fadeOut();
                            if(contra==""){
                                $("#error6").fadeIn();
                                return false;
                            }else{
                                $("#error6").fadeOut();
                                if(departamentos==null){
                                    $("#error7").fadeIn();
                                    return false;
                                }else{
                                    $("#error7").fadeOut();
                                    
                                }
                            }
                        }
                    }
                }
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
                $("#nombre").hide();
                $("#apellido").hide();
                $("#cedula").hide();
                $("#correo").hide();
                $("#telefono").hide();
                $("#contra").hide();
                $("#departamentos").hide();
                $("#btnregistrar").hide();
                $("#error1").hide();
                $("#error2").hide();
                $("#error3").hide();
                $("#error4").hide();
                $("#error5").hide();
                $("#error6").hide();
                $("#error7").hide();
               
                idx=1;
            }else{
                idx=0;
                $("#nombre").show();
                $("#apellido").show();
                $("#cedula").show();
                $("#correo").show();
                $("#telefono").show();
                $("#contra").show();
                $("#departamentos").show();
                $("#btnregistrar").show();
                $("#error1").show();
                $("#error2").show();
                $("#error3").show();
                $("#error4").show();
                $("#error5").show();
                $("#error6").show();
                $("#error7").show();
            }
        })
    }    
    })
    
    