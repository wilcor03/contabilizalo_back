<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

	protected $fillable = ['alt'];

	/*------------------------------
	! ACCESSORS
  ------------------------------*/  

  public function getFullPathAttribute()
  {
  	return $this->path.$this->encode_name;
  }

  public function getFullUrlFileAttribute()//for delete the file
  {
    return  config('custom.images.settings.public_path').$this->path.$this->encode_name;
  	//return public_path().'/'.$this->path.$this->encode_name;
  }

  public function getFullPathThumbAttribute()
  {
  	return config('custom.images.settings.thumbnail-folder').$this->encode_name;
  }

  public function getFullUrlFileThumbAttribute()//for delete the file
  {
  	return config('custom.images.settings.public_path').config('custom.images.settings.thumbnail-folder').$this->encode_name;
    //return public_path().'/'.config('custom.images.settings.thumbnail-folder').$this->encode_name;
  }

  /**----------------------
	! RELACIONSHIPS
  -----------------------*/
  public function imageable()
  {
    return $this->morphTo();
  }

  /*------------------------------
	! SCOPES
  ------------------------------*/
  public function scopeOfImageable($q, $object)
  {
    if(count($object))
    {
  	  return $q->orWhere(function($q) use($object) {
  						return 	$q->where('imageable_id', $object->id)
  						 					->where('imageable_type', $object->getMorphClass());
  					});
    }  
  }
}
