@extends('layouts.app')

@section('content')
<div class="container">
<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
if (!isset($_GET['search_word']))
	$results = DB::table('thread')->orderBy('title', 'asc')->get();
else if ($_GET['search_word'] === '')
	$results = DB::table('thread')->orderBy('title', 'asc')->get();
else
	$results = DB::table('thread')->where('title', 'like', '%'.$_GET['search_word'].'%')->orderBy('title', 'asc')->get();
$columns = Schema::getColumnListing('thread');
?>
<table class="table table-bordered table-hover">
	<tr valign="middle" align="center">
		<th>タイトル</th>
		<th width="200">コメント数</th>
	</tr>
</table>

<?php
foreach($results as $row){
?>
<table class="table table-bordered table-hover">
	<tr valign="middle" align="center">
		<td>
		<a href="thread?id={{$row->id}}">{{$row->title}}</a>
	</td>
		<td width="200">
		{{$row->posts}}
	</td>
	</tr>
</table>
<?php
}
?>
@if (Route::has('login'))
@auth
<div style="display:inline-flex; float:right;">
	<form method="get" action="/create_thread">
		<input class="btn btn-primary" type="submit" value="スレッド新規作成">
	</form>
	<form method="get" action="/delete_thread">
		<input class="btn btn-primary" type="submit" value="スレッド削除">
	</form>
<div>
@endauth
@endif
</div>
@endsection
