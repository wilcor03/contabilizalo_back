<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

/*------------------------------
! MODELS
--------------------------------*/
//use App\Models\Blog\Comment;

class Comment extends Model
{
  /**------------------------------------
	! RELACIONSHIP
  ---------------------------------------*/

  public function commentable()
  {
  	return $this->morphTo();
  }

  public function parentComment()
  {
  	return $this->belongsTo(Self::class);
  }
}
