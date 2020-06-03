<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>スレッド新規作成</title>
</head>
<body>
<form method="post" action="">
@csrf
タイトル:<input type = "text" size="40" name ="thread_title" required="true"><br>
名前:<input type = "text" size="40" name ="name" value="名無し" required="true"><br>
本文<br><textarea name="sentence" cols="60" rows="8" required="true"></textarea><br>
<input type="submit" value="作成">
</form>
</body>
</html>
