<?php namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tool\UUID;
use App\Models\M3Result;

class UploadController extends Controller {

	 public function uploadFile(Request $request, $type)
	 {
	 	$width = $request->input("width", '');
		$height = $request->input("height", '');
		$jp_result = new M3Result();

		if( $_FILES["file"]["error"] > 0 )
		{
			$jp_result->status = 2;
			$jp_result->message = "未知错误, 错误码: " . $_FILES["file"]["error"];
			return $jp_result->toJson();
		}
		$public_dir = sprintf('/upload/%s/%s/', $type, date('Ymd') );
		$upload_dir = public_path() . $public_dir;
		if( !file_exists($upload_dir) ) {
      mkdir($upload_dir, 0777, true);
    }
		// 获取文件扩展名
		$arr_ext = explode('.', $_FILES["file"]['name']);
		$file_ext = count($arr_ext) > 1 && strlen( end($arr_ext) ) ? end($arr_ext) : "unknow";
		// 合成上传目标文件名
		$upload_filename = UUID::create();
		$upload_file_path = $upload_dir . $upload_filename . '.' . $file_ext;
		if (strlen($width) > 0) {
			$public_uri = $public_dir . $upload_filename . '.' . $file_ext;
			$jp_result->status = 0;
			$jp_result->message = "上传成功";
			$jp_result->uri = $public_uri;
		} else {
			// 从临时目标移到上传目录
			if( move_uploaded_file($_FILES["file"]["tmp_name"], $upload_file_path) )
			{
				$public_uri = $public_dir . $upload_filename . '.' . $file_ext;

				$jp_result->status = 0;
				$jp_result->message = "上传成功";
				$jp_result->uri = $public_uri;
			}
			else
			{
				$jp_result->status = 1;
				$jp_result->message = "上传失败, 权限不足";
			}
		}

		return $jp_result->toJson();
	 }
}
