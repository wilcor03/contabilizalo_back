<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//////////////////////
// MODELS
///////////////////////

use App\Models\Blog\Post;
use App\Repositories\Blog\VideoRepository;

//////////////////////
// REPOSITORIES
///////////////////////

use App\Repositories\Blog\Video;

class VideoController extends Controller
{
	protected $video;

	public function __construct(VideoRepository $video)
	{
		$this->video = $video;
	}

	public function byPost($post = null)
  {    
  	$videos = $this->video->videosAvailables($post);          
  	return view('Blog.video.partials.short_lists', compact('videos'));
  }

  public function destroy($video)
  {
  	$video->delete();
  	return response()->json(['success' => true]);
  }

  public function newToken()
  {
  	return response()->json(['new_token' => csrf_token()]);
  }

  public function store(Request $request, $post = null)
  {
  	$saved = $this->video->_storeAndAttach($request->all(), $post);  	
  	
  	if(count($saved))
  	{
  		return response()->json(['success' => true]);	
  	}  	
  	return response()->json(['success' => false]);	
  }

 
}
