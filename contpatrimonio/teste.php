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