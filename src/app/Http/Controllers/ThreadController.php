<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ThreadController extends Controller
{
    /**
     * @param  int  $thread_title
     * @param  int  $name
     * @param  int  $sentence
     * @return Response
     */
	public function create_thread(Request $request){
		DB::table('thread')->insert([
			'title'=>$request->thread_title,
			'posts'=>1
		]);
		date_default_timezone_set('Asia/Tokyo');
		$time = date("Y/m/d H:i:s");
		$thread_id = DB::table('thread')->where('title', $request->thread_title)->get()[0]->id;
		DB::table('comment')->insert([
			'thread_id'=>$thread_id,
			'post_id'=>1,
			'name'=>$request->name,
			'sentence'=>$request->sentence,
			'time_posted'=>$time
		]);
		header("Location: /thread?id={$thread_id}");
		return;
	}
    /**
     * @param  int  $thread_title
     * @return Response
     */
	public function delete_thread(Request $request){
		$list = $request->delete;
		foreach($list as $li){
			DB::table('thread')->where('id', $li)->delete();
			DB::table('comment')->where('thread_id', $li)->delete();
		}
		return view('/top');
	}

	public function check_auth_create_thread(){

		if (Auth::check()){
		  return view('create_thread');
		} else {
		// ログインしていないときの処理
		  return redirect('top');
		}
	}

	public function check_auth_delete_thread(){

		if (Auth::check()){
		  return view('delete_thread');
		} else {
		// ログインしていないときの処理
		  return redirect('top');
		}
	}
}
