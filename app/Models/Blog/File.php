<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

//////////////////
// MODELS
//////////////////
use App\Models\Blog\Post;
use App\Models\Blog\TypeFile;
use App\User;

class File extends Model
{ 
	protected $fillable = ['title', 'original_name', 'encode_name', 'path'];

	/*---------------------------
	! ACCESSORS
	-----------------------------*/

  function getFullUrlFileAttribute()//ruta absoluta al archivo codificado
  {
  	return storage_path().$this->path.$this->encode_name;
  }

	/*
  !-----------------------------
  ! RELACIONSHIPS
  !-----------------------------
  */

  public function posts()
  {
  	return $this->morphedByMany(Post::class, 'fileable');
  }

  public function type_file()
  {
  	return $this->belongsTo(TypeFile::class);
  }

  public function users()
  {
  	return $this->morphedByMany(User::class, 'fileable');
  }

}
