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

    $registers = Suscriber::wherein('email', INSCRITOS) 
                          //where('times', 1)
                          //where('email', 'centralpuntosas@gmail.com')
                          //->orderBy('id', 'desc')       
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


const INSCRITOS = [
  'maricelavelandia@hotmail.com',
'Carlosjjimenez717@gmail.com',
'aneuditejada7@gmail.com',
'johnnytorrez06@gmail.com',
'Indialu2018@gmail.com',
'angelicacorrea26@hotmail.com',
'mincholamarixa123@gmail.com',
'tecnicomgonzalez@gmail.com',
'Farp16@outlook.com',
'javi_flores050@hotmail.com',
'dilciamejia326@gmail.com',
'oscarandressanchezfrauz@gmail.com',
'clabemo76@gmail.com',
'andrea_113@live.com',
'rochyluz.90@hotmail.com',
'maleonc@misena.edu.co',
'eyuccha@hotmail.com',
'beba0728@gmail.com',
'nomina@serlogtem.com',
'vanegas73@gmail.com',
'mapilygofe@gmail.com',
'danytori@gmail.com',
'b.echavarria@hotmail.com',
'sagajes@yahoo.es',
'ejhonny018@gmail.com',
'dilupava@hotmail.com',
'soledispa62@gmail.com',
'jhonatanblanco562@gmail.com',
'andreajara409@gmail.com',
'baldiosedapablo1@gmail.com',
'hugoleoneljj@hotmail.com',
'paulba45@hotmail.com',
'proyectomagdalena7@gmail.com',
'sanvelascoj@hotmail.com',
'dahisamaday893@gmail.com',
'brenditathebest@hotmail.com.ar',
'garretamartha@gmail.com',
'faravaflo@hotmail.com',
'mroseroc@sena.edu.co',
'enazate@gmail.com',
'velaangie@gmail.com',
'mariahelen66@hotmail.com',
'jheysonmonasterios@gmail.com',
'blachobatista@gmail.com',
'aidaluzserna@gmail.com',
'bohorquezyamile@gmail.com',
'segimo@utp.edu.co',
'johnpomavaleazul@gmail.com',
'zaidaherrera@yahoo.com',
'dicamaco@hotmail.com',
'consultorcontable1@gmail.com',
'OLDINELLY@GMAIL.COM',
'jezarco58@hotmail.com',
'patriciacastrod@hotmail.es',
'Jasawe@yahoo.es',
'carloscardozosantos@gmail.com',
'ajota47@gmail.com',
'yemili97@hotmail.com',
'marthapatriciacaceressantos67@gmail.com',
'rosanabb29@yahoo.com',
'jfmontoya157@hotmail.com',
'davidbas14@hotmail.com',
'angieygl2106@gmail.com',
'lemusmayra@hotmail.com',
'carlos.armando2371@hotmail.com',
'evp.dhpl@gmail.com',
'luisayomaraix48@gmail.com',
'giselaoyanedel11@gmail.com',
'yolivelezmeneses@hotmail.com',
'digitalcs2020@gmail.com',
'hgrodriguez2013@gmail.com',
'argelesagudo@gmail.com',
'lhdiaz1963@gmail.com',
'rudymamani2312@gmail.com',
'jjgarciaby@gmail.com',
'LEONELROJASG@YAHOO.ES',
'jorgeugomez@gmail.com',
'egmdos@gmail.com',
'chetio7@hotmail.com',
'gonzalomedr@yahoo.com',
'yc.calderon3@gmail.com',
'kathleen_na@hotmail.com',
'neyzapata7@gmail.com',
'danielvidaurre26abril@gmail.com',
'karinaveira80@gmail.com',
'estefy531@hotmail.com',
'magda.221963@hotmail.com',
'indifu119@hotmail.com',
'ppsamayoa20@yahoo.es',
'NORTALAGA@HOTMAIL.COM',
'jamirvanegas@hotmail.com',
'keeandinoc@outlook.com',
'jenbonir@gmail.com',
'satama15@hotmail.com',
'patyblu02@hotmail.com',
'kpetit407@gmail.com',
'lilianacarmona429@gmail.com',
'maluz0610@gmail.com',
'caom1203@hotmail.com',
'lizdanit02@gmail.com',
'limagar22@hotmail.com',
'borferfiggar@gmail.com',
'carlosj_1912_17@hotmail.com',
'besarion.agudelo@sedtolima.edu.co',
'nclb13@hotmail.com',
'bcg210403@gmail.com',
'sanchez.juan03@gmail.com',
'janetmonje@hotmail.com',
'jachz@outlook.es',
'fanery0402@gmail.com',
'yanethmosquera26@hotmail.com',
'omarante_11@hotmail.com',
'davidmaravilla@gmail.com',
'alvarolastre@hotmail.com',
'licedviviana@hotmail.com',
'wigegovi@gmail.com',
'mrni2020@yahoo.com',
'martha_marisa_11@hotmail.com',
'manyomaluismiguel@gmail.com',
'digpa20@gmail.com',
'Contabilidadvalenzuela@gmail.com',
'douglas1104@gmail.com',
'astrid.chapid20@gmail.com',
'natalyariasz@gmail.com',
'mbermudez_govea@hotmail.com',
'valeryurban@hotmail.com',
'julian.luna82@hotmail.com',
'edilier_h.c@outlook.com',
'valen987_@hotmail.com',
'sorsand@hotmail.com',
'yeniloaiza@hotmail.com',
'hegar1113@hotmail.com',
'aricaurterojas@gmail.com',
'sarojas17@gmail.com',
'ojas198084@gmail.com',
'borrerop.20@gmail.com',
'jorge_ortiz_1993@outlook.com',
'marixaminchola123@gmail.com',
'elizabeth.lcag@hotmail.com',
'lalamates34@gmail.com',
'patricia20g@gmail.com',
'marthamedinacontadora@gmail.com',
'monikitacuervo123@gmail.com',
'delcymadelaossa@gmail.com',
'lorenarodriguezvelez@gmail.com',
'leocolqueramirez@gmail.com',
'dayas.1995@hotmail.com',
'julio.c.a-13@hotmail.com',
'stephania-1515@hotmail.com',
'mile0726@outlook.com',
'nellycorredor2004@yahoo.com',
'walterla23@hotmail.com',
'lehdercastedo@gmail.com',
'l.esterripa@gmail.com',
'dmcastilloquintero@gmail.com',
'joselc0311@hotmail.com',
'elenarosales233@gmail.com',
'dais20@hotmail.com',
'beatrize2025@hotmail.com',
'giovannyrodriguez8512@gmail.com',
'nubia_camargo15@hotmail.com',
'luis21cq@gmail.com',
'gmenesesa@hotmail.com',
'edusaro2646@hotmail.com',
'torredejenny@hotmail.com',
'antonio19672000@gmail.com',
'geral_z13@hotmail.com',
'marco2000_4@hotmail.com',
'jpcp2657@gmail.com',
'cuns3.elianap@hotmail.com',
'jesusgorron04@gmail.com',
'ejarismendi@gmail.com',
'fabio200872@hotmail.com',
'omarpachecon@gmail.com',
'walcordma@yahoo.es',
'castillonelfy06@gmail.com',
'josfersam@hotmail.com',
'orrego.martha@yahoo.es',
'humerbal@hotmail.com',
'yojy2506@hotmail.com',
'emiliadomal@hotmail.com',
'alejandro.mb_95@yahoo.com',
'lausanchez_310@hotmail.com',
'marcos2677@gmail.com',
'servimofleselpuntodeoro@hotmail.com',
'y.linares.71@hotmail.com',
'liliamoyao59@gmail.com',
'mreynosod@yahoo.com.mx',
'eduacostar23@gmail.com',
'javierpedroza73@hotmail.com',
'fecapi93@hotmail.com',
'sergiobaronruiz@gmail.com',
'pricilamillan@outlook.com',
'isaduque2000@hotmail.com',
'ahumadapereira@gmail.com',
'hmario45@hotmail.com',
'mayo012@hotmail.com',
'claritzacruz@hotmail.com',
'JACOMELALY@GMAIL.COM',
'serrat.27@outlook.com',
'martaluzromero@hotmail.com',
'omatiz2@hotmail.com',
'braz.2402@hotmail.com',
'laurayepezh0@gmail.com',
'fercasteto2@hotmail.es',
'chata907@hotmail.com',
'JOWILOMO@HOTMAIL.COM',
'carlosjimenez717@yahoo.com',
'FELINETH1221@HOTMAIL.COM',
'gustavotrespalaciosm@gmail.com',
'quisperuben841@gmail.com',
'djcanosoza@gmail.com',
'm_cardona_1999@hotmail.com',
'teffamosquera323@gmail.com',
'prinsesakitana199712@gmail.com',
'martinezmarvin2603@gmail.com',
'yady_melisa@hotmail.com',
'Kiimberlycastillo9@gmail.com',
'martyca78@gmail.com',
'verasteguiyssor@gmail.com',
'ednahurtado@gmail.com',
'sanderdiez@gmail.com',
'claudiatrujillo1007@hotmail.com',
'vertizrojascesar@gmail.com',
'gleal0528@gmail.com',
'abadvargas5@gmail.com',
'stevenaeg@gmail.com',
'yehialex@gmail.com',
'dblconsultor@gmail.com',
'jrsm2020@hotmail.com',
'anab.2601@hotmail.com',
'pamomarinesdoris@gmail.com',
'jmrodriguez303@misena.edu.co',
'isabelarango1234@gmail.com',
'elimamol@hotmail.com',
'jessecielorojassanchez@gmail.com',
'Bonillajocelyn14@gmail.com',
'yasscaro@hotmail.com',
'vmingao@yahoo.com',
'liliana.munozduque@gmail.com',
'jojagosa@hotmail.es',
'Rogher14.rs@gmail.com',
'yinedsanchezramirez@gmail.com',
'contrerasastudillome@gmail.com',
'robinsonespi@hotmail.com',
'malikmonica11@gmail.com',
'garayramirez186@gmail.com',
'Rafael960531@gmail.com',
'jcreyesp@hotmail.com',
'wdvelasquez7@gmail.com',
'freguebar@hotmail.com',
'barajas.jose.caracas@gmail.com',
'pariariel17@gmail.com',
'mariospinolara@hotmail.com',
'yoelcuicastorres@gmail.com',
'gomezjg_95@hotmail.com',
'janethedpatzi@gmail.com',
'capitalia.plena.por.100pre@gmail.com',
'joaquinortizsanchez@gmail.com',
'josmanhfvch@gmail.com',
'luisoveralov@gmail.com',
'ferpommier@hotmail.com',
'angelicamelara22@gmail.com',
'adrymar14@hotmail.com',
'Cstrsantana@gmail.com',
'ginellamoro22@gmail.com',
'bre09@hotmail.com',
'hpuiconz@hotmail.com',
'alexyopla3@gmail.com',
'javier1_3@hotmail.com',
'brayandph18@gmail.com',
'eraiap11@hotmail.com',
'infomedicc@gmail.com',
'centralpuntosas@gmail.com'
];

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