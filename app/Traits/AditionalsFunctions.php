<?php

namespace App\Traits;

use App\User;
use Auth;

trait AditionalsFunctions
{	

  protected function formatedDates($date)
  {
    return date('d-m-y H:i:s', strtotime($date));
  }

  protected function isSuperAdmin()
  {
  	return User::where('id', Auth::id())
  							->where('profile', 'superAdmin')
  							->exists();
  }

  protected function isAdmin()
  {
    return User::where('id', Auth::id())
                ->where('profile', 'admin')
                ->exists();
  }

  protected function isUser($user)
  {
    if(Auth::id() == $user)
    {
      return true;
    }
  }

  protected function deleteFiles($path)//borra todos los archivos que esten en la ruta incluso la carpeta
  {      
    $path = rtrim( strval( $path ), '/' ) ;
 
    $d = @dir( $path );
 
    if( ! $d )
        return false;
 
    while ( false !== ($current = $d->read()) )
    {
      if( $current === '.' || $current === '..')
          continue;

      $file = $d->path . '/' . $current;

      if( is_dir($file) )
          $this->deleteFiles($file);

      if( is_file($file) )
          @unlink($file);
    }
 
    rmdir( $d->path );
    $d->close();
    return true;
  }

  protected function deleteFilesDB($files)
  {
    foreach($files as $file)        
    {
      if(is_file($file->full_url_file_thumb))
      {        
        @unlink($file->full_url_file_thumb);        
      }
      
      if(is_file($file->full_url_file))
      {        
        $file->delete();
        @unlink($file->full_url_file);          
        return true;
      }
                
    }
    return false;              
  }

  protected function formatValues($val)
  {
    return str_replace(',', '', $val); // los convierte en valores numericos
  }

  private function validatePaymentMethods($payment_method)
  {
    if($payment_method == null)
    {
      return 0;
    }

    switch ($payment_method) {
      case 1://tarjeta de debito
      case 5:
        return [
              'payment_method'=> 'required|exists:payment_methods,id',                    
                'payer_name'  => 'required|string|max:100|min:5',
                'payer_email' => 'required|email',
                'payer_phone' => 'required',
        'pse_financial_institution_code' => 'required',
          'payer_person_type' => 'required|in:N,J',
                'payer_dni'   => 'required',
        'payer_document_type' => 'required'                
              ];
      break;   

      case 2:
        return [
                'payment_method'=> 'required|exists:payment_methods,id',                     
          'credit_card_number'  => 'required|numeric',
  //'credit_card_expiration_date' => 'required|date',
                  'anio'        => 'required|numeric',
                  'month'       => 'required|numeric|min:1|max:12',
                  'payer_dni'   => 'required',
    'credit_card_security_code' => 'required',
          'installments_number' => 'required|numeric',
          'payment_method_card' => 'required',
                'payer_street'  => 'required',
                'payer_name'    => 'required|string|max:100|min:5',
                  'payer_email' => 'required|email',
                  'payer_phone' => 'required',
              'payer_state'  => 'required|exists:departaments,id',
                      'city_id' => 'required|exists:cities,id'                                      
              ];
      break;  

      case 3:
      case 4:
        return [    
              'payment_method'  => 'required|exists:payment_methods,id',                     
                'payer_name'    => 'required|string|max:100|min:5',
                  'payer_email' => 'required|email',
                  'payer_dni'   => 'required'
              ];
      break; 

    }
  }

  private function validateRepay($request)
  {
    if($request->payment_method == "")
    { 
      $msg = "Seleccione una forma de pago!";
      if($request->ajax())
      {
        return response()->json(['payment_method' => $msg]);
      }
      return redirect()->back()->with(['global' => $msg]);  
    }

    $rules = $this->validatePaymentMethods($request->payment_method);

    $validator = \Validator::make($request->all(), $rules);  

    if($validator->fails())
    {
      if($request->ajax())
      {
        return $validator->errors();        
      }
      return redirect()->back()->withInput()->withErrors();
    }
    else
    {
      if($request->ajax())
      {
        return response()->json(['status' => true]);
      }
    }

    return true;
  }
}