<?php

namespace App\Http\Controllers\View;


use App\Entity\Category;
use App\Http\Controllers\Controller;


class FrontViewController extends Controller
{
	public function toIndex(){

		$categorys = Category::whereNull('parent_id')->get();

		return view('front.index')->with('categorys',$categorys);
	}
}
