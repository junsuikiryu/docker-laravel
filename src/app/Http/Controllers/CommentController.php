<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * @param  int  $thread_id
     * @param  int  $post_id
     * @param  int  $name
     * @param  int  $sentence
     * @return Response
     */
	public function add_comment(Request $request){
		date_default_timezone_set('Asia/Tokyo');
		$time = date("Y/m/d H:i:s");
		DB::table('comment')->insert([
			'thread_id'=>$request->thread_id,
			'post_id'=>$request->post_id,
			'name'=>$request->name,
			'sentence'=>$request->sentence,
			'time_posted'=>$time
		]);
		DB::table('thread')->where('id', $request->thread_id)->update(['posts'=>$request->post_id]);
		header("Location: {$request->URI}");
		return;
	}
}
