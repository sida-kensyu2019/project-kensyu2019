<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>データベース操作サンプル</title>
</head>
<body>
<h2>変更確認</h2>

変更するレコード　ID： <?php ph($_POST["ramen_id"]);?><br>
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
以上のラーメン店データに変更しますか？
<br>

<form action="update_exec.php" method="post">
<input type="hidden" name="ramen_id" value="<?php ph($_POST["ramen_id"]);?>">
<input type="hidden" name="ramen_name_kanji" value="<?php ph($_POST["ramen_name_kanji"]);?>">
<input type="hidden" name="ramen_name_kana" value="<?php ph($_POST["ramen_name_kana"]);?>">
<input type="hidden" name="taste_id" value="<?php ph($_POST["taste_id"]);?>">
<input type="submit" value="変更">
<input type="button" value="戻る" onclick="history.back();">
</form>
</body>
</html>
