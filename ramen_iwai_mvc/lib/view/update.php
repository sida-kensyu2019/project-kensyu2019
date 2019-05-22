<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>データベース操作サンプル</title>
</head>
<body>
<form action="update.php?ramen_id=<?php ph($row_ramen["ramen_id"]);?>.php" method="post">
店名: <input type="text" name="ramen_name_kanji"     value="<?php ph($row_ramen["ramen_name_kanji"]);?>"><br>
店名かな: <input type="text" name="ramen_name_kana"     value="<?php ph($row_ramen["ramen_name_kana"]);?>"><br>
味: <select name="taste_id">
    <?php while ($row_taste = $sth->fetch(PDO::FETCH_ASSOC)) {?>
        <option <?php if ($row_taste["taste_id"] == $row_ramen["taste_id"]) {print "selected";} ?> 
        value="<?php ph($row_taste["taste_id"]);?>">
            <?php ph($row_taste["taste_name"]);?>
        </option>
    <?php } ?>
    </select>
    <br><br>
<input type="hidden" name="ramen_id" value="<?php ph($row_ramen["ramen_id"]);?>">
<input type="submit">
<input type="button" value="戻る" onclick="history.back();">
</form>
<?php print $message; ?>
</body>
</html>