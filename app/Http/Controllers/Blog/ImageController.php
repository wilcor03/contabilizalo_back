<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*-----------------------------------
! MODELS
-------------------------------------*/
use App\Repositories\Blog\ImageRepository;


class ImageController extends Controller
{
	protected $image;
  protected $allowedfileSize = 6; //MB

	public function __construct(ImageRepository $image)
	{
		$this->image = $image;	
	}

  public function byPost($post = null)
  {
  	$images = $this->image->availableFiles($post);
  	if(count($images))
  	{
  		return view('Blog.image.partials.list_available_images', compact('images', 'post'));
  	}

  	return view('Blog.image.partials.form_upload_images', compact('post')); 
  }

  public function destroy($image)
  {  	
  	$this->image->deleteFile($image);		
		return response()->json(['success' => true]);  	
  }

  public function store(Request $request, $post = null)
  {  
    $validatedData = $request->validate([
        'image'       => 'required|image|dimensions:min_width=700,min_height=200',
        'alt'         => 'required|max:255',

    ]);
    $this->image->_store($request->all(), $post, '', auth()->user());	

  	return response()->json(['success' => true]);
  }
}
