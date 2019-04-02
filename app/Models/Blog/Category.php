<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

///////////////
//MODELS
///////////////
use App\Models\Blog\Post;

class Category extends Model
{
  protected $table = "categories";

  ///////////////////
  //RELACIONSHIPS
  ///////////////////

  public function posts()
  {
  	return $this->hasMany(Post::class);
  }

  public function post()
  {
    return $this->belongsTo(Post::class, 'related_post_id');
  }

  ///////////////////
  //COMPLEMENT SYSTEM FUNCTIONS
  //////////////////////
  
  public function getRouteKeyName()
	{
	  return 'slug';
	} 
}