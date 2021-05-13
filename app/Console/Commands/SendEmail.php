<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Suscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\DetripsRaffleEmail;
use App\Exam;
use App\Preinscrito;

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

    $registers = Suscriber::where('email', 'wilcor03@gmail.com')
                          //where('times', 1)
                          
                          ->orderBy('id', 'desc')     
                          //->take((int)$until)
                          ->get();
                                                     
    $this->error('Proccess tot: '.count($registers));

    $sendEm = 0;

    foreach($registers as $key => $r){       
      $this->info(($key + 1).' -processing: '.$r->email.' ID: '.$r->id);        

      if($this->sendData($r)){
        $newTime = $r->times + 1;
        $r->times = $newTime;
        if($r->save()){
          $sendEm += 1;
          $this->info('send success!');
          if($sendEm == 10){
            sleep(1);
            $sendEm = 0;  
          }          
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


/*$sus = Exam::all();
    foreach($sus as $s){
      $exists = Suscriber::where('email', $s->email)->exists();
      if($exists){
        $this->error('exists '.$s->email);
        continue;
      }

      $u = new Suscriber;
      $u->email = $s->email;
      $u->name  = $s->name;
      $u->save();
      $this->line('saved: '.$u->email);
    }


    exit;*/