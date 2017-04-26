$(document).ready(function() {
    "use strict";

    //MODO DE PRUEBAS
    var DEBUG = false;
    //navegación del header
    $(".navbar-nav a").on('click', function() {
      $('.navbar-nav li').removeClass("active");
      $(this).parent().addClass("active");
      DEBUG == true && console.log("Menu Cliqueado: " + $(this));
    });


    //FOMULARIO PARA REST
    $('#login').on('submit', function(e) {
        e.preventDefault();

        DEBUG == true && console.log("Formulario enviado");

        var url_rest = $(".resurl").val();
        if(url_rest == "") {
          $('#respuesta').addClass('alert-danger');
          $('#respuesta').html('Ingrese la URL de la API REST');
        }
        else {
          $.ajax({
              url: url_rest // URL A MODIFICAR (json)
          }).then(function(data) {

              DEBUG == true && console.log("Recibido" + data);

              $('#respuesta').removeClass('alert-success');
              $('#respuesta').removeClass('alert-danger');
              var response = data;
              if(response == true){
                $('#respuesta').addClass('alert-success');
                $('#respuesta').html('Ha ingresado correctamente: ' + response);
              }
              else {
                $('#respuesta').addClass('alert-danger');
                $('#respuesta').html('Los datos son incorrectos: ' + response);
              }
          });
        }
        return false;
    });


    //SELECTOR DE REGIONES
    $('#regiones').on('change', function (e) {
      var region = this.value;

      DEBUG == true && console.log("Select cambiado, valor" + region);

      if(region == "") {
        $(".comunas").hide();
      }
      else {
        $.ajax({
            method: "POST",
            url: "ajax.php",
            data: {
              padre: region,
              accion: "obtener_comunas"
            }
        }).then(function(data) {
            $(".comunas").show();
            $("#comunas").html(data);
            DEBUG == true && console.log("Select retorno, valor" + data);
        });
      }
      mostrar_formulario();
    });
    //SELECTOR DE COMUNAS
    $('#comunas').on('change', function (e) {
      var comuna = this.value;
      mostrar_formulario();
    });


    //MMUESTRA EL FORMULARIO DADA LAS CONDICIONES
    function mostrar_formulario() {
      $("#response").hide();

      if($('#comunas').val() == 37 && $('#regiones').val() == 5) {
        $(".formulario").show();
      }
      else {
        $("#response").show();
        $(".formulario").hide();
        //$("#response").toggleClass("alert-warning alert-success");
      }
    }

    //Muestra los estados de los inputs
    $('.status').keyup(function(){
     var letras = $(this).val().length;
     if(letras < 5) {
       $(this).parent().addClass("has-error").removeClass("has-success");
       $(this).parent().find("glyphicon-ok").hide();
     }
     else {
       $(this).parent().addClass("has-success").removeClass("has-error");
       $(this).parent().find(".glyphicon-ok").show();
     }
   });


   //FORMULARIO DE REGISTRO
   $('#enviar_postulacion').on('submit', function (e) {
     e.preventDefault();
     var nombre   = $("#nombre").val();
     var email    = $("#email").val();
     var mensaje  = $("#mensaje").val();
     $(".posutlar").hide();
     $("input").attr("disabled", "disabled");
     $("textarea").attr("disabled", "disabled");
     $.ajax({
         method: "POST",
         url: "ajax.php",
         data: {
           accion: "enviar_postulacion",
           nombre: nombre,
           email: email,
           mensaje: mensaje,
         }
     }).then(function(data) {
         $("#response").html(data);
         $("#response").show();
         $(".posutlar").show();
         $("input").removeAttr("disabled");
         $("textarea").removeAttr("disabled");
         DEBUG == true && console.log("Retorno Form, valor" + data);
     });

  });

  $(".descargar-github").on('click', function (e) {
    e.preventDefault();
    window.location = "https://github.com/LectorRSS/xpressiumTest";
  });
});
