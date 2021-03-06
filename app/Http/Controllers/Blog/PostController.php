<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Support\Str;
use Carbon\Carbon;

/////////////////
//MODELS
////////////////

use App\Models\Blog\Post;
use App\Models\Blog\TypeFile;
use App\Models\Blog\Recommendedable;
use App\Models\Blog\Category;
use App\Suscriber;

///////////////////
//REPOSITORIES
///////////////////

use App\Repositories\Blog\PostRepository;
use App\Repositories\Blog\ImageRepository;
use App\Repositories\Blog\VideoRepository;
use App\Repositories\Blog\FileRepository;

class PostController extends Controller
{
  protected $post;
  protected $image;
  protected $video;
  protected $file;
  protected $soldCategories;

  public function __construct(PostRepository $post, ImageRepository $image, VideoRepository $video, FileRepository $file)
  {
    $this->post     = $post;
    $this->image    = $image;
    $this->video    = $video;
    $this->file     = $file;
    $this->soldCategories = $this->post->setSellingCourses();
  }

  public function create() 
  { 
    $categories = Category::pluck('title', 'id');      
    return view('Blog.post.create', compact('categories'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'title'       => 'required|unique:posts|max:255',
        'category_id' => 'required|exists:categories,id',
        'slug'        => 'required|max:200',
        'description' => 'required'
    ]);


    $post     = $this->post->_store($request->all());
    $this->video->attachObj($post);
    $this->file->attachObj($post);
    $this->post->attachObj($post); 

    $images   = $this->image->attachImage($post);
    
    $totImages = $this->image->availableFiles($post);     

    if(!count($totImages))
    {
      $randomName = md5(microtime()).'.jpg';
      $this->image->setRandomName($randomName);      
      $defaultImg = $this->image->getImageTemplate();
      $img        = $this->image->saveFilesInFolder($defaultImg, $this->poner_guion($post->title));
      $image      = $this->image->saveInDB(null, $post);    
    }

    Cache::forget('postsCat'.$post->category_id);

    return redirect()->route('post.show', $post);//->route('post.view.all');
  }

 	public function edit(Post $post)
	{ 
    $categories = Category::pluck('title', 'id');
    return view('Blog.post.edit', compact('post', 'categories'));
	}

  public function search(Request $request, Post $editingPost = null)
  {     
    $keyword = $request->get('keyword', null);
    $recommendedPosts = Recommendedable::recommendContent($editingPost); //post recomendados relacionados con un post
    $recommendedPostsIDs = $this->convertObjectInIDArray($recommendedPosts);

    $posts   = Post::byTitle($keyword)
                 ->byDescription($keyword)
                 ->paginate(10);

    return view('Blog.post.partials.search', compact('posts', 'keyword', 'editingPost', 'recommendedPostsIDs'));
  }

  public function show($post)
  {
    //Cache::forget('postsCat'.$post->category_id);
    //Cache::flush(); 
    $collectionOfPosts = [];
    if($post->category->post->id === $post->id)
    {
      $collectionOfPosts = $this->post->_getCollectionCategory($post);
    }

    $principalPost = $this->post->_principalPost($post);

    $prevPost = $this->post->_previousPost($post);
    $nextPost = $this->post->_nextPost($post);

    //$soldCategories = $this->post->setSellingCourses();
    //dd($soldCategories);

    return view('Blog.post.show', compact(
                                  'post', 
                                  'prevPost', 
                                  'nextPost', 
                                  'collectionOfPosts', 
                                  'principalPost',
                                  //'soldCategories'
                                ));
  }

  public function update(Request $request, $post)
  { 
    if (Cache::has($post->slug)) 
    {
      Cache::forget($post->slug);
    }

    $validatedData = $request->validate([
        'title'       => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'slug'        => 'required|max:200',
        'description' => 'required'
    ]);
    

    $post     = $this->post->_update($request->all(), $post);
    $this->video->attachObj($post);
    $this->file->attachObj($post);
    $this->post->attachObj($post); 
    $images   = $this->image->attachImage($post);

    $totImages = $this->image->availableFiles($post);     

    if(!count($totImages))
    {
      $randomName = md5(microtime()).'.jpg';
      $this->image->setRandomName($randomName);      
      $defaultImg = $this->image->getImageTemplate();
      $img        = $this->image->saveFilesInFolder($defaultImg, $this->poner_guion($post->title));
      $image      = $this->image->saveInDB(null, $post);    
    }

    return redirect()->route('post.show', $post);//->route('post.view.all');
  }

  public function addRecommended(Post $recommendedPost, $editingPost = null) //Post route to attach recommended post in post
  {    
    $this->post->toggleRecommendedPost($recommendedPost, $editingPost);  
    return response()->json(['success' => true]);
  }

  public function listRecommendedPosts($editingPost = null)
  {
    $posts = Recommendedable::recommendContent($editingPost);
    return view('Blog.post.partials.lists_recommended', compact('posts', 'editingPost'));
  }

  public function viewAll()
  {
  	$posts = Post::orderBy('updated_at', 'desc')->paginate(15);

  	return view('Blog.post.view_all', compact('posts'));
  }

  /**
  !-----------------------------------
  ! COMPLEMENT FUNCTIONS
  !---------------------------------
  */

  private function convertObjectInIDArray($objects)
  {
    $array = [];
    foreach($objects as $object)
    {
      array_push($array, $object->post_id);
    }

    return $array;
  }

  private function poner_guion($url)
  {
    $url = strtolower($url);
    //Reemplazamos caracteres especiales latinos
    $find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ','Á','É','Í','Ó','Ú','Ñ');
    $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n','A','E','I','O','U','N');
    $url  = str_replace($find, $repl, $url);
    //Añadimos los guiones
    //$find = array(' ', '&amp;', '\r\n', '\n','+');
    //$url = str_replace($find, '-', $url);
    //Eliminamos y Reemplazamos los demas caracteres especiales
    //$find = array('/[^a-z0-9\-&lt;&gt;]/', '/[\-]+/', '/&lt;{^&gt;*&gt;/');
    //$repl = array('', '-', '');
    //$url = preg_replace($find, $repl, $url);
    return strtoupper($url);
  }

  public function deleteAllCache($url = null)
  {
    //dd($url);
    if($url != null)
    {
      Cache::forget($url);
    }
    else
    {
      Cache::flush();  
    }    
    return redirect()->route('post.view.all')->with(['global' => 'cache elimianda', 'success' => true]);
  }

  public function promoApl()
  {
    return view('Blog.promo.sell_app_renta');
  }

  public function payStates()
  {
    return view('Blog.promo.payu_states');
  }

  public function promoCourses()
  {
    $soldCategories = $this->soldCategories;
    return view('Blog.promo.courses', compact('soldCategories'));
  }

  public function getUrl(Request $r){      
    $parts = explode('/', $r->route);
    $slugArt = end($parts);
    $newSlug = Str::slug($r->title, '-');

    if(Post::where('slug', $slugArt)->exists()){
      return response()->json(['new_slug' => $newSlug], 200);
    }       
    
    if(Post::where('slug', $newSlug)->exists()){
      return response()->json(['new_slug' => ''], 404);
    } 

    return response()->json(['new_slug' => $newSlug], 200);
  }

  public function promoPersNaturales(){
    return view('Blog.promo.renta_p_naturales');
  }

  public function promoExcel(Request $r){
    if($r->c){
      $this->saveRegisters("EXCEL PÁCTICO: ");
      return redirect()->to('https://go.hotmart.com/I48417126L');
    } elseif ($r->h) {//consultor de ruts
      $this->saveRegisters("CONSULTOR RUT: ");
      return redirect()->to('https://www.consultorcontable.com/verificador-de-rut');
    } elseif ($r->v) {//en vivos ?v=1
      $this->saveRegisters("ENVIVO SEMANA 27-4: ");
      return redirect()->to('https://contabilizalo.lpages.co/lanzamiento-1/');
    } elseif($r->m){
      $this->saveRegisters("MASTER: ");
      return redirect()->to('https://go.hotmart.com/W50538853D?ap=ee7c');
    }   
    
    $this->saveRegisters("CURSO VBA: ");

    return redirect()->to('https://certificate.contabilizalo.com');

    //dd('arrived');
    //$payUrl = 'https://go.hotmart.com/H42856436B?ap=5769'; 
    //return view('Blog.promo.excel-vba', compact('payUrl'));

    //return redirect()->to('https://go.hotmart.com/H42856436B');
    //
    //udemy
    //https://www.udemy.com/course/de-0-a-experto-en-macros-y-vba-excel-facil-para-humanos/?referralCode=E7FC50E0FB91493D69A3
    

    
  }

  public function deleteSuscriber(Request $r){    
    $suscribers = Suscriber::where('email', $r->e)
                ->where('id', $r->id)
                ->get();

    foreach($suscribers as $sus){
      $sus->delete();
    }

    echo '<br>
      <h1 style="color:green; text-align:center;">
        Has sido removido con Exito de la base de datos!
      </h1>
      <br>
      ...
      <script>
        setTimeout(() => {
          window.location.href="https://contabilizalo.com/cursos/certificados"
        }, 2000)
      </script>
      ';
    //return redirect()->to('/');

    /*$suscribers = Suscriber::where('email', $r->e)
                ->where('id', $r->id)
                ->get();

    foreach($suscribers as $sus){
      $sus->delete();
    }*/
  }

  public function whoWeAre(){
    return view('Blog.promo.who-we-are');
  }

  private function saveRegisters($reg){
    
    try {      
      $contents = $reg."|".Carbon::now();      
      $this->writeFile($contents);      
      //Mail::to("wilcor03@gmail.com")->queue(new CourseSuscriber($data));  
    } catch (Exception $e) {
      return response()->json(['success' => false], 500);
    }   
    return response()->json(['success' => true]);
  }

  private function writeFile($content){
    $path = storage_path()."/app/VENTAS_REGS.txt";    
    $courseReg = fopen($path, "a") or die("Unable to open file!");
    fwrite($courseReg, $content.PHP_EOL);
    fclose($courseReg);
  }

  public function courseDetail($slug){
    $collection = collect(Self::DATA);
    return $collection->firstWhere('slug', $slug);
  }
}
