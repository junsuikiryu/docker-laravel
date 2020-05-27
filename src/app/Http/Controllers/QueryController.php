<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class QueryController extends Controller
{
    /**
     * 指定ユーザーのプロフィール表示
     *
     * @param  int  $id
     * @return Response
     */
	 public function foobar(Request $request){
		// $a = $request->all();
		// foreach($a as $re){
		// 	echo $re."<br>";
		// }
		// echo $request->text1;
		if ($request->text1 != '' && $request->text2 != ''){
			echo 'insert data -> ['.'(id: '.$request->text1.'), (name: "'.$request->text2.'")]<br>';
			DB::table('users')->insert(['id' => $request->text1,'name' => $request->text2]);
		}
		else
			echo 'show table';
	     return view('hoge/form');
	 }

	 public function foo(){
	     echo "foo";
	 }

	 public function bar(){
	     echo "bar";
	 }
}
