<?php

namespace App\Http\Controllers\View;


use App\Entity\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FrontViewController extends Controller
{
	public function toIndex(Request $request){

		$categorys = Category::whereNull('parent_id')->get();
		if ($request->session()->get('member') != null){
			$member = $request->session()->get('member');
			return view('front.index')->with('categorys',$categorys)->with('member',$member);
		}else{
			return view('front.index')->with('categorys',$categorys);
		}
	}
}
