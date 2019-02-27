<? 
//se for necessário mudar a config. do php.ini através de seu script 
ini_set("session.use_only_cookies","1"); 
ini_set("session.use_trans_sid","0"); 

//iniciamos a sessão 
$usuario_id = session_name(); 
session_start(); 
session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0); 
//mudamos a duração à cookie da sessão 

//antes de fazer os cálculos, comprovo que o usuário está logado 
//utilizamos o mesmo script que antes 
if ($_SESSION["autenticado"] != "SI") { 
    //se não estiver logado o envio à página de autenticação 
    header("Location: index.php"); 
} else { 
    //senão, calculamos o tempo transcorrido 
    $dataSalva = $_SESSION["ultimoAcesso"]; 
    $agora = date("Y-n-j H:i:s"); 
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva)); 

    //comparamos o tempo transcorrido 
     if($tempo_transcorrido >= 600) { 
     //se passaram 10 minutos ou mais 
      session_destroy(); // destruo a sessão 
      header("Location: index.php"); //envio o usuário à pag. de autenticação 
      //senão, atualizo a data da sessão 
    }else { 
    $_SESSION["ultimoAcesso"] = $agora; 
   } 
} 
?>