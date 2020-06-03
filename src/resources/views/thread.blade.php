<?php
use Illuminate\Support\Facades\DB;
if (isset($_GET['id'])){
	$thread_info = DB::table('thread')->where('id', $_GET['id'])->get();
	if ($thread_info->count() == 0){
		echo 'No such thread.<br>';
		return;
	}
	global $thread_title;
	$thread_title = $thread_info[0]->title;

	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset='utf-8' />
		</head>
		<title>タイトル: {{$thread_title}}, id:{{$_GET['id']}}</title>
		<body>
			<font size='5'>{{$thread_title}}</font>
		</body>
	</html>
	<?php
	$comments = DB::table('comment')->where('thread_id', $_GET['id'])->orderBy('post_id', 'asc')->get();
	$line_array = ["\r\n", "\r", "\n"];
	foreach($comments as $comment){ ?>
		<?php
		$text = str_replace($line_array, '<br>', $comment->sentence);
		?>
		<table border="0" cellspacing="0" width="70%">
			<tr valign="middle" align="left">
				<td width=50>{{$comment->post_id}}:</td>
				<td>{{$comment->name}}</td>
				<td>{{$comment->time_posted}}</td>
			</tr>
		</table>
		<table border="1" cellspacing="0" width="70%">
			<tr valign = "top" align = "left">
				<td><?php echo $text; ?></td>
			</tr>
		</table><br><br> <?php
	}
}
$num_posts = DB::table('thread')->select('posts')->where('id', $_GET['id'])->get()[0]->posts+1;
?>
<br><br><br>
<form method="post" action="{{$_SERVER["REQUEST_URI"]}}">
@csrf
	<input type="hidden" name="thread_id" value="{{$_GET['id']}}">
	<input type="hidden" name="URI" value="{{$_SERVER["REQUEST_URI"]}}">
	<input type="hidden" name="post_id" value="{{$num_posts}}">
	名前:<input type = "text" size="40" name ="name" value="名無し" required="true"><br>
	本文<br><textarea name="sentence" cols="60" rows="8" required="true"></textarea><br>
	<input type = "submit" value ="post">
</form>
<a href="top" size=20>スレッド一覧</a>
