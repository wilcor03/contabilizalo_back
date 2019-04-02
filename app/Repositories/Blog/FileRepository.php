<?php
namespace App\Repositories\Blog;

/*---------------------
! MODELS
----------------------*/
use App\Models\Blog\File;
use App\Models\Blog\Fileable;
use App\Models\Blog\Post;

////////////////////
// TRAITS
///////////////////

use App\Traits\AditionalsFunctions;

class FileRepository
{
	protected $fileable;

	use AditionalsFunctions;

	public function __construct(Fileable $fileable)
	{
		$this->fileable = $fileable;
	}

	public function deleteFile($file)//eliminar el archivo de la carpeta
  {
  	return $this->deleteFilesDB([$file]);
  }

	public function _storeAndAttach(array $data, $attacher)
	{
		$obj = new File;
  	$obj->fill($data);  	
  	$obj->type_file()->associate($data['type_file_id']);
  	$obj->save();

  	if($attacher instanceof Post)
		{
			$obj->posts()->attach($attacher);
			return $obj;
		}
		else
		{
			$user = auth()->user();
			$obj->users()->attach($user);			
			return $obj;
		}				
		return;
	}

	public function attachObj($post)
	{
		$user = \Auth::user();

		$update = $this->fileable->where(function($q) use($user) {
  									$q->where('fileable_id', $user->id)
  						 				->where('fileable_type', $user->getMorphClass());
  								})
									->update(['fileable_id' => $post->id, 'fileable_type' => $post->getMorphClass()]);

		return $update;
	}


	public function filesAvailables($attacher = null)
	{		
		return Fileable::availableFiles($attacher);		
	}
}