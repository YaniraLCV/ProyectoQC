/**
 * Created by ycoronel on 05-Dec-16.
 */
function isIE(){
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
}

function procesoLogin(usuario,clave){

    $.ajax({
        type: "POST",
        url: "util/procesoLogin.php",
        data: {
            usuario:usuario,
            clave:clave
        },
        dataType: 'json',
        beforeSend: function(){
            $("#loading_general").empty();
            $("#loading_general").html('<img src="images/loading.gif" height="70" width="70">');
            $("#loading_general").show();
        },
        error: function (request, status, error) {
            alert(request.responseText);
            document.location = 'master.html';
        },
        success: function(respuesta){
            switch (respuesta.estado){
                case 0:
                    alert('Usuario o contraseña incorrectos');
                    break;
                case 1:
                    alert('Usuario sin permisos asignados');
                    break;
                case 2:
                    alert('Usuario inactivo');
                    break;
                case 3:
                    alert('Contraseña incorrecta');
                    break;
                case 4:
                    document.location = 'pages/master.html?pagina=principal';
                    break;
                default:
                    alert('Se ha producido un error');
            }
        },
        complete: function(){
            $("#loading_general").hide();
            $("#clave").val('');
        },
    });
}

$(document).ready(function(){

    //******************************************************** Envio de datos - Ingreso
    $("#form_login").submit(function(){
        var result =  true;

        if(result==true){
            procesoLogin($("#email").val(),$("#password").val());
        }
        return false;
    });

});