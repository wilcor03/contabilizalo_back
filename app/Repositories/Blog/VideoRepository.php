<?php
namespace App\Repositories\Blog;
/*-------------------------
| MODELS
-------------------------*/
use App\Models\Blog\Video;
use App\Models\Blog\Videoable;
use App\Models\Blog\Post;

class VideoRepository
{
	protected $video;

	public function __construct(Video $video)
	{	
		$this->video = $video;
	}

	public function _storeAndAttach(array $data, $attacher)
	{	
		$obj = new Video;
		$obj->fill($data);		
		$obj->save();

		if($attacher instanceof Post)
		{
			$obj->posts()->attach($attacher);
			return true;			
		}
		else
		{
			$user = auth()->user();
			$obj->users()->attach($user);			
			return true;
		}				
		return;
	}

	public function attachObj($post)
	{		
		$user = \Auth::user();

		$videos = $this->video->whereHas('users', function($q)use ($user){
									$q->where('id', $user->id);
								})
								->get();

		foreach($videos as $video)
		{
			$video->users()->detach($user);
			$video->posts()->attach($post);
		}		

		return true;
	}

	public function videosAvailables($attacher = null)
	{	
		return Videoable::availableFiles($attacher);
	/*dd(Videoable::all());
		$user = auth()->user();
		if(count($user->videos))
		{
			$videosUser = $user->videos->toArray();
		}

		if($attacher != null)
		{
			if(count($attacher->videos))
			{
				$attacherVideos = $attacher->videos->toArray();
			}
		}

		if(isset($videosUser) && isset($attacherVideos))
		{
			return array_merge($videosUser, $attacherVideos);			
		}

		if(isset($videosUser))
		{
			return $videosUser;
		}

		if(isset($attacherVideos))
		{
			return $attacherVideos;
		}*/
	}

}