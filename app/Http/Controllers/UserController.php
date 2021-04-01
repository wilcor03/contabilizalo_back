<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cache;
/*--------------------------
!MODELS
----------------------------*/
use App\Models\Blog\Post;
use App\Models\Blog\Comment;
use App\Suscriber;

class UserController extends Controller
{
  public function dashboard()
  {
  	return view('user.dashboard');
  }

  public function home()
  {    
  	$slug = 'bienvenidos-a-contabilizalo-com';
  	$post = Cache::remember($slug, 1440, function() use($slug){
      return Post::where('slug', $slug)->with('comments', 'comments.parentComment')->first();
    });

    /*Cache::tags(['Post'])->rememberForever($slug, function() use($slug){
  		return*/ //Post::where('slug', $slug)->first();
  	//});

  	//$comments = /*Cache::tags(['Post','Comment'])->remember($slug, 2880, function()use($post){
  		//return*/ $post->comments;
  	//});

  	return view('home', compact('post'));
  }

  public function clickOnEmail(Request $r){
    try {
      $suscriber = Suscriber::find($r->sus);
      if($suscriber){
        $suscriber->click = $suscriber->click + 1;
        if($suscriber->save()){
          //return 'success!';
          //return redirect()->to();
        }        
      }
      
    } catch (Exception $e) {
      return redirect()->to('');
    }
    
    return;


    /*echo 
    '<div style="margin:0 auto 0; width:400px; font-size:40px; font-family:verdana; color:orange; text-shadow:1px 1px 1px #000;">
      <p>Redireccionando...</p>
    </div>';*/




    sleep(1);
  }
}
