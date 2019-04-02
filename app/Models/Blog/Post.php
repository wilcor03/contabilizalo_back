<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

/////////////
//MODELS
////////////

use App\Models\Blog\Video;
use App\Models\Blog\File;
use App\Models\Blog\RecommendedContent;
use App\Models\Blog\Image;
use App\User;
use App\Models\Blog\Category;
use App\Models\Blog\Comment;

class Post extends Model
{
 	protected $table = 'posts';
 	protected $fillable = ['title', 'description', 'slug', 'status', 'meta_keywords', 'meta_description'];

 	/*-------------------------
	! ACCESSORS
 	-------------------------*/
 	public function getImageAltAttribute()
 	{
 		$image = $this->images->first();
 		if($image->alt == "")
 		{
 			return $this->title;
 		}

 		return $image->alt;
 	}

 	public function getPrincipalImageAttribute($value)
 	{
 		return $this->images->first();
 	}

  public function getMetaKeywordArrayAttribute()
  {
    return explode(',', $this->meta_keywords);
  }

 	/*
	!---------------------------------------
	!	RELACIONSHIPS
	!---------------------------------------
 	*/
 	public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function hasCategory()
  {
    return $this->hasOne(Category::class, 'related_post_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function comments()
  {
    return $this->morphMany(Comment::class, 'commentable');
  }

	public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

	public function files()
 	{
 		return $this->morphToMany(File::class, 'fileable');
 	}

 	public function users()
  {
    return $this->morphedByMany(User::class, 'recommendedable');
  }
  
  public function posts()
  {
    return $this->morphedByMany(Post::class, 'recommendedable');
  }

	public function postsBelongs()
  {
    return $this->morphToMany(Post::class, 'recommendedable');
  }  

 	public function videos()
 	{
 		return $this->morphToMany(Video::class, 'videoable');
 	}

 	public function getRouteKeyName()
	{
	  return 'slug';
	}

	/*
	!---------------------------------------
	!	SCOPES
	!---------------------------------------
 	*/
 	public function scopeByDescription($q, $keyword)
 	{
 		if(! empty($keyword))
 		{
 			return $q->orWhere('description', 'like', "%$keyword%");
 		}
 	}

 	public function scopeByTitle($q, $keyword)
 	{
 		if(! empty($keyword))
 		{
 			return $q->orWhere('title', 'like', "%$keyword%");
 		}
 	}

  public function scopePostByCategory($q, $categoryID)
  {
    return $q->where('category_id', $categoryID);
  }
}
