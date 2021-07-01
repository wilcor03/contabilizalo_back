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

    $registers = Suscriber::whereIn('email', INSCRITOS) 
                          //where('times', 1)
                          //where('email', 'wilcor03@gmail.com')
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
  'hcrolando3301@gmail.com',
'alexanderdelaossa@gmail.com',
'mbarriosherrera@yahoo.com',
'mdanielagm@gmail.com',
'apazamilamica@gmail.com',
'quisperuben841@gmail.com',
'yulianhjyd@gmail.com',
'valentina-bg@hotmail.com',
'vilma07quispe08@gmail.com',
'renatamarina163@gmail.com',
'serranomonika97@gmail.com',
'cesaroblockc@gmail.com',
'cesiavidal@outlook.es',
'yulii.grado@gmail.com',
'choquecarmen340@gmail.com',
'felipetriana98@gmail.com',
'wilcor03@gmail.com',
'anallygarcia10@gmail.com',
'Kattybaquegarcia@yahoo.es',
'tebadrums@gmail.com',
'cesar.cabrera985@esap.gov.co',
'fer_fran84@hotmail.com',
'ing.santos.dadlc@gmail.com',
'svpqr2021@gmail.com',
'copete1200@hotmail.com',
'kerlybarzola262001@gmail.com',
'carlosantonio7588@gmail.com',
'sandoval.mario.08@gmail.com',
'joewylyc@gmail.com',
'alexpere411@gmail.com',
'yomigue2015@gmail.com',
'jhona220187@gmail.com',
'wcueva1991@gmail.com',
'reyesfarje@gmail.com',
'diegodavidzr1967v2@yahoo.com',
'harry.martinez.02@gmail.com',
'jose.neglia1@gmail.com',
'erikito110@gmail.com',
'harold.martinez.04@gmail.com',
'evisjothm1979@gmail.com',
'ag071098@gmail.com',
'rlagunabermudez@hotmail.com',
'rdiaz@promarisco.com',
'hecalanpo@gmail.com',
'hjml7573@gmail.com',
'ivanribar77@gmail.com',
'yhony1974@hotmail.com',
'samisophia15@gmail.com',
'caro.vallejos.2012@gmail.com',
'linsismat@gmail.com',
'estefy2531@hotmail.com',
'danlo3c@hotmail.com',
'jeampiersqc@gmail.com',
'juankarl96@gmail.com',
'micaelaoquendo66@gmail.com',
'flopez2980@gmail.com',
'jarody.lopez@gmail.com',
'elinosan31@hotmail.com',
'yerkoalexcarvajal@gmail.com',
'Makirtorodriguez@gmail.com',
'aleirbagmc0222@gmail.com',
'jorgerolando270@gmail.com',
'omarsnchez@gmail.com',
'marti_yaz@yahoo.com.mx',
'alvarojgc1981@gmail.com',
'alexperdomoq@gmail.com',
'jgrm75@gmail.com',

//segunda tanda

'Airam_lupita21@hotmail.com',
'jacintatorres6365@gmail.com',
'gutierrezescobar84@gmail.com',
'elmar1801@hotmail.com',
'jaquelinguadalupe1208@gmail.com',
'sara200907@hotmail.com',
'jhonasort678@gmail.com',
'nohemy.janet25@gmail.com',
'rstiven046@gmail.com',
'jccgconsultores@gmail.com',
'ggonzalez958@misena.edu.co',
'mariacarvajal39@hotmail.com',
'yohanadesalazar@gmail.com',
'ferpommier@hotmail.com',
'sai_monic@hotmail.com',
'guidocorani@gmail.com',
'dorcly.lindor@yahoo.com',
'zoilaecaal@hotmail.com',
'nailapilar@gmail.com',
'cabreraherland@gmail.com',
'giovanita.bustos@gmail.com',
'alexguevacri@gmail.com',
'rafaelcolquegarcia@gmail.com',
'sander623@gmail.com',
'j.mc2@hotmail.com',
'ronnyomar23@gmail.com',
'anita.intriago.vega.76@gmail.com',
'mecotru08@gmail.com',
'salmaraz164@gmail.com',
'contabilizalo.com@gmail.com',
'expertofitness@gmail.com',
'erastovand47@hotmail.com',
'giovanaquispe210@gmail.com',
'martinezhenrydario@gmail.com',
'maritmacas65@hotmail.com',
'limbert.z.michel@gmail.com',
'mireyalls0811@gamil.com',
'noverm72@gmail.com',
'jeancarlossaenz9@gmail.com',
'deadarrow2030@gmail.com',
'kriztian150489@gmail.com',
'linnetempena30@gmail.com',
'ramses.bonilla@yahoo.es',
'ang.cuevas.13@gmail.com',
'luiguilxx@gmail.com',
'chris.sha.cc@gmail.com',
'guablejoseluis@gmail.com',
'noverm72@gamil.com',
'sauemy2020@gamil.com',
's88roderick@gmail.com',
'ledesmamiguel83@gmail.com',
'cayubakaterine@gmail.com',
'rivera@hotmail.com',
'asblady@gmail.com',
'anrango23@hotmail.com',
'victorhugoalcobasoliz@gmail.com',
'rimerniltonchoquemamani@gmail.com',
'alexmillio94@gmail.com',
'ronald_papi2@hotmail.com',
'aymurofiesta@gmail.com',
'erikagorena17@hotmail.com',
'jcfeliz@gmail.com',
'Ulisessixtocastaneda@gmail.com',
'ferpommier@hotmail.com',
'a.aleiram@gmail.com',
'marcelochelitoborja@gmail.com',
'isabelsajquiy19@hotmail.com',
'luisantonio.agricultura@gmail.com',
'lopezvillarroelmarcoantonio@gmail.com',
'nestormv.85@gmail.com',
'jacintatorres6365@gmail.com',
'marleny@culturatravelclub.com',
'ocastillo66@gmail.com',
'elibertorivera376@gmail.com',
'diego_castro_24@outlook.es',
'rafaelcolquegarcia@gmail.com',
'fabicita48352@gmail.com',
'gaby.spq1@gmail.com',
'leyddymendozaoliver07032019@gmail.com',
'yanet29rios@gmail.com',
'juanda19941@outlook.com',
'edgarhut_12@hotmail.com',
'carme.rst@gmail.com',
'beticita382@gmail.com',
'oscarespana2000@gmail.com',
'tayheros59@gmail.com',
'jcmsocoser@gmail.com',
'edson.mondaca@gmail.com',
'nolvianluque@yahoo.es',
'pereznathalia302@gmail.com',
'vicalalv@espol.edu.ec',
'hormiga141521@gmail.com',
'juankiss9123@gmail.com',
'silverpay@hotmail.com',
'arteagaricardo661@gmail.com',
'LuimiMincholita@gmail.com',
'crismartpc@gmail.com',
'verajoseluis@hotmail.com',
'titoespinozafernando@gmail.com',
'oscar9000@gmail.com',
'dgomezmolina@gmail.com',
'rogeliochoquehuanca1975@gmail.com',
'truman.panduroyalta@gmail.com',
'velardechambiangela@gmail.com',
'christian234cardenas56@gmail.com',
'ismael14qc@gmail.com',
'fernandoaarce1975@gmail.com',
'juana.ap.co@gmail.com',
'domenicobaez@gmail.com',
'js.acosta1@gmail.com',
'madrianap7@gmail.com',
'shierlyzc@gmail.com',
'pejancoluc@gmail.com',
'mariesquivel2409tejada@hotmail.com',
'velazquezcondesonia@gmail.com',
'danieliithalike@gmail.com',
'gonzalomarroquin629@hotmail.com',
'myumisaca@hotmail.com',
'haylin.rodriguez@hotmail.com',
'wguzher81264@gmail.com',
'mariaisabelrg@gmail.com',
'contador1359@hotmail.com',
'maribel.zambrano19@gmail.com',
'pauliplast@hotmail.com',
'chichi_tellez@hotmail.com',
'ivan_misiones@hotmail.com',
'marsal_777@hotmail.es',
'alinachura726@gmail.com',
'adrianaromero2489@gmail.com',
'Masterencobros@gmail.com',
'segoalcar1@gmail.com',
'javierroediger15@gmail.com',
'varelamonteromellvy@gmail.com',
'cesar_pp78@hotmail.com',
'mercedeslive2010@hotmail.com',
'marcialej@hotmail.com',
'ericelflor@gmail.com',
'egacdc@hotmail.com',
'dilsong85@gmail.com',
'alcicorrav@gmail.com',
'renatamarina163@gmail.com',
'g.avila51@yahoo.com',
'augustoalma_0591@outlook.es',
'tacoovacadiliofrancisco@gmail.com',
'munoz-marcia5970@unesum.edu.ec',
'fmbanegas@gmail.com',
'mariagabrielaandradebarba@gmail.com',
'agripinovargas206@gmail.com',
'rsan2366@hotmail.com',
'julyale.c1108@gmail.com',
'anijulielf@gmail.com',
'sandrarosas2308@gmail.com',
'crucy.espinoza@gmail.com',
'22yotha@gmail.com',
'trivinozzaida50@gmail.com',
'marco.lasso08@gmail.com',
'camiama48@gmail.com',
'brislymiranda@gmail.com',
'marcoantoniopaton8@gmail.com',
'johanna.salamanca.ochoa@gmail.com',
'd2lvly@gmail.com',
'wvrodriguez37@misena.edu.co',
'zaida900216@gmail.com',
'eusogues1@gmail.com',
'albert_b21_98@hotmail.com',
'joseluis.linarespurizaca@gmail.com',
'rhode_soria@hotmail.com',
'noemigutierrezaguayo@gmail.com',
'lauramoralessolares@gmail.com',
'lluscosalome@gmail.com',
'jorge.contable@gmail.com',
'jagotitan@gmail.com',
'fannycpongot.0103@gmail.com',
'rociomiranda3@hotmail.com',
'elsolcuzcatleco@hotmail.com',
'wilidiz01@hotmail.com',
'liliamgp12@gmail.com',
'vitrito.1970@gmail.com',
'felix36_rodriguez@yahoo.es',
'yolasalgado664@gmail.com',
'sandoval.mario.08@gmail.com',
'josuesar1722@yahoo.es',
'contablesjyg@gmail.com',
'nicolascrenein@gmail.com',
'gilpachecoasociados@gmail.com',
'licmariodelgado2016@gmail.com',
'xime17linares@gmail.com',
'willbargud@gmail.com',
'leidyjmc03@gmail.com',
'priscilamassiel.19@gmail.com',
'elijohana300@gmail.com',
'facultad_contable@hotmail.com',
'angelacosta16764@gmail.com',
'marincma@hotmail.com',
'veronicamedeiroortiz@g.com',
'yeimya3@gmail.com',
'asbrid@gmail.com',
'claudia_kastel@hotmail.com',
'emilcen30@hotmail.com',
'contabilidadbogota@serviciosespecializados.co',
'zbmamba@gmail.com',
'elsyguibre@gmail.com',
'wilog001@hotmail.com',
'juansocarrasgarcia1979@hotmail.com',
'mivalen@hotmail.com',
'sumeso34@gmail.com',
'rogerortiz038@gmail.com',
'jamaradiaga60@gmail.com',
'nandobartup@gmail.com',
'aguillerame@hotmail.com',
'robertoviverosaguilera@gmail.com',
'gabrielatsajuput@gmail.com',
'miguellooez043@gmail.com',
'armandomere@gmail.com',
'j.rosales13@hotmail.com',
'lurdescortez18@gmail.com',
'danigarmart@gmail.com',
'gongoragab@gmail.com',
'brayanrexar@gmail.com',
'tgongoraalmanza@gmail.com',
'afunes@aventurasturisticas.com',
'yulied.gallardo@hotmail.com',
'lisse2303@gmail.com',
'constanza.lima03@gmail.com',
'lufema86@gmail.com',
'yeimyjo@hotmail.com',
'saltarin0225@gmail.com',
'marlitacueva14@gmail.com',
'pomaingrid383@gmail.com',
'martincor12@yahoo.com',
'shirley.k126@gmail.com',
'eddyruddyticona@gmail.com',
'taniamarcela1975@yahoo.es',
'mcesar855@gmail.com',
'lui16vidal16@gmail.com',
'javierhiguerasfarfan@gmail.com',
'agroariesperu@gmail.com',
'chuquimiaespinozacristian@gmail.com',
'merlydazav@gmail.com',
'celiasoledadmorinigo@gmail.com',
'pairumanimiguelangel@gmail.com',
'freddy.jc140379@gmail.com',
'CATABOHADA@GMAIL.COM',
'g.nieves.cruz.11@gmail.com',
'torrezjjt66@gmail.com',
'rodrigo890303@gmail.com',
'jorgesolis2968@gmail.com',
'andreinava87@gmail.com',
'grey0684@hotmail.com',
'zemerson110@gmail.com',
'chaler01@hotmail.com',
'odalisg.1996@gmail.com',
'mariayuli@hotmail.com',
'josel-2007@hotmail.com',
'joffrys80@gmail.com',
'luciperez280500@gmail.com',
'juca_pozo@hotmail.com',
'lagar06sar@gmail.com',
'gutierrezescobar84@gmail.com',
'tatiana.medrano.miranda@gmail.com',
'zeballosmarquezteresa@gmail.com',
'verastegui.marisabel@gmail.com',
'fpino6775@hotmail.com',
'maripazlla42@gmail.com',
'ectorlamas@gmail.com',
'Lalagutierrezb@gmail.com',
'yusefmedia28@outlook.es',
'wilsonamador@msn.com',
'luzfaj@gmail.com',
'jhenymani@gmail.com',
'guillermoguzmanmartinez@gmail.com',
'jorgesagitario30@gmail.com',
'marcotuliobustamantenavarro@gmail.com',
'ricardoveloz67@hotmail.com',
'arlethluna213@gmail.com',
'calidad.grumen@gmail.com',
'jhojanstic94@gmail.com',
'kq25699@gmail.com',
'josheperez0@gmail.com',
'ke25699@gmail.com',
'giseladuarte66hn@gmail.com',
'jennypitalindao@hotmail.com',
'elsavelasquez1969@yahoo.com',
'focrer789@gmail.com',
'gabrielacomina@yahoo.es',
'suyanarios@gmail.com',
'mayten.torres@gmail.com',
'jfernando9715@hotmail.com',
'lazarosilgadoaz@gmail.com',
'elnegrolindo543@gmail.com',
'Carolsthephanypinmar@gmail.com',
'lualbertmc@hotmail.com',
'angelayugraee@gmail.com',
'aymerasg@gmail.com',
'93mariafernanda@gmail.com',
'pahb3438@gmail.com',
'villalbauribesebastian01@gmail.com',
'herdan3@gmail.com',
'amalyg4@gmail.com',
'eeescorcia92@gmail.com',
'felixhernandez023@hotmail.com',
'otero22285@gmail.com',
'xamavisa1@hotmail.com',
'arelimartinezvazquez001@gmail.com',
'daysipulley@gmail.com',
'ppsamayoa20@yahoo.es',
'mantillaelizabeth936@gmail.com',
'diamantes.77@hotmail.es',
'carolabecia@gmail.com',
'mariacarvajal39@hotmail.com',
'sanjuanmartinezj@gmail.com',
'ciramoranp@gmail.com',
'lizek1909@gmail.com',
'insanity0120@hotmail.com',
'pereiracaranavi74@gmail.com',
'paulina.uribe2008@hotmail.com',
'a5campano@gmail.com',
'fenitamd@gmail.com',
'cordovaoscarhugo@gmail.com',
'jenny_elisa_25@hotmail.com',
'PLINIOIGLESIAS@GMAIL.COM',
'edelaguilaos9583@gmail.com',
'ticos7581@gmail.com',
'eric.martinez@cun.edu.co',
'alejandro.mb_95@yahoo.com',
'danitza.mch.28@gmail.com',
'jondarsbeatriz@gmail.com',
'marcesa82@hotmail.com',
'yperezagual@gmail.com',
'elmar1801@hotmail.com',
'sharonbuitralex@gmail.com',
'wilmer.plaza1992@gmail.com',
'rezefi75@gmail.com',
'sindyprm18@gmail.com',
'sotalvarosoto@gmail.com',
'lenriqueviii@gmail.com',
'luzehernandez15@gmail.com',
'ana.colmenares22@gmail.com',
'nelormoreno@yahoo.com',
'andrea-mancipe97@hotmail.com',
'castillo06saray@gmail.com',
'Breyner0914@gmail.com',
'carmen-4093@hotmail.com',
'pz22eva@gmail.com',
'saculpineda19@gmail.com',
'albitaconta2015@hotmail.com',
'Opalacioscasas@gmail.com',
'cruz_moralesalfonso@yahoo.es',
'yoseligomez17@gmail.com',
'cristidelosangeles@gmail.com',
'figurashi_16@hotmail.com',
'yuranih22@gmail.com',
'carolinapaco.t@gmail.com',
'patriciaduarte.asesora@gmail.com',
'dariocoronado@hotmail.com',
'oscarvladimir656@gmail.com',
'jaimes0108@hotmail.com',
'jucato16@gmail.com',
'laah7@hotmail.com',
'blalimurc@yahoo.com.co',
'luzyamilethquintanillaramos@gmail.com',
'michellemontantecruz@gmail.com',
'agarajnj@gmail.com',
'ejherrerau@gmail.com',
'jossrodriguez299@gmail.com',
'giovanaquispe210@gmail.com',
'mjsenam@hotmail.com',
'ninaquispedalia23@gmail.com',
'karecervantesmr@unimagdalena.edu.co',
'cheidyliliana@yahoo.com',
'salustiayampara@gmail.com',
'erika.alexandrang@gmail.com',
'karentatianabernalsanabria@gmail.com',
'anismar11@hotmail.com',
'helljose.acj@gmail.com',
'adrianyelicontreras2018@gmail.com',
'floresmsilvia@gmail.com',
'gissethlorena@hotmail.com',
'alma.serpas@catolica.edu.sv',
'sergiogoytia1976@yahoo.com.ar',
'monicam3297801@gmail.com',
'upicsa@cock.li',
'leidyvillarraga@hotmail.com',
'karencita_2615@hotmail.com',
'neilradagomez10@gmail.com',
'yslenia.peralta2015@gmail.com',
'elopez0907@gmail.com',
'jchavezrf@gmail.com',
'pastornidia10@gmail.com',
'jmuril8523@hotmail.com',
'diaentes@hotmail.com',
'lissette9574@gmail.com',
'nataliaguapacha@gmail.com',
'lauraalejandraespinosa@gmail.com',
'iaacuna@uniguajira.edu.co',
'marcia.delacruz84@gmail.com',
'lilianacarmona429@gmail.com',
'catastrotapalhuaca@gmail.com',
'lcarlosguzman1969@gmail.com',
'MEVALERO71@GMAIL.COM',
'moraleshumberto62@gmail.com',
'rojo-proletario@hotmail.com',
'catalina980132@gmail.com',
'kvillanueva30@hotmail.com',
'mauriciocarvajalm1@gmail.com',
'kamesubla@hotmail.com',
'balguar87l@yahoo.com',
'luis_fernando_scott@hotmail.con',
'maaje.1983@gmail.com',
'figue10-estefy@hotmail.com',
'magsuarez.2014@gmail.comm',
'lorenacandela36@gmail.com',
'maryfaby13@hotmail.com',
'arneloz@yahoo.com',
'diegoromerorafael@gmail.com',
'nicanorfuertes2@gmail.com',
'sastithvillegas@hotmail.com',
'katalan15@hotmail.com',
'javasquezcastro1@hotmail.com',
'ladygutierrezgomez@gmail.com',
'linayherrera@hotmail.com',
'victor_arias_arrue@yahoo.es',
'contabilidad@redsolvers.com',
'yeseni3180@gmail.com',
'sandralilibarra@gmail.com',
'Estefany151990@gmail.com',
'armandoguzmant_1@hotmail.com',
'rosalesilvia.pro@gmail.com',
'dianapdulce9@gmail.com',
'machacazd03@gmail.com',
'nruth.escalante@gmail.com',
'selvinxr@gmail.com',
'carolguerrero1024@gmail.com',
'fhgarcia@misena.edu.co',
'carlostama-163@hotmail.com',
'yuranis.figueroa.v@gmail.com',
'yohanzaza26@gmail.com',
'yoha1110@hotmail.com',
'marcoantonio943@hotmail.com',
'KEVINYOLVIALVAREZ@GMAIL.COM',
'yulissamarchavez13@hotmail.com',
'jesusemiliomoralessaa@gmail.com',
'nohrag@gmail.com',
'administrativa@infraestructuralegal.co',
'madasan0818@gmail.com',
'jhoncontador13@gmail.com',
'patmeji.mejia@gmail.com',
'stheffanytoledo@hotmail.com',
'yorjanisp@hotmail.com',
'danielafigueroabermejo@hotmail.com',
'jhonba11@hotmail.com',
'carito.086@hotmail.com',
'yaleon78@gmail.com',
'msebasc410@gmail.com',
'haroldlargacha890@gmail.com',
'clmvargas.cv@gmail.com',
'suweb1a@gmail.com',
'erikalorena18@gmail.com',
'vajoel17@gmail.com',
'nazly300208@gmail.com',
'mancad1803@hotmail.com',
'noenoe.nn56@gmail.com',
'peterhernandez548@gmail.com',
'jiroblesp@gmail.com',
'yulii.grado@gmail.com',
'elviejotorres25@gmail.com',
'nancyarevalo061104@hotmail.com',
'wilson84rqf@gmail.com',
'aurispavon123@gmail.com',
'hbarja2311@gmail.com',
'rodolfocorinto@gmail.com',
'jmgonza53@hotmail.com',
'c.ruizr8@gmail.com',
'anrocaver27@gmail.com',
'nflechasavella@yahoo.es',
'javidescobar@hotmail.com',
'enathpadilla@gmail.com',
'olgajan21@gmail.com',
'johanaro23@gmail.com',
'sandra.ramirez-b@uniminuto.edu.co',
'juseche36@gmail.com',
'anamagarciaadmon@gmail.com',
'solanllypoveda@hotmail.com',
'roblespenaj@gmail.com',
'cristina.rico521@gmail.com',
'sandra.abril1705@gmail.com',
'mary_4036@hotmail.com',
'sbejaranopedraza@gmail.com',
'pedroneljurado2015@gmail.com',
'amparobeltran@laboada.com',
'pepeabraham@gmail.com',
'maria.isabel@hotmail.com',
'laupaty47@gmail.com',
'bhmaigur@gmail.com',
'elviszavalarsc@gmail.com',
'carlosdiazhcr@gmail.com',
'nubiac2011@hotmail.com',
'salinaskaren231@gmail.com',
'omarsnchez@gmail.com',
'nelmartinez4@hotmail.com',
'jolram5@hotmail.com',
'jeampiersqc@gmail.com',
'acosta.nidia@gmail.com',
'eimaq07@gmail.com',
'estebanmentemillonaria@gmail.com',
'samuel_ls15@hotmail.com',
'adrianaizaquita@hotmail.com',
'jhina.rosales@unmsm.edu.pe',
'spatriciabello@gmail.com',
'paocam68@hotmail.com',
'mayrapati10821@hotmail.com',
'delacmariae@gmail.com',
'dpatricia.r18@gmail.com',
'lucyaq@gmail.com',
'rrhh.capacitate@gmail.com',
'carpediem.kgn@hotmail.com',
'abelinomendez75@gmail.com',
'lilikell1201@hotmail.com',
'neslerdav@gmail.com',
'lazoleticia25@gmail.com',
'camaca2005@gmail.com',
'amp.caicedo12@gmail.com',
'jorgeurrego@outlook.com',
'jarolmurillo10@gmail.com',
'Eloisita17.meab@gmail.com',
'adriana.plazas@hotmail.com',
'jeimyandreamorales@gmail.com',
'marialuisapi123@gmail.com',
'dianaorozcoe@hotmail.com',
'betsytorres2011@gmail.com',
'tavoo11624@gmail.com',
'luisastellacp@gmail.com',
'marinapaza@msn.com',
'elioarroyo003@gmail.com',
'anyelitasa07@gmail.com',
'andreamd718@gmail.com',
'imar1994g@gmail.com',
'Axelaviles178@gmail.com',
'jacneryfcr@gmail.com',
'fabiomurcia00@hotmail.com',
'carloskike.coral@gmail.com',
'eusebio-audi@hotmail.com',
'antonio.leon@municipiodequeretaro.gob.mx',
'cesaraugustogarzon68@gmail.com',
'wuilmary.guedez@gmail.com',
'abadaugusto@gmail.com',
'carlos.florez.o98@gmail.com',
'marypao.27.10.95@gmail.com',
'Rodrigo.al99@gmail.com',
'veronica270183@gmail.com',
'apilarb1066@gmail.com',
'liceth0706acosta@gmail.com',
'j.diegodaca@gmail.com',
'clau2563@hotmail.com',
'lelioacero@hotmail.com',
'lujo31420@gmail.com',
'alejawendy@hotmail.com',
'carlosm.llanosuarez@hotmail.com',
'esperanzarivase@gmail.com',
'arturo.bejarano@hotmail.com',
'marcelalopezg12@gmail.com',
'Sertog29@gmail.com',
'leonardorodriguezperez@hotmail.com',
'pisoloto09@yahoo.com',
'jennybarrera2@hotmail.com',
'Sandrita.neiva@hmail.com',
'itzelgarcia280999@gmail.com',
'johansanabriacanisales@hotmail.com',
'MNXIMENA80@GMAIL.COM',
'ykp.ramos@gmail.com',
'ggarciag2014@gmail.com',
'rafantmor@gmail.com',
'jackeline.galeano67@gmail.com',
'duvierfelipehorta123@gmail.com',
'Yeisoncaicedo1994@gmail.com',
'rebecamarcasmallma@gmail.com',
'peraltacarranzaleidy@gmail.com',
'mireyabrv97@gmail.com',
'orlando04paletas@gmail.com',
'amoreyrac@gmail.com',
'marytorreshv@gmail.com',
'naslyuribemira@gmail.com',
'joseluiscaitychivaco@gmail.com',
'juliethmartinezmerino25@gmail.com',
'vertizrojascesar@gmail.com',
'johnninferm10@gmail.com',
'paogarzia9@gmail.com',
'alfopaxim@gmail.com',
'info@gomezzayas.com',
'leydijohannamorales@gmail.com',
'ludaro7@gmail.com',
'evelynlozano8@hotmail.com',
'carlosss._@hotmail.com',
'kikopyp@gmail.com',
'belkis.escobarbelkis@gmail.com',
'naudy2005@yahoo.es',
'noraislia@gmail.com',
'manuel_rc1993@hotmail.com',
'diana-k-aro@hotmail.com',
'scastanoramirez@gmail.com',
'moralesmayra2009@hotmail.com',
'yenypaez@hotmail.com',
'dn54048@gmail.com',
'ejam_consultorias@yahoo.com',
'Kelia_Pardo@hotmail.com',
'magperez1961@gmail.com',
'renecabrera3791@gmail.com',
'janierbecerra@gmail.com',
'julianska69@gmail.com',
'katherinetiria_97@yahoo.com',
'juanabogado2005@yahoo.com',
'Mjpinto_197@hotmail.com',
'Maidacerpa78@gmail.com',
'armellafaud.27@gmail.com',
'cesarmilchercasas@gmail.com',
'moises.enamorado@gmail.com',
'wverlando@gmail.com',
'lucreciamamanihuanca@gmail.com',
'jhasang12@gmail.com',
'samileya@hotmail.com',
'cardenaschalo@gmail.com',
'miguelbarros2416@gmail.com',
'jacquelinemgonza01@gmail.com',
'solucioncontable.sos@gmail.com',
'stephanima3162@gmail.com',
'torrezrivero@gmail.com',
'elkcortes@gmail.com',
'mariaideliz85@gmail.com',
'matildecarrillo1@gmail.com',
'avlp2097@gmail.com',
'larahidlgoleonardo2002@gmail.com',
'Yubisay554@gmail.com',
'franky13206@gmail.com',
'leo.rojas_18@hotmail.com',
'neycimont@gmail.com',
'joelbenghitumen@gmail.com',
'aquitorres@gmail.com',
'angieceballos0308@gmail.com',
'Dxgm17@gmail.com',
'dianita.azuara@gmail.com',
'alexlovejanny@gmail.com',
'nancifu10@gmail.com',
'yesmarceb@gmail.com',
'marthaluzbc@gmail.com',
'rogermaklein@gmail.com',
'yorlyssuarez82@gmail.com',
'guzmanmatias964@gmail.com',
'javih1970@gmail.com',
'quindeyomayra.97@gmail.com',
'ana.colmares22@gmail.com',
'wagneracosta30@gmail.com',
'roserocordoba1995@gmail.com',
'mabelerg7@gmail.com',
'sivy_24@hotmail.com',
'erikag160994@gmail.com',
'Alejandra050908@gmail.com',
'martamoskera@gmail.com',
'merapincayjl@gmail.com',
'ssamideos@gmail.com',
'jesus.ardilab08@gmail.com',
'luzmrh2711@gmail.com',
'moniqa.8a@gmail.com',
'markos1953@hotmail.com',
'elvis-1506@hotmail.com',
'emiliomanuelleyba08@gmail.com',
'bettowen5492@gmail.com',
'csmazo@yahoo.es',
'momamonestier@hotmail.com',
'soniazulemapoma@gmail.com',
'hernandezmarin1993@hotmail.es',
'orielysalas@gmail.com',
'rossy.benitez7@gmail.com',
'Yychavez3@misena.edu.co',
'castrilloeliceth@gmail.com',
'wellmersh@gmail.com',
'anitapm2607@gmail.com',
'mlvsmls@gmail.com',
'ubaldolu@hotmail.com',
'fredybarreda1@gmail.com',
'Davidbi18@hotmail.com',
'cayaloporfidio@gmail.com',
'hcarrerob@gmail.com',
'jaime_arturo_luna@yahoo.com',
'fpaulocochi@gmail.com',
'choquecruzelizabeth1998@gmail.com',
'ymperez@unicauca.edu.co',
'aliscairmj@gmail.com',
'hruizpersonal@gmail.com',
'luism1010@gmail.com',
'lozaantonio022@gmail.com',
'cleme26@gmail.com',
'piloiterrazaskarina@gmail.com',
'alfonsito1542@gmail.com',
'amp_2112@hotmail.com',
'josezalez@gmail.com',
'carmenrosamejias@gmail.com',
'jomolina2760@protonmail.com',
'oscar72322418@gmail.com',
'gutierreznaglesdm@gmail.com',
'edgar.alconq@gmail.com',
'louma.25.ortegas.los@gmail.com',
'sunegocioalderecho@gmail.com',
'wicercor@gmail.com',
'sjas2005@gmail.com',
'yerlis.mercadov@gmail.com',
'cristina_armengold@hotmail.com',
'margarethduqueu1990@gmail.com',
'andreaplata1977@gmail.com',
'paulocgomez@hotmail.com',
'jeffcontabilidadgabriela@gmail.com',
'nailism.p@gmail.com',
'ladiosajessica@hotmail.com',
'johanna_alejita@hotmail.com',
'prudevela1@gmail.com',
'olguiux46@gmail.com',
'ivanribar77@gmail.com',
'mar-munoz76@hotmail.com',
'cocapachom@gmail.com',
'mmmaiu.rt@gmail.com',
'mdebarraza1@gmail.com',
'walterla23@hotmail.com',
'Limaicamedina@mail.com',
'herreravalentina425@gmail.com',
'chechegiovi@gmail.com',
'crispincoro34@gmail.com',
'joseluis7611r@gmail.com',
'alarconvladimir30@gmail.com',
'jimenezdeveloper@gmail.com',
'silst7754@gmail.com',
'samuelpineda62@hotmail.com',
'ma0657032018@unab.edu.sv',
'dayler121db@gmail.com',
'alexandermareno15@gmail.com',
'am061890@gmail.com',
'ahikelarguello@gmail.com',
'jcusi770@gmail.com',
'linda6cat@gmail.com',
'rnuezchavez@yahoo.com',
'nelsonrs3027@yahoo.com',
'PAO-ANDRE-11@HOTMAIL.COM',
'eybd27@hotmail.com',
'dignamarielamontoyaacosta@gmail.com',
'danicha0503@gmail.com',
'oscar_antonioc@hotmail.com',
'ropagus1@gmail.com',
'andreamerino2012@gmail.com',
's.melo@msn.com',
'gabrieldrouet8@gmail.com',
'nines0402@gmail.com',
'lilif_82@hotmail.com',
'henrypatinohp@gmail.com',
'adrianalu099@hotmail.com',
'kaliireyes1996@gmail.com',
'jm822606@gmail.com',
'daisyquintero2001@gmail.com',
'infomedicc@gmail.com',
'joselbisg@gmail.com',
'zharick69200425@gmail.com',
'andriu.val155@gmail.com',
'erortegal@hotmail.com',
'josedavidfm968@gmail.com',
'santosarcangel64@gmail.com',
'hugodpm48@gmail.com',
'olivosm86@gmail.com',
'claudia.roman@outlook.com',
'angel1201_01@hotmail.com',
'francytp@hotmail.com',
'eduardo.enriquez.g@gmail.com',
'nidiaaul@gmail.com',
'scorrpio_0909@hotmail.com',
'pepoerazo@gmail.com',
'yulimotta1994@gmail.com',
'gabicha.c@gmail.com',
'm0308mendoza@gmail.com',
'lizeth14morales@gmail.com',
'ecveduardo@hotmail.com',
'randolfph04262014@gmail.com',
'a.2.maruja@gmail.com',
'efritagor@hotmail.com',
'Gibarrueto@hotmail.com',
'yirima012@hotmail.com',
'caroolina1012@gmail.com',
'ricardo.dif@gmail.com',
'nayo47@live.com.mx',
'macosta20120@gmail.com',
'acr.7.21.09@gmail.com',
'contalfa@hotmail.com',
'jstefagy@gmail.com',
'jdavid12@hotmail.com',
'sebasmore23@gmail.com',
'fanthonspace@gmail.com',
'gerbaco@gmail.com',
'ryaniquez@hotmail.com',
'rocio10cortes@yahoo.com',
'daniylo@gmail.com',
'linsismat@gmail.com',
'mcedgar@outlook.es',
'adrianaore3445@gmail.com',
'jesusamayacardona@gmail.com',
'dairobarrientos@gmail.com',
'samibeva9@hotmail.com',
'diegoalvaropaucara@gmail.com',
'jbarreramazo@yahoo.com',
'karenmollo600@gmail.com',
'michellerbn98@gmail.com',
'angellisarmientoochoa@gmail.com',
'lizethalvarezbtr@gmail.com',
'kerlybarzola2001@gmail.com',
'Jorgeynorela@gmail.com',
'robertquis21@gmail.com',
'arielr0591@gmail.com',
'eugeniorojas53@gmail.com',
'andreasanchez643@gmail.com',
'fleitasdeysi030@gmail.com',
'estudiosjhonsteven@gmail.com',
'jota.dirtya.ra@gmail.com',
'vicente12172@live.com',
'andresc42137@gmail.com',
'risamarlopez@gmail.com',
'cahzapata@gmail.com',
'wilico-lc-90@hotmail.com',
'sharmelym.vilca@gmail.com',
'gaitanlopezsandraliseth@gmail.com',
'carlosbejarano29014@gmail.com',
'vcevallo@hotmail.com',
'nancygregorio909@gmail.com',
'cruzquispemiriam@gmail.com',
'richard.ingsistemas@gmail.com',
'miguerojas70@hotmail.com',
'aramiscarcamo614@gmail.com',
'brigitt.ahime@gmail.com',
'dar.fabian07@gmail.com',
'mjvallea@hotmail.com',
'sandrag81@yahoo.es',
'elinosan31@hotmail.com',
'franjack25@gmail.com',
'saosa90@hotmail.com',
'jimato8111@gmail.com',
'pcdamian@gmail.com',
'mhrafa_18@hotmail.com',
'gina-0809@hotmail.com',
'marino134mm@gmail.com',
'jmchampa25@gmail.com',

//tercera tanta

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