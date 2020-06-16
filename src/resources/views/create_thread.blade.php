@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<form method="post" action="">
@csrf
タイトル:<input type = "text" class="form-control" name ="thread_title" required="true"><br>
名前:<input type = "text" class="form-control" name ="name" value="名無し" required="true"><br>
本文<br><textarea class="form-control" name="sentence" cols="60" rows="8" required="true"></textarea><br>
<input type="submit" value="作成">
</form>
</div>
</div>
<p style="text-align:center;">
	<a href="top" size=20><font size="5">スレッド一覧</font></a>
</p>
@endsection
