@extends('layouts.app')

@section('content')
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

<p style="text-align:center;">
<font size='10' align="center">{{$thread_title}}</font>
</p>

<div class="container">
<div class="row justify-content-center">
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
		<table class="table table-bordered">
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
	名前:<input type = "text" class="form-control" size="40" name ="name" value="名無し" required="true"><br>
	本文<br><textarea class="form-control" name="sentence" cols="60" rows="8" required="true"></textarea><br>
	<div style="display:inline-flex; float:right;">
	<input class="btn btn-primary" type = "submit" value ="post">
	</div>
</form>
</div>
</div>
<p style="text-align:center;">
	<a href="top" size=20><font size="5">スレッド一覧</font></a>
</p>
@endsection
