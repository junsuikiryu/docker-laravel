<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>insert and show table.</title>
</head>
<body>
<form method="POST" action="form">
@csrf
<input type="text" name="text1" pattern="^[0-9]+$" maxlength='11' placeholder='id'>
<input type="text" name="text2" pattern="^[a-zA-Z][0-9a-zA-Z]*$" maxlength='64' placeholder='name'>
<input type="submit" value="登録する" name="sub1">
</form>
<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

$columns = Schema::getColumnListing('users');
$results = DB::table('users')->get();
//  foreach ( $results as $result){
//     echo $result->name;
// }
?>
<table border="1" cellspacing="0">
<tr valign="middle" align="center">
	<?php foreach($columns as $column_name){ ?>
		<th width="100" height="30"><?php echo $column_name; ?></th>
	<?php } ?>
</tr>
</table>
<?php
foreach($results as $row){
?>
<table border="1" cellspacing="0">
<thead>
<tr valign="middle" align="center">
	<?php foreach($row as $data){ ?>
		<td width="100" height="30"><?php echo $data; ?></td>
	<?php } ?>
</tr>
</thead>
</table>
<?php
}
?>
</body>
</html>
