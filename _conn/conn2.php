<?php
$host = "gstv-rdbms.cnqdpix5zbfx.sa-east-1.rds.amazonaws.com";
$login = "anexxa_network";
$password = "#NewYear@2018$";

$db = "anexxa_transactions";
try 
{
    $anexxa = new PDO('mysql:host='.$host.';dbname='.$db, $login, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $anexxa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{
    echo 'ERROR: ' . $e->getMessage();
}

$db = "sistema";
try 
{
    $sistema = new PDO('mysql:host='.$host.';dbname='.$db, $login, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $sistema->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{
    echo 'ERROR: ' . $e->getMessage();
}

$db = "sistema_latam";
try 
{
    $sistema_latam = new PDO('mysql:host='.$host.';dbname='.$db, $login, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $sistema_latam->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{
    echo 'ERROR: ' . $e->getMessage();
}



$hostname_crm = "gstv-rdbms.cnqdpix5zbfx.sa-east-1.rds.amazonaws.com";
$database_crm = "crm";
$username_crm = "webcrm_201806";
$password_crm = "#NewYear@2018$";
//$chave = md5("#GoodShop611");
try 
{
    $conn_crm = new PDO('mysql:host='.$hostname_crm.';dbname='.$database_crm, $username_crm, $password_crm,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn_crm->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{
    echo 'ERROR: ' . $e->getMessage();
}

	/*$(function($){

			$('#formulario').submit(function(){
		     // Declaração de Variáveis
		     var nome   = $("#txtnome").val();
			 var codigo   = $("#txtcodigo").val();
			 var responsavel   = $("#txtresponsavel").val();
			 var departamento  = $("#txtdapartamento option:selected").val();
			 var descricaopadrao   = $("#txtdescricaopadrao option:selected").val();
			 var condicao   = $("#txtcondicao").val();
			 var descricao   = $("#txtdescricao").val();
			 var data   = $("#txtdata").val();
			 var valor   = $("#txtvalor").val();
			 var categoria   = $("#txtcategoria").val();
			 var status   = $("#txtstatus").val();
			 var notafiscal   = $("#txtnotafiscal").val();
			 //var imgfiscal   = $(".input-file").val();
			 //var imgfiscal = $("#txtimgfiscal").val();
				
		     $("#msgcerto").html("<img itemprop='image' src='ajax/img/loading.gif' alt='Enviando' />");

		     $.post('ajax/cadastrar.php', {
		            txtnome:nome,
		            txtcodigo:codigo,
		            txtresponsavel:responsavel,
		            txtdepartamento:departamento,
				 	txtdescricaopadrao:descricaopadrao,
				 	txtcondicao:condicao,
				 	txtdescricao:descricao,
				 	txtdata:data,
				 	txtvalor:valor,
				 	txtcategoria:categoria,
				 	txtstatus:status,
				 	txtnotafiscal:notafiscal
		        }, function(resposta){
				 
		  			//$("#msgcerta").slideDown();
		            // Se a resposta é um erro
		            if (resposta != false) {
		                // Exibe o erro na div
		               alert(resposta);
					   $('#Modalcadastro').modal('hide');
		            } 
		            // Se resposta for false, ou seja, não ocorreu nenhum erro
		            else {
		                // Exibe mensagem de sucesso
		                alert('foi');
						$('#Modalcadastro').modal('hide');
		                // Coloca a mensagem no div de mensagens
		                //$("#mensagens").prepend("<strong>"  nome  "</strong> disse: <em>"  codigo "</em>");
		                // Limpando todos os campos
		            }
		        });
		    });
		});


		$(document).ready(function(){
		  qualquerCoisa();
		});
		 function qualquerCoisa(){
			$.ajax({
				type:'post',		
				dataType: 'json',	
				url: 'ajax/cadastrar.php',
				success: function(dados){
					for(var i=0;dados.length>i;i++){
						var d = $('#db');
						d.append('<p> Pedido: '+dados[i].id+'</p>');
						d.append('<p> Hambúrguer Pedido: '+dados[i].hamb+'</p>');
						d.append('<p> Observação: '+dados[i].obs+'</p>');

					}
				}
			});
		  }*/
