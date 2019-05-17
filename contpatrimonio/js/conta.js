 /*$("form[name=ativaconta]").on('change', function(){
  //$("#btnAtualizar").hide();
  var chkativa = $('input[name=checkbox]').val();
  var txtcodigo = $('input[name=txtcodigo]').val();
  $.post( this.action,{checkbox: chkativa, txtcodigo: txtcodigo}, function(resposta){
  	$("#resultados").html(resposta);
 
  });
  return false;
});

*/

// Quando enviado o formulário
$('form[name=ativaconta]').on('change', function () {
    // Enviando formulário
    $(this).ajaxSubmit({
        // Se enviado com sucesso
        success: function (resposta) {
            // Exibindo resposta do servidor
            $("#msg_conta").html(resposta);
            window.setTimeout(function() {$(".acesso").fadeTo(500, 0).slideUp(500, function(){$(".acesso").remove();});}, 3000)
        },
        // Se acontecer algum erro
        error: function () {

        }
 
    });
 
    // Retorna FALSE para que o formulário não seja enviado de forma convencional
    return false;
 
});