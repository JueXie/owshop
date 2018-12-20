<?php

namespace App\Http\Controllers\View;


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
		$members = Member::all();
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

	public function toCategory(){
		return view('admin.category');
	}
	public function toCategoryAdd(){
		return view('admin.categoryAdd');
	}
}
