 <!--</div>Fim do container-->
</div> <!--Fim do wrapper-->
</div> <!--Fim do wrapper-->
<div class="container-rodape">
	<hr>
	<p class="text-center font-weight-light">Anexxa Patrimônio 1.0 - Desenvolvimento Web - Anexxa Group</p>
</div>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!---->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="js/Chart/samples/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript" src="js/validator/dist/validator.js"></script>
<script type="text/javascript" src="js/validator/dist/validator.min.js"></script>
<script>

$("#txtvalor").maskMoney({ 
	allowNegative: true, 
	thousands:'.', 
	decimal:',', 
	affixesStay: false
});

$("#txtvsvalor").maskMoney({ 
	allowNegative: true, 
	thousands:'.', 
	decimal:',', 
	affixesStay: false
});
	
function letras(){
	tecla = event.keyCode;
	if (tecla >= 48 && tecla <= 57){
	    return true;
	}else{
	   return false;
	}
}

/*Modal cadastrar*/		
$(function () {

  'use strict';

  $('.input-file').each(function () {
    var $input = $(this),
    $label = $input.next('.js-labelFile'),
    labelVal = $label.html();

    $input.on('change', function (element) {
      var fileName = '';
      if (element.target.value) fileName = element.target.value.split('\\').pop();
      fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
    });
  });
});
/*Modal editar*/
$(function () {

'use strict';

  $('.input-file2').each(function () {
    var $input = $(this),
    $label = $input.next('.js-labelFile2'),
    labelVal = $label.html();

    $input.on('change', function (element) {
      var fileName = '';
      if (element.target.value) fileName = element.target.value.split('\\').pop();
      fileName ? $label.addClass('has-file2').find('.js-fileName2').html(fileName) : $label.removeClass('has-file2').html(labelVal);
    });
  });
 }); 
  /*Modal manutenção*/
  $(function () {

'use strict';

  $('.input-file3').each(function () {
    var $input = $(this),
    $label = $input.next('.js-labelFile3'),
    labelVal = $label.html();

    $input.on('change', function (element) {
      var fileName = '';
      if (element.target.value) fileName = element.target.value.split('\\').pop();
      fileName ? $label.addClass('has-file3').find('.js-fileName3').html(fileName) : $label.removeClass('has-file3').html(labelVal);
    });
  });
});
 </script>  
</body>
</html>