<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//MODELS
use App\Models\Blog\Category;

class CategoryController extends Controller
{
  public function show(Category $category)
  {
  	return view('Blog.category.show', compact('category'));
  }
}
