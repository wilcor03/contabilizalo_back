<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

//////////////////
// MODELS
//////////////////
use App\Models\Blog\Post;
use App\User;

class Video extends Model
{
  public $timestamps = false;
  protected $fillable = ['title', 'url'];

  /*
  !-----------------------------
  ! RELACIONSHIPS
  !-----------------------------
  */

  public function posts()
  {
  	return $this->morphedByMany(Post::class, 'videoable');
  }

  public function users()
  {
  	return $this->morphedByMany(User::class, 'videoable');
  }
}
