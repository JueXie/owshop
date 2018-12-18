<?php

namespace App\Tool\SQLQuery;

use App\Entity\Member;

class SqlQuery{

	public function getAllMember(){
		$query = Member::all();
		return $query;
	}
}