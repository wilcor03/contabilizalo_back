<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

/*-------------------------
| MODELS
----------------------------*/

use App\Models\Blog\Video;

class Videoable extends Model
{
  protected $table = "videoables";


  public static function availableFiles($object)
  {  	
  	$user = \Auth::user(); 	

  	return Self::ofVideoable($object) 
  							->orWhere(function($q) use($user) {
			  						return 	$q->where('videoable_id', $user->id)
			  						 					->where('videoable_type', $user->getMorphClass());
			  					}) 							
  							->get();
  }

  //RELACIONSHIPS
  public function video()
  {
  	return $this->belongsTo(Video::class);
  }

  //SCOPES

  public function scopeOfVideoable($q, $object)
  {
    if(! empty($object))
    {
  	  return $q->orWhere(function($q) use($object) {
  						return 	$q->where('videoable_id', $object->id)
  						 					->where('videoable_type', $object->getMorphClass());
  					});
    }  
  }
}
