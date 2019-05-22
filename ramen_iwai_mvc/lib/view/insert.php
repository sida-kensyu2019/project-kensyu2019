<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>データベース操作サンプル</title>
</head>
<body>
    
<form action="insert.php" method="post">
店名 <input type="text" name="ramen_name_kanji"><br>
店名かな: <input type="text" name="ramen_name_kana"><br>
味: <select name="taste_id">
        <option disabled selected>選択してください</option>
        <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php ph($row["taste_id"]);?>"><?php ph($row["taste_name"]);?></option>
        <?php } ?>
    </select>
<br>
<br>
<input type="submit">
<input type="button" value="戻る" onclick="history.back();">
</form>

<?php print $message; ?>
</body>
</html>
