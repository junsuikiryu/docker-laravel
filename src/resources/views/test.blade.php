<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHPの基本的な書き方</title>
  </head>
  <body>
    <?php
    echo $test."<br>";
    // mysqliクラスのオブジェクトを作成
    $mysqli = new mysqli('db'/* mysqlコンテナ名 */, 'root', 'secret', 'sample');
    if ($mysqli->connect_error) {
        echo $mysqli->connect_error;
		echo "error";
        exit();
    } else {
        $mysqli->set_charset("utf8");
    }

    $sql = "SELECT * FROM users";
    if ($result = $mysqli->query($sql)) {

        // 連想配列を取得
        // while ($row = $result->fetch_assoc()) {
        //     echo $row["id"] . " : " . $row["name"] . "<br>";
        // }
        // 結果セットを閉じる

		//連想配列で取得
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
		    $rows[] = $row;
		}
		foreach($rows as $row){
	?>
<table border="2">
	<thead>
		<tr valign="middle" align="center">
			<td width="100" height="30"><?php echo $row['id']; ?></td>
			<td width="100" height="30"><?php echo $row['name']; ?></td>
		</tr>
	</thead>
</table>

		<?php
		}
	    $result->close();
    }

    // DB接続を閉じる
    $mysqli->close();
    ?>

  </body>
</html>
