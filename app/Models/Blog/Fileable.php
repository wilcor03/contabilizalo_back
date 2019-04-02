<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

//MODELS

use App\User;
use App\Models\Blog\File;

class Fileable extends Model
{
  protected $table    = 'fileables';
  public $timestamps  = false;

  /*
  * @ $object => files availables for the that object
  *
  */

  public static function availableFiles($object)
  {  	
  	$user = \Auth::user(); 	

  	return Self::ofFileable($object) 
  							->orWhere(function($q) use($user) {
			  						return 	$q->where('fileable_id', $user->id)
			  						 					->where('fileable_type', $user->getMorphClass());
			  					}) 							
  							->get();
  }

  //RELACIONSHIPS
  public function file()
  {
  	return $this->belongsTo(File::class);
  }



  //SCOPES

  public function scopeOfFileable($q, $object)
  {
    if(! empty($object))
    {
  	  return $q->orWhere(function($q) use($object) {
  						return 	$q->where('fileable_id', $object->id)
  						 					->where('fileable_type', $object->getMorphClass());
  					});
    }  
  } 	
}
