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
                $("#btnregistrar").hide();
                idx=1;
            }else{
                idx=0;
                $("#nombre").show();
                $("#apellido").show();
                $("#cedula").show();
                $("#correo").show();
                $("#telefono").show();
                $("#contra").show();
                $("#btnregistrar").show();
            }
        })
    }    
    
    })