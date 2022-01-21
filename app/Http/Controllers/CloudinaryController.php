<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cloudder;

class CloudinaryController extends Controller
{
	public function __construct()
	{
		return "Lumen Controller";
	}
	public function upload(Request $request)
    {
		$file_url = "";
		if ($request->hasFile('image') && $request->file('image')->isValid()){
			$cloudder = Cloudder::upload($request->file('image')->getRealPath());
			$uploadResult = $cloudder->getResult();
			$file_url = $uploadResult["url"];
			return response()->json([
				'status' => true,
				'message' => "File succesfully uploaded",
				'file_url' => $file_url
			], 200);
		}
		return response()->json([
			'status' => false,
			'message' => "File must be required",
		], 400);
    }
}
?>