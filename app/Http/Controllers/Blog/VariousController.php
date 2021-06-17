<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\CourseSuscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

use App\Models\Course;
use App\Exam;

use Dompdf\Dompdf;
use Dompdf\Options;

use App\Preinscrito;
use App\Suscriber;


use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class VariousController extends Controller
{

  public function preinscritos(Request $r){
    if($r->isMethod('post')){      

      $r->validate([
        'nombre' => 'required|',
        'email'  => 'required|email|unique:preinscritos'
      ]);

      $pre = new Preinscrito;
      $pre->nombre = $r->nombre;
      $pre->email = $r->email;
      $pre->pais = $r->pais;
      $pre->telefono = $r->telefono;
      $pre->token = Str::random(7);
      $pre->referente = $r->r ?? null; 
      if($pre->save()){
        return redirect()->route('preins.go', ['uri' => route('preins.go', ['r' =>$pre->id])])
                        ->with(['global' => true]);
      }

    }
    return view('various.preinscritos');
  }


  public function certification(){
    /*$exam = Exam::first();  
    $correctAnswers = [];
    $results = 4;
    return view('examenes.result', compact('correctAnswers', 'results', 'exam'));*/
    //dd(request()->all());

    if(request()->step == "f1"){      
      $exam = Exam::where('email', request()->email)
                  ->whereNull('temp_token')
                  ->first();                  
      //dd($exam);
      if(!$exam){
        $err = "este usuario no existe en la base de datos o ya realizo su examen!";
        return view('examenes.soy-contabilizer', compact('err'));
      } else{
        return view('examenes.soy-contabilizer', compact('exam'));
      }
    }


    if(request()->has('tt')){
      $student = Exam::where('temp_token', request()->tt)->first();  
      $url = 'https://contabilizalo.com/examen/certificacion?tt='.$student->temp_token;
      return $this->certGener();
    }
    
    //$student = Exam::where('temp_token', request()->tt)->first(); 

    return view('examenes.soy-contabilizer');
  }

  public function verifyCertification(Request $r){
    if($r->has('tt')){
      $student = Exam::where('temp_token', request()->tt)
                      ->whereNotNull('temp_token')
                      ->first();       
    }

    if($r->has('wb')){
      $student = Exam::where('temp_token', request()->wb)
                      ->whereNotNull('temp_token')
                      ->first(); 
    }

    if(!$student){
      abort(404);
    }
    return view('examenes.verify-certificate', compact('student'));
  }

  private function certGener($student = null){//generate Certificates
    
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);

    $context = stream_context_create([ 
      'ssl' => [ 
        'verify_peer' => FALSE, 
        'verify_peer_name' => FALSE,
        'allow_self_signed'=> TRUE 
      ] 
    ]);
    $dompdf->setHttpContext($context);

    //$student = Exam::where('temp_token', request()->tt)->first();  
    $url = 'https://contabilizalo.com/examen/certificacion?wb='.$student->temp_token;
    $qrUri = $this->QrCodeGenerator($url);      
    $htmlView = view('examenes.certificade', compact('qrUri', 'student'));

    //return $htmlView;

    $dompdf->loadHtml($htmlView, 'UTF-8');
    $dompdf->getOptions()->set('defaultFont', 'helvetica');
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('CONTABILIZALO_CERTIFICADO_'.str_replace("", '_', $student->name));

    sleep(2);
    return redirect()->to("/");
  }

  private function QrCodeGenerator($url){
    $writer = new PngWriter();

    // Create QR code
    $qrCode = QrCode::create($url)
        ->setEncoding(new Encoding('UTF-8'))
        ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
        ->setSize(300)
        ->setMargin(10)
        ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->setForegroundColor(new Color(0, 0, 0))
        ->setBackgroundColor(new Color(255, 255, 255));

    // Create generic logo
    $logo = Logo::create('https://contabilizalo.com/logocontabilizalo-300x82.png')
        ->setResizeToWidth(50);

    // Create generic label
    $label = Label::create('contabilizalo.com')
        ->setTextColor(new Color(255, 255, 255));
        ->setBackgroundColor(new Color(0, 0, 230));

    $result = $writer->write($qrCode, $logo, $label);

    return $result->getDataUri();
  }

  public function certifPost(Request $r){    
    $r->validate([
      'name'          => 'required',
      'email'         => 'required|email'      
    ]);

    $sus = Suscriber::where('email', $r->email)->exists();

    if(!$sus){
      $sus = new Suscriber;
      $sus->email = $r->email;
      $sus->name  = $r->name;
      $sus->save();
    }

    $exam = Exam::where('email', $r->email)->first();

    if(!$exam){
      $exam = new Exam;
      $exam->email = $r->email;
      $exam->name  = $r->name;
      $exam->country = "N/A";
      $exam->temp_token = Str::random(20);
      $exam->save();
    }

    return $this->certGener($exam);

    exit;


    if($r->has('mode') && $r->mode =="exam"){

      $r->validate([
        'p1' => 'required',
        'p2' => 'required',
        'p3'          => 'required',
        'p4'          => 'required',
        'p5'          => 'required',
        'p6'          => 'required',
        'p7'          => 'required',
        'p8'          => 'required',
        'p9'          => 'required',
        'p10'          => 'required',
        'p11'          => 'required',
        'p12'          => 'required',
        'temp_token'  => 'required'
      ]);

      $exam = Exam::where('temp_token',$r->temp_token)->first();
      if(!$exam){
        abort(404);
      }

      if($exam->attemps > 0){
        abort(404);
      }

      $results = [];
      $correctAnswers = 0;
      foreach($r->except(['mode','_token', 'temp_token']) as $quest => $answer){

        if($this->validateAnswers($quest, $answer)){
          $results[$quest] = true;
          $correctAnswers += 1;
        } else {
          $results[$quest] = false;
        }
      }

      //$exam->temp_token = null;
      $exam->results = $correctAnswers;
      $exam->exam_answers = json_encode($r->except(['mode','_token', 'temp_token']));
      $exam->attemps = $exam->attemps + 1;
      $exam->save();

      return view('examenes.result', compact('correctAnswers', 'results', 'exam'));
    }    

    ######## DATOS PERSONALES ##############
    $r->validate([
      'name'          => 'required',
//      'email'         => 'required|unique:exams|email|confirmed',
      'country'       => 'required'
    ]);

    $ex = Exam::find($r->exam_id);
    $ex->name     = $r->name;
    //$ex->email    = $r->email;
    $ex->phone    = $r->phone;
    $ex->country  = $r->country;
    $ex->temp_token = Str::random(20);
    if($ex->save()){
      return view('examenes.soy-contabilizer', ['exam' => $ex, 'show_exam'=> 1]);
      //return redirect()->route('exam.show', ['e' => 1]);//muestra el formulario para la prueba
    }
  }


  private function validateAnswers($question, $answer){
    $answers = [
      "p1" => "R2",
      "p2" => "R3",
      "p3" => "R3",
      "p4" => "R4",
      "p5" => "R3",
      "p6" => "R1",
      "p7" => "R1",
      "p8" => "R4",
      "p9" => "R1",
      "p10" => "R3",
      "p11" => "R2",
      "p12" => "R4"
    ];

    if(isset($answers[$question])){
      if($answers[$question] == $answer){
        return true;
      }
    }
    return false;
  }


  public function cursos(){  
    //return redirect()->to('/');	
  	$courses = Course::whereIn('id',[9, 10, 11])->get();
    //dd($courses[0]->description['description']);
  	return view("Blog.courses.courses", compact('courses'));
  }

  public function contact(Request $r){
  	$r->validate([
  		'name' 		=> 'required',
  		'cel' 		=> 'required',
  		'program' => 'required',
  		'email'   => 'email|nullable'
  	]);

  	try {
  		$data = $r->all();
  		$contents = $r->name."|".$r->cel."|".$r->program."|".$r->email;
  		$this->writeFile($contents);  		
  		Mail::to("wilcor03@gmail.com")->queue(new CourseSuscriber($data));	
  	} catch (Exception $e) {
  		return response()->json(['success' => false], 500);
  	}  	
  	return response()->json(['success' => true]);
  }

  private function writeFile($content){
  	$path = storage_path()."/app/COURSE_REGS.txt";  	
  	$courseReg = fopen($path, "a") or die("Unable to open file!");
  	fwrite($courseReg, $content.PHP_EOL);
  	fclose($courseReg);
  }

  public function courseDetail($slug){
  	$collection = collect(Self::DATA);
  	return $collection->firstWhere('slug', $slug);
  }


}
