<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//use Auth;

//////////////////////
// REPOSITORIES
///////////////////////

use App\Repositories\Blog\FileRepository;

class FileController extends Controller
{
  protected $file;
  protected $allowedfileSize = 6; //MB
	protected $storage_path;
	protected $shorStoragePath;
	protected $user;

	public function __construct(FileRepository $file)
	{ 
    $this->user = auth()->user();
    $this->file = $file;		
		$this->shorStoragePath = $this->setShortStoragePath();
		$this->storage_path = $this->setStoragePath();    
	}

	protected function setStoragePath()
	{
		return storage_path().$this->shorStoragePath;
	}

	/*protected function setShotStoragePath()
	{
		return str_replace($this->shorStoragePath, '', $this->storage_path);
	}*/

	protected function setShortStoragePath()
	{ //print_r(Auth::user()->id." llego"); exit;
    //if(\Auth::check()) 
  // ARREGLAR ESTA MIERDA PARA QUE QUEDE DINAMICA
		return '/uploads/files/1/';
	}

  public function byPost($post = null)
  {  	
  	$files = $this->file->filesAvailables($post);
  	return view('Blog.file.partials.short_list', compact('files'));
  }

  public function store(Request $request, $post = null)
  { 
  	$files = $request->file('files');

  	$saved = false;

  	foreach($files as $file)
  	{   
      $inputFile = ['file' => $file];

      $rules = ['file' => 'max:6000,mimes:doc,pdf,txt,ppt,pps,xls','xlt'];
      $v = \Validator::make($inputFile, $rules);
      
      if($v->fails())
      {
        return response()->json(['success' => false]); 
        //return $v->errors();
      }

	 		if($file->isValid()) 
	 		{	    	
	    	$fileName 		= $file->getClientOriginalName();     
	      $extension 		= $this->getExtensionFile($fileName);
	      $filesize 		= $this->calculateFileSize($file->getClientSize());

        $fileable = ($post != null) ? $fileable = $post : $fileable = auth()->user();

        if(!$request->has('title'))
        {
        	$title = $fileName;
        }
        else
        {
        	$title = $request->get('title');
        }

        $data = [
                  'title'					=> $title,
                  'original_name' => $fileName,
                  'encode_name' 	=> $this->randomName().'.'.$extension,
                  'path'   				=> $this->shorStoragePath,
                  'fileable' 			=> $fileable,
                  'type_file_id'  => $request->get('type_file_id')
                ];
				
        $objFile = $this->file->_storeAndAttach($data, $post);
        $file->move($this->storage_path, $objFile->encode_name);
        if($objFile)
        $saved = true;
			}			
		}

		if($saved)
		return response()->json(['success' => true]);
  }

  public function destroy(Request $request, $file)
  {  	
  	$deleted = $this->file->deleteFile($file);

  	if($deleted)
  	{return response()->json(['success' => true], 200); }

  	return response()->json(['success' => false], 200);  	
  }

  public function download($file)
  {     
    $file->downloads = $file->downloads + 1;
    $file->save();
    return response()->download($file->full_url_file, $file->original_name);
  }

  protected function calculateFileSize($sizeInKB)
  {
  	return ($sizeInKB/1024)/1024;
  }

  protected function randomName()
  {
    return str_random(60);
  } 

  protected function getExtensionFile($fileName)
  {  	
		$trozos = explode(".", $fileName); 
		$extension = end($trozos);
		return $extension;
  }
}
