<?php
//require_once('vendor/autoload.php'); //realizando o autoload do composer;
require_once "Mobile/Mobile_Detect.php";
$detect = new Mobile_Detect; //criando uma nova instância de Mobile_Detect
if ($detect->isMobile())  //se o dispositivo é um dispositivo móvel
{
	print 'Você está usando um dispositivo móvel <br/>'; //imprima "Você está utilizando um dispositivo móvel"
    if ($detect->is('iphone')) //se o dispositivo for um iPhone
    {
        print 'A versão do seu iPhone é: ' . $detect->version('iPhone'); //imprima "A versão do seu iPhone é: (versão)"
    }
    if ($detect->is('ipad')) //se o dispositivo for um iPad
    {
        print 'A versão do seu iPad é: ' . $detect->version('iPad'); //imprima "A versão do seu iPad é: (versão)"
    }
    if ($detect->is('android')) //se o dispositivo for um Android
    {
        print 'A versão do seu Android é: ' .  $detect->version('Android'); //imprima "A versão do seu Android é: (versão)"
                print 'A fabricante é: ' . $detect->getMobileDetectionRules('android'); //imprima "A versão do seu iPhone é: (versão)"
    }
}
else //senão
{
    print 'Você não está usando um dispositivo móvel </br>'; //imprima "Você não está utilizando um dispositivo móvel"
    print 'A versão do seu iPhone é: ' .$detect->version('Chrome');

}
?>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
<style class="cp-pen-styles">
    * {
        -webkit-tap-highlight-color: rgba(0,0,0,0); /* Stops flash on tap iOS */
    }

#toggle {
  max-height: 0;
  max-width: 0;
  opacity: 0;
}

#toggle + label {
  cursor: pointer;
  display: block;
  position: relative;
  box-shadow: inset 0 0 0px 1px #d5d5d5;
  text-indent: -5000px;
  height: 30px; width: 50px;
  border-radius: 15px;
}

#toggle + label:before {
  content: '';
  position: absolute;
  display: block;
  height: 30px; width: 30px;
  top: 0; left: 0;
  border-radius: 15px;
  background: rgba(19,191,17,0);
  transition: .25s ease-in-out;
}

#toggle + label:after {
  content: '';
  position: absolute;
  display: block;
  height: 30px; width: 30px;
  top: 0; left: 0;
  border-radius: 15px;
  background: white;
  box-shadow: inset 0 0 0 1px rgba(0,0,0,.2), 0 2px 4px rgba(0,0,0,.2);
  transition: .25s ease-in-out;
}

#toggle:checked + label:before {
  width: 50px;
  background: rgba(19,191,17,1);
}

#toggle:checked + label:after {
  left: 20px;
  box-shadow: inset 0 0 0 1px rgba(19,191,17,1), 0 2px 4px rgba(0,0,0,.2);
}

</style>
</head>
<body>
<input type="checkbox" name="toggle" id="toggle">
<label for="toggle"></label>
<script id="rendered-js">

</script>
</body>
</html>