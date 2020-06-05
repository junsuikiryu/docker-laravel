<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>TOP PAGE.</title>
</head>
<body>
<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

$columns = Schema::getColumnListing('thread');
$results = DB::table('thread')->orderBy('title', 'asc')->get();
?>
<table border="1" cellspacing="0" width="70%">
<tr valign="middle" align="center">
	<th height="30">タイトル</th>
	<th width="100" height="30">コメント数</th>
</tr>
</table>
<?php
foreach($results as $row){
?>
<form method="post" action="/delete_thread">
@csrf
<table border="1" cellspacing="0" width="70%">
<tr valign="middle" align="center">
	<td width = 30><input type="checkbox" name="delete[]" value="{{$row->id}}"></td>
	<td>
		<a href="thread?id={{$row->id}}">{{$row->title}}</a>
	</td>
	<td width = "100">
		{{$row->posts}}
	</td>
</tr>
</table>
<?php
}
?>
<input type="submit" value="スレッド削除">
</form>
</body>
</html>
