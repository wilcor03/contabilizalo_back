<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
/*-------------------------
! MODELS
--------------------------*/
use App\Models\Blog\Post; 


class Recommendedable extends Model
{
  protected $table 		= "recommendedables";
  public $timestamps 	= false;

  /*-------------------------
	! RELACIONSHIPS
  --------------------------*/
 	public function post()
 	{
 		return $this->belongsTo(Post::class, 'post_id');
 	}

 	/**--------------------
	! CUSTOM QUERIES
 	----------------------*/

 	public static function recommendContent($object)
 	{
 		$user = \Auth::user(); 	

  	return Self::ofRecommendedable($object) 
  							->orWhere(function($q) use($user) {
			  						return 	$q->where('recommendedable_id', $user->id)
			  						 					->where('recommendedable_type', $user->getMorphClass());
			  					}) 							
  							->get();
 	}

 	public static function existsRecommended($recommendedPost, $editingPost = null)
 	{
 		$user = \Auth::user();

 		return Self::OfEditingPost($recommendedPost, $editingPost)
 								->orWhere(function($q) use($recommendedPost, $user){
 									$q->where('post_id', $recommendedPost->id)
 										->where('recommendedable_id', $user->id)
 										->where('recommendedable_type', $user->getMorphClass());
 								})
 								->first();
 	}


  //SCOPES

  public function scopeOfRecommendedable($q, $object)
  {
  	if(! empty($object))
  	{
  		return $q->orWhere(function($q) use($object) {
  						return 	$q->where('recommendedable_id', $object->id)
  						 					->where('recommendedable_type', $object->getMorphClass());
  					});
  	}  	
  } 

  public function scopeOfEditingPost($q, $recommendedPost, $editingPost = null)
  {
  	if($editingPost != null)
  	{
  		return $q->orWhere(function($q) use($recommendedPost, $editingPost){
 									$q->where('post_id', $recommendedPost->id)
 										->where('recommendedable_id', $editingPost->id)
 										->where('recommendedable_type', $editingPost->getMorphClass());
 								});
  	}
  }

}