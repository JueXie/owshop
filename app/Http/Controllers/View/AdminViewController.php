<?php

namespace App\Http\Controllers\View;


use App\Entity\Category;
use App\Entity\Member;
use App\Http\Controllers\Controller;


class AdminViewController extends Controller
{
	public function toAdmin(){
		return view('admin.index');
	}
	public function toWelcome(){
		return view('admin.welcome');
	}

	public function toMemberList(){
		$members = Member::where('status','<',3)->get();
		return view('admin.memberList')->with('members',$members);
	}

	public function toMemberAdd(){
		return view('admin.memberAdd');
	}

	public function toMemberShow($id){
		$member = Member::find($id);
		return view('admin.memberShow')->with('member',$member);
	}
	public function toMemberEdit(){
		return view('admin.memberEdit');
	}
	public function toChangePassword($id){
		$member = Member::find($id);
		$id = $member->id;
		$membername	 = $member->nickname;
		return view('admin.changePassword')->with('membername',$membername)->with('id',$id);
	}
	public function toMemberDel(){
		$members = Member::where('status',3)->get();
		return view('admin.memberDel')->with('members',$members);
	}

	public function toCategory(){
		$categorys = Category::where('status','<',2)->get();
		foreach ($categorys as $category){
			if ($category->parent_id != null&&$category->parent_id != ""){
					$category->parent = Category::find($category->parent_id);
			}
			//包含的子类数据,todo
//			if ($category->parent_id == null){
//				$category->include = $category->include.Category::where('parent_id',$category->id)->get();
//			}
		}
		return view('admin.category')->with('categorys',$categorys);
	}
	public function toCategoryAdd(){
		$categorys = Category::whereNull('parent_id')->get();
		return view('admin.categoryAdd')->with('categorys',$categorys);
	}



	public function toCategoryDel(){
		$categorys = Category::where('status',2)->get();
		return view('admin.categoryDel')->with('categorys',$categorys);
	}

	public function toCategoryEdit($id){
		$cate = Category::find($id);
		$categorys = Category::whereNull('parent_id')->get();
//		foreach ($cate as $category){
//			if ($category->parent_id != null&&$category->parent_id != ""){
//				$category->parent = Category::find($category->parent_id);
//			}
//		}
		return view('admin.categoryEdit')->with('cate',$cate)->with('categorys',$categorys);
	}
}
