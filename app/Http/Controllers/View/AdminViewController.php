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

	public function toMemberShow(){
		return view('admin.memberShow');
	}
}
