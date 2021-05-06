<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Suscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\DetripsRaffleEmail;

class SendEmail extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'db:send-email';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'to contabilizer susc';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
      parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {      
    $until = $this->ask('how many emails?');      

    $registers = Suscriber::whereNull('times') 
                          //where('times', 1)
                          //->where('email', 'wilcor03@gmail.com')
                          ->orderBy('id', 'desc')       
                          ->take((int)$until)
                          ->get();
                                                     
    $this->error('Proccess tot: '.count($registers));
    foreach($registers as $key => $r){       
      $this->info(($key + 1).' -processing: '.$r->email.' ID: '.$r->id);        

      if($this->sendData($r)){
        $newTime = $r->times + 1;
        $r->times = $newTime;
        if($r->save()){
          $this->info('send success!');
          sleep(10);
          continue;
        } 
        $this->error('failed saving in db!');
      }                     
    }
  }

  private function sendData($suscriber){
    try {
      if($suscriber->name == null){
        $suscriber->name = "Usuario ConTabilizalo.com";
      }
      Mail::to($suscriber->email)->queue(new DetripsRaffleEmail($suscriber));  
      return true;
    } catch (Exception $e) {
      return false;  
    }
    
  }
}
