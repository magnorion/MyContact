/*
  myMsg Scripts
*/
(function($){
  "use strict";
  $(document).ready(function(){
    var the_btn = $("#myMsg_container");
    var the_container = $("#myMsg_form");
    var the_close = $("#myMsg_close");

    // Animação do botão
    the_btn.stop().animate({"bottom":"0%"},1000);
    the_btn.on({
      "mouseenter":function(){
        var self = $(this);
        self.find("i").stop().animate({"opacity":0},100,function(){
          $(this).removeClass("fa-envelope").addClass("fa-pencil").animate({"opacity":1},200);
        });
      },
      "mouseleave":function(){
        var self = $(this);
        self.find("i").stop().animate({"opacity":0},100,function(){
          $(this).removeClass("fa-pencil").addClass("fa-envelope").animate({"opacity":1},200);
        });
      }
    });

    // Habilita o drag do jQUery UI
    the_container.draggable({handle:".myMsg_title"});

    // Abrir
    the_btn.click(function(){
      the_container.css("display","block").stop().animate({"opacity":1},500);
    });

    // Fechar
    the_close.click(function(){
      the_container.animate({"opacity":0},500,function(){
        the_container.css("display","none");
      });
    });
    $("#btn_close_text").click(function(){
      the_container.animate({"opacity":0},500,function(){
        the_container.css("display","none");
      });
    });

    var form = the_container.find("form");

    // Celular mask
    form.find("p input[name='celular']").mask('(00) 0000-0000r',{
      translation:{
        "r":{
          pattern: /[0-9]/, optional: true
        }
      }
    });

    var sender = the_container.find("#sendData");
    sender.click(function(e){
      e.preventDefault();

      // Recebe os dados como um Json
      var dados = {
        nome: form.find("input[name='nome']").val(),
        email: form.find("input[name='email']").val(),
        celular: form.find("input[name='celular']").val(),
        curso: form.find("input[name='curso']").val(),
        assunto: form.find("select[name='assunto']").val(),
        mensagem: form.find("textarea[name='mensagem']").val()
      };

      // Valida os dados!
      // Função de input
      function input_checker(input,type){
        if(type == "error"){
          input.addClass("input-error").focus();
        }else{
          input.removeClass("input-error");
        }
      }

      var input = "";
      $.each(dados,function(key,value){
        console.log(key);
        if(key == "assunto"){
          console.log(value);
          if(value == ""){
            input = form.find("select[name='"+key+"']");
            input_checker(input,"error");
            return false;
          }else{
            input = form.find("select[name='"+key+"']");
            input_checker(input,"pass");
          }
        }
        else if(key == "mensagem"){
          if(value == ""){
            input = form.find("textarea[name='"+key+"']");
            input_checker(input,"error");
            return false;
          }else{
            input = form.find("textarea[name='"+key+"']");
            input_checker(input,"pass");
          }
        }else if(key == "email"){
          input = form.find("input[name='"+key+"']");
          var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(!re.test(value)){
            input_checker(input,"error");
            return false;
          }else{
            input_checker(input,"pass");
          }
        }else if(key == "celular" && value.length < 7){
          input = form.find("input[name='"+key+"']");
          input_checker(input,"error");
          return false;
        }
        else{
          if(value == ""){
            input = form.find("input[name='"+key+"']");
            input_checker(input,"error");
            return false;
          }else{
            input = form.find("input[name='"+key+"']");
            input_checker(input,"pass");
          }
        }
      });
      var input_error = form.find(".input-error");
      if(input_error.length > 0) return false;
      // endValida!

      // Se todos os dados estiverem ok, desabilita o botão!
      sender.prop("disabled",true);

      // Envia os dados!
      $.ajax({
        url: ajaxurl,
        method: "POST",
        data:{
          action: "send_form_email",
          dados: dados
        }
      }).done(function(data){
        if(data == "Message has been sent0"){
          the_container.css("transition","1s ease").css({"transform":"rotateY(180deg)"});
          the_container.find("#box_msg_final").css({"transition":"1s ease","display":"block"});
          setTimeout(function(){
            the_container.find("#box_msg_final").css({"opacity":"1"});
          },50);
          the_btn.stop().animate({"bottom":"-10%","opacity":"0"},1000,function(){
            the_btn.remove();
          });
        }else{
          $("#msgAfterSend").css("color","#ff0000").text("Houve um Erro!");
        }
      });
    });
  });
})(jQuery);
