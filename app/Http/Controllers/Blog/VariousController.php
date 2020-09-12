<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\CourseSuscriber;
use Illuminate\Support\Facades\Mail;

use App\Models\Course;

class VariousController extends Controller
{
  public function cursos(){  	
  	$courses = Course::all();
  	return view("Blog.courses.courses", compact('courses'));
  }

  public function contact(Request $r){
  	$r->validate([
  		'name' 		=> 'required',
  		'cel' 		=> 'required',
  		'program' => 'required',
  		'email'   => 'email|nullable'
  	]);

  	try {
  		$data = $r->all();
  		Mail::to("wilcor03@gmail.com")->queue(new CourseSuscriber($data));	
  	} catch (Exception $e) {
  		return response()->json(['success' => false], 500);
  	}  	
  	return response()->json(['success' => true]);
  }

  public function courseDetail($slug){
  	$collection = collect(Self::DATA);
  	return $collection->firstWhere('slug', $slug);
  }
}
