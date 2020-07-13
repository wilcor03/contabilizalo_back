<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Dian extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'dian:consult';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  private $ch;  
  private $cookie_file;

  public function __construct()
  {      
    parent::__construct();
    $ch = curl_init();
    Self::setConfigCH($ch);
    $this->cookie_file = "/tmp/".time();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $ccs = [123456,1019013125, 1019029124];
    foreach($ccs as $cc){
      $result = $this->setData($cc);
      print_r($result);
    } 

    exit;      

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
    //$params = [
        //'vistaConsultaEstadoRUT:formConsultaEstadoRUT:modoPresentacionSeleccionBO'=> 'pantalla'];

      //$htmlData = $this->getData('https://muisca.dian.gov.co/WebRutMuisca/DefConsultaEstadoRUT.faces', true, $params);

      //sleep(1);

      //preg_match_all('/value="(.*)"/siU', $htmlData, $matches);

      //if(!count($matches[1])){
        //return false;

        /*$firstName    = "";
        $otherNames   = "";
        $firstLastName    = "";
        $secondLastName     = ""; 
        $state    = "";
        return view('apps.rut-consult', compact('firstName', 'otherNames', 'secondLastName', 'firstLastName', 'state'));*/
      //}

      //$token = $matches[1][2];

      $params2 = [              
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:numNit' => trim($cc),
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:btnBuscar.x' => 0,
      'vistaConsultaEstadoRUT:formConsultaEstadoRUT:btnBuscar.y' => 0,
      'com.sun.faces.VIEW' => "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",
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
