<?php 
class Controller {
    //RENDER VISTA
    public function index(){
        //Le paso los datos a la vista
        require("views/index.php");
    }

    public function getChallenger(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=getchallenge&username=prueba',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_SSL_VERIFYPEER => FALSE
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function login(){

        $curl = curl_init();
 
        $token =  $_POST['token'];
        $accessKey= md5($token . '3DlKwKDMqPsiiK0B');
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'operation=login&username=prueba&accessKey='.$accessKey,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
          CURLOPT_SSL_VERIFYHOST => FALSE,
          CURLOPT_SSL_VERIFYPEER => FALSE
        ));
        
        $response = curl_exec($curl);
        echo $response;
        curl_close($curl);

    }

    public function consulta(){
        $curl = curl_init();
        $sessionName = $_GET['sessionName'];

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=query&sessionName='.$sessionName.'&query=select%20*%20from%20Contacts;',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',   
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_SSL_VERIFYPEER => FALSE
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}


?>