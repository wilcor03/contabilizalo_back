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
  	$params = [
        'vistaConsultaEstadoRUT:formConsultaEstadoRUT:modoPresentacionSeleccionBO'=> 'pantalla'];

      $htmlData = $this->getData('https://muisca.dian.gov.co/WebRutMuisca/DefConsultaEstadoRUT.faces', true, $params);

      preg_match_all('/value="(.*)"/siU', $htmlData, $matches);

      //dd($matches[1][2]);

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

    if(!count($finded[1])){
    	$firstName 		= "NO ENCONTRADO";
    	$otherNames 	= "";
    	$firstLastName 		= "";
    	$secondLastName 		= ""; 
    	$state 		= "";
    	return view('apps.rut-consult', compact('firstName', 'otherNames', 'secondLastName', 'firstLastName', 'state'));
    }

    $firstName = trim(strtoupper($finded[1][0]));

    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:otrosNombres">(.*)</span>)siU', $info, $finded);

    $otherNames = trim(strtoupper($finded[1][0]));

    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:segundoApellido">(.*)</span>)siU', $info, $finded);

    $secondLastName = trim(strtoupper($finded[1][0]));

    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:primerApellido">(.*)</span>)siU', $info, $finded);

    $firstLastName = trim(strtoupper($finded[1][0]));

    preg_match_all('(<span id="vistaConsultaEstadoRUT:formConsultaEstadoRUT:estado">(.*)</span>)siU', $info, $finded);    
    $state = trim(strtoupper($finded[1][0]));

    return view('apps.rut-consult', compact('firstName', 'otherNames', 'secondLastName', 'firstLastName', 'state'));

  /*echo $firstName.' - '.$otherNames.' - '.$firstLastName.' - '.$secondLastName.' - '.$state;*/
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
}
