<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Suscriber;

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
    protected $description = 'to Detrips susc';

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
      $registers = Suscriber::all();
      
      foreach($registers as $r){       
        $this->info('processing: '.$r->email);
        sleep(2);
        if($this->sendData($r)){
          $newTime = $r->times + 1;
          $r->times = $newTime;
          if($r->save()){
            $this->info('send success!');
            continue;
          } 
          $this->error('failed saving in db!');
        }     
      }
    }

    private function sendData($data){
      return true;
    }
}
