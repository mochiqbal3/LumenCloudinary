<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
	public function __construct()
	{
		return "Lumen Controller";
	}

	public function sendMail(Request $request)
    {
		$to_name = $request->input('name');
		$to_email = $request->input('to_email');
		$data = array('name'=>"Politeknik TEDC", "body" => "Test mail");
		$send = Mail::send('emails.sendmail', $data, function($message) use ($to_name, $to_email ) {
			$message->to($to_email , $to_name)
					->subject('Test Mail From TEDC');
			$message->from('iqbalvandame@gmail.com','Mochamad Iqbal');
		});
		// if($send){
		return response()->json([
			'status' => true,
			'message' => "Mail sucessfully send",
		], 200);
		// }
		// return response()->json([
		// 	'status' => false,
		// 	'message' => "Mail failed send",
		// ], 400);
    }
}
?>