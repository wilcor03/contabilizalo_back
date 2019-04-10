<?php
namespace App\Repositories\Blog;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

/*-----------------------------------
! FACADES
------------------------------------*/
use Image;

/*-----------------------------------
! MODELS
------------------------------------*/
use App\Models\Blog\Post;
use App\Models\Blog\Image as ImageObj;

/*-----------------------------------
! TRAIT
------------------------------------*/
use App\Traits\AditionalsFunctions;

class ImageRepository
{
	protected $image;
	protected $randomName;
	private 	$user;


	use AditionalsFunctions;

	public function __construct(ImageObj $image)
	{
		$this->image 	= $image;
	}

	public function deleteFile($file)//eliminar el archivo de la carpeta
  {
  	return $this->deleteFilesDB([$file]);	
  }

  public function setRandomName($randomName)
  {
  	$this->randomName = $randomName;
  }	

	public function availableFiles($object)
  {  	
  	$user = \Auth::user(); 	
  	return $this->image->OfImageable($object) 
  							->orWhere(function($q) use($user) {
			  						return 	$q->where('imageable_id', $user->id)
			  						 					->where('imageable_type', $user->getMorphClass());
			  					})
  							->get();
  }

	public function _store($data, $object = null, $text = null, $userDB = NULL)
	{
		if($data['image'] != null)
		{
			$savedObject = $this->saveInDB($data, $object, $userDB);

			if(count($savedObject))
			{
				return $this->saveFilesInFolder($data['image'], null);
			}
		}
		//data is Image file		
	}

	public function saveFilesInFolder($image, $text = null)
	{
		$img 				= Image::make($image);

		if($text != null)
		{
			$textBlocks = $this->setText($text);
			$logoImg 		= config('custom.images.settings.logo-path');
			$logo 			= Image::make($logoImg);
			$logo->contrast(65);
			$logo->resize(170, 40);

			$verticalDistance = 60;
			$fontSource				= config('custom.images.settings.default-font');
			foreach($textBlocks as $textblock)
			{
				$img->text($textblock, 440, $verticalDistance, function($font) use($fontSource) {
			    $font->file($fontSource);
			    $font->size(27);
			    $font->color('#FFFFFF');
			    $font->align('center');
			    $font->valign('middle');    
			    $font->angle(0);
				});

				$verticalDistance += 40;
			}

			$img->insert($logo, 'bottom-right', 30, 20);
			$img->resize(847, 220);				
			$img = $img->save(config('custom.images.settings.base-folder').$this->randomName, 80);
		}

		/*$img->resize(900, null, function ($constraint) {
		   $constraint->aspectRatio();
		});*/
		$img->resize(847, 400);	
		$img = $img->save(config('custom.images.settings.base-folder').$this->randomName, 90);
		
		

		$thumbnail = $img;
		$thumbnail->resize(140, 80); 		
		$thumbnail->save(config('custom.images.settings.thumbnail-folder').$this->randomName);

		return $img;
	}

	public function attachImage($post)
	{
		$user = \Auth::user();		

		$userImages = $this->image->where(function($q) use($user) {
  									$q->where('imageable_id', $user->id)
  						 				->where('imageable_type', $user->getMorphClass());
  								})
									->update(['imageable_id' => $post->id, 'imageable_type' => $post->getMorphClass()]);

		return $userImages;
	}

	public function getImageTemplate()
	{		
		return storage_path().'/app/image_templates/orange.jpg';
	}

	public function saveInDB($data = null, $object = null, $userDB=null)
	{
		$user 						= $userDB;
		
		if(isset($data['image']))
		{
			$fileName 				= $data['image']->getClientOriginalName();
			$extension 				= $this->getExtensionFile($fileName);
			$randomName 			= md5(microtime()).'.'.$extension;

			$this->setRandomName($randomName);	
		}
		else
		{
			$fileName 				= $this->randomName;			
		}			

		$img 							= new ImageObj;
		if($data != null)
		{
			$img->fill($data);
		}
		else
		{
			$img->alt  			= $object->title;
		}		

		$img->path 				= config('custom.images.settings.base-folder');
		$img->original_name = $fileName;
		$img->encode_name = $this->randomName;

		if($object != null)
		{			
			$img->imageable()->associate($object);
		}
		else
		{		
			$img->imageable()->associate($user);
		}			

		$img->save();

		return $img;
	}


	private function setText($text)
	{
		$maxLenPerLine = 28;
		$words = str_word_count($text, 1);		

		$strBlocks = [];
		$newString = "";

		for($i = 0; $i < sizeof($words); $i++)
		{
			$oldString 		= $newString;

			if($i == 0)
			{ 
				$newString 	 .= $words[$i];
			}
			else
			{
				$newString 	 .= " ".$words[$i];					
			}

			if(strlen($newString) > $maxLenPerLine)
			{
				array_push($strBlocks, $oldString);
				$newString = "";
				
				if(($i + 1 ) == count($words))
				{					
					array_push($strBlocks, $words[$i]);
					break;
				}

				$newString .= $words[$i];
			}

			if(($i + 1 ) == count($words))
			{					
				array_push($strBlocks, $newString);
			}
		}

		return $strBlocks;
	}

	protected function getExtensionFile($fileName)
  {  	
		$trozos = explode(".", $fileName); 
		$extension = end($trozos);
		return $extension;
  }
}