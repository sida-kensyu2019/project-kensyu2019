<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>データベース操作サンプル</title>
</head>
<body>
<h2>入力値確認</h2>

店名 <?php ph($_POST["ramen_name_kanji"]);?><br>
店名かな: <?php ph($_POST["ramen_name_kana"]);?><br>
味: 
<?php
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        if ($row["taste_id"] == $_POST["taste_id"]) {
            ph($row["taste_name"]);
        }
    }
?>
<br>
以上のラーメン店データを追加しますか？
<br>

<form action="insert_exec.php" method="post">
<input type="hidden" name="ramen_name_kanji" value="<?php ph($_POST["ramen_name_kanji"]);?>">
<input type="hidden" name="ramen_name_kana" value="<?php ph($_POST["ramen_name_kana"]);?>">
<input type="hidden" name="taste_id" value="<?php ph($_POST["taste_id"]);?>">
<input type="submit" value="追加">
<input type="button" value="戻る" onclick="history.back();">
</form>
</body>
</html>
