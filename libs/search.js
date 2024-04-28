var form = document.getElementById("form");
form.onsubmit = function(e){    
    e.preventDefault();
    if(!validate()){
        $.alert({
            title: 'Alerta del Sistema!',
            content: 'Debe ingresar texto o palabra para realizar una búsqueda',
            type: 'blue'            
        });

        return;
    }
    
    // Obtenemos los datos del formulario 
    var f = $(this);
    var formData = new FormData(document.getElementById(this));
    formData.append("dato", "valor");
           
    // Enviamos los datos al archivo PHP que procesará el envio de los datos a un determinado correo 
    $.ajax({
        url: "php/enviarcorreo.php",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('.msg').html("<img src='img/ajax-loader.gif' />");
        },
    })    
    .done(function (res) {                  

    //   if(res.a == "1"){
                
    //     // Mostramos el mensaje 'Tu Mensaje ha sido enviado Correctamente !' 
    //     $(".msg").html(res.b);                   
    //     $("#formulario_contacto").trigger("reset");    

    //   }  else {                                       
    //     $(".msg").html(res.b); 
    //   }
                                                  
    })

    // Mensaje de error al enviar el formulario 
    .fail(function (res) {   
        $.alert({
            title: 'Alerta del Sistema!',
            content: res.b,
            type: 'blue'            
        });                         
    });
}

function validate()
{
    let bandera = true;
    let txtBuscar = document.getElementById("txtBuscar");

    if(txtBuscar.value == ""){
        bandera = false;
    } 

    return bandera;
}