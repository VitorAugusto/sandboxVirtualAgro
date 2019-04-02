<?php

session_start();

/*
http://world.msg91.com/api/sendhttp.php?
authkey=877A3ZCEsjJWg5ca261d6&
mobiles=73999598620&
message=VIRTUALAGRO&
sender=website&
route=4&
country=55

*/


switch($_GET["action"]){ //get tipo de operacação, e post os dados

    //EU RECEBO POR POST AQUI, SOMENTE O NÚMERO DE TELEFONE DO RAPAZ.

    case "enviar_otp":

    $authKey = "877A3ZCEsjJWg5ca261d6";
    $mobileNumber = $_POST['telefone'];
    $newMobileNumber = preg_replace("/[^a-fA-F0-9]/",'', $mobileNumber);
    $senderId = "website";

    $otp = rand(100000, 999999); //codigo que será enviado e terá que ser confirmado depois.
    $_SESSION['session_otp'] = $otp;
    $message = $otp;
    $route = "4";
    $country = "55";
//Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $newMobileNumber,
        'message' => $message,   //OTP A SER ENVIADO
        'sender' => $senderId,
        'route' => $route,
        'country' => $country
    );

//API URL
    $url="http://world.msg91.com/api/sendhttp.php";

// init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
    ));


//Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
    $output = curl_exec($ch);

//Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }

    curl_close($ch);

    echo $output;

    break;




    case "verificar_otp":

    $otp = $_POST['otp']; //captura o otp inserido pelo usuário.

    if($_SESSION['session_otp'] == $otp){ //correto
        echo "1"; // CÓDIGO 1 NÚMERO VERIFICADO

    }else{
        echo "2"; //FALHA NA VERIFICAÇÃO
    }



    break;
}

?>