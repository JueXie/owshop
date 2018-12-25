<?php

namespace App\Http\Controllers\Service;

use App\Entity\Category;
use App\Models\M3Result;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
	public function categoryAdd(Request $request){
		$name = $request->input('name','');
		$parentID = $request->input('parent_id','');
		$categoryno = $request->input('categoryno','');
		$description = $request->input('description','');
		$category = new Category();
		$category->name = $name;
		$category->description = $description;
		$category->category_no = $categoryno;
		if ($parentID != ''){
			$category->parent_id = $parentID;
		}
		$category->save();
		$jp_result = new M3Result();
		$jp_result->status = 000;
		$jp_result->message = '添加成功';
		return $jp_result->toJson();
	}

	public function categoryStatus(Request $request){
		$id = $request->input('id','');
		$status = $request->input('status','');
		$jp_result = new M3Result();
		$category = Category::find($id);
		if ($status == 0){
			$category->status = 1;
			$category->save();
			$jp_result->status = 0000;
			$jp_result->message = '修改成功';
		}elseif($status == 1){
			$category->status = 0;
			$category->save();
			$jp_result->status = 0001;
			$jp_result->message = '修改成功';
		}else{
			$category->status = 2;
			$category->save();
			$jp_result->status = 0002;
			$jp_result->message = '修改成功';
		}
		return $jp_result->toJson();
	}

	public function categoryEdit(Request $request){
		$id = $request->input('id','');
		$categoryname = $request->input('categoryname','');
		$description = $request->input('description','');
		$parentId = $request->input('parent_id','');

		$cate = Category::find($id);
		$cate->name = $categoryname;
		$cate->description = $description;
		$cate->parent_id = $parentId;
		$cate->save();
		$jp_result = new M3Result();
		$jp_result->status = 00000;
		$jp_result->message = '修改成功';
		return $jp_result->toJson();
	}
}
