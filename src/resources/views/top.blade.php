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
	<th width="60" height="30">コメント数</th>
</tr>
</table>
<?php
foreach($results as $row){
?>
<table border="1" cellspacing="0" width="70%">
<tr valign="middle" align="center">
	<td>
		<a href="thread?id={{$row->id}}">{{$row->title}}</a>
	</td>
	<td width = "60">
		{{$row->posts}}
	</td>
</tr>
</table>
<?php
}
?>
</body>
</html>
