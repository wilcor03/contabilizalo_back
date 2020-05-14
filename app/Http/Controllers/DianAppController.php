<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DianAppController extends Controller
{
	private $ch;  
  private $cookie_file;

  public function __construct()
  {      
    $ch = curl_init();
    Self::setConfigCH($ch);
    $this->cookie_file = "/tmp/".time();
  }

  public function rutConsult($cc){
  	for($i = 0; $i <= 4; $i++){
  		$result = $this->setData($cc);	
  		if($result){
  			break;
  		}
  		sleep(1);
  	}  	

  	if(!$result){
  		$result = [
  			'firstName' => '',
  		  'otherNames' => '', 
	  		'firstLastName' => '', 
	  		'secondLastName' => '', 
	  		'state' => '',
	  		'socialReason' => ''
	  	];
  	}
  	
  	if($result){
  		return view('apps.rut-consult', $result);
  	}    
  }



  private function setData($cc){
  	$params = [
        'vistaConsultaEstadoRUT:formConsultaEstadoRUT:modoPresentacionSeleccionBO'=> 'pantalla'];

      $htmlData = $this->getData('https://muisca.dian.gov.co/WebRutMuisca/DefConsultaEstadoRUT.faces', true, $params);

      sleep(1);

      preg_match_all('/value="(.*)"/siU', $htmlData, $matches);

      if(!count($matches[1])){
      	return false;

	    	/*$firstName 		= "";
	    	$otherNames 	= "";
	    	$firstLastName 		= "";
	    	$secondLastName 		= ""; 
	    	$state 		= "";
	    	return view('apps.rut-consult', compact('firstName', 'otherNames', 'secondLastName', 'firstLastName', 'state'));*/
	    }

      $token = $matches[1][2];

      $params2 = [
        'vistaConsultaEstadoRUT:formConsultaEstadoRUT:modoPresentacionSeleccionBO'=> 'pantalla',
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:siguienteURL' => '',
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:modoPresentacionFormBO' => 'pantalla',
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:modoOperacionFormBO' => '', 
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:mantenerCriterios' => '',
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:numNit' => trim($cc),
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:btnBuscar.x' => 0,
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:btnBuscar.y' => 0,
      'com.sun.faces.VIEW' => $token,
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT' =>  'vistaConsultaEstadoRUT:formConsultaEstadoRUT',
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:_idcl'=> ''
    ];

    //dd($params);

    $info = $this->getData('https://muisca.dian.gov.co/WebRutMuisca/DefConsultaEstadoRUT.faces', true, $params2);

    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:primerNombre">(.*)</span>)siU', $info, $finded);

    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:razonSocial">(.*)</span>)siU', $info, $finded2);    

    if(!count($finded[1]) && !count($finded2[1])){
    	return false;    	
    }

    if(count($finded[1])){
    	$firstName = $this->decodeAcii(trim(strtoupper($finded[1][0])));

	    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:otrosNombres">(.*)</span>)siU', $info, $finded);

	    $otherNames = $this->decodeAcii(trim(strtoupper($finded[1][0])));

	    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:segundoApellido">(.*)</span>)siU', $info, $finded);

	    $secondLastName = $this->decodeAcii(trim(strtoupper($finded[1][0])));

	    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:primerApellido">(.*)</span>)siU', $info, $finded);

	    $firstLastName = $this->decodeAcii(trim(strtoupper($finded[1][0])));

	    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:estado">(.*)</span>)siU', $info, $finded);    
	    $state = $this->decodeAcii(trim(strtoupper($finded[1][0])));

	    $socialReason = "";

	    return compact('firstName', 'otherNames', 'firstLastName', 'secondLastName', 'state', 'socialReason');	
    }

    if(count($finded2[1])){

    	preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:estado">(.*)</span>)siU', $info, $finded2_2);    
	    
	    $state = $this->decodeAcii(trim(strtoupper($finded2_2[1][0])));

    	return [
  			'firstName' => '',
  		  'otherNames' => '', 
	  		'firstLastName' => '', 
	  		'secondLastName' => '', 
	  		'state' => $state,
	  		'socialReason' => $finded2[1][0]
	  	];
    }
    
  }




  private function setConfigCH($ch){
    $this->ch = $ch;
  } 

  private function getData($url, $is_POST = FALSE, $params = []){
    $ch = $this->ch;
    $cookie_file = $this->cookie_file;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept-Language: es-es,en"));
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file); 
    curl_setopt($ch, CURLOPT_POST, $is_POST);
    if($is_POST){
      curl_setopt($ch, CURLOPT_POSTFIELDS, $params);  
    }      

    $result = curl_exec($ch);
    $error = curl_error($ch);           

    return $result;
  }

  private function decodeAcii($string){
    $caracteres = [
      '&NTILDE;'
    ];  

    $aConvertir = [
      'Ñ'
    ];

    $newString = str_replace($caracteres, $aConvertir, $string);
    return $newString;
  }
}
