<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>データベース操作サンプル</title>
</head>
<body>
<!--このファイルはrequire_once()でしか使われない。ファイルパスはコントローラーと同じ-->
<form action="select.php" method="post">
    <select name="key_taste_id">
        <option  value="">すべての味</option>
        <?php while ($row_taste = $sth_taste->fetch(PDO::FETCH_ASSOC)) {?>
            <option <?php if (isset($_POST["key_taste_id"]) and ($row_taste["taste_id"] == $_POST["key_taste_id"])) {print "selected";} ?> 
            value="<?php ph($row_taste["taste_id"]);?>">
                <?php ph($row_taste["taste_name"]);?>
            </option>
        <?php } ?>
    </select>
    <!--検索ワードの埋め込みは、三項演算子でシンプルに-->
    <input type="text" name="keyword" value="<?php ph(isset($_POST["keyword"]) ? $_POST["keyword"] : "");?>">
    <input type="submit" value="検索">
</form>
<table border="1">
    <tr>
        <th>店名</th>
        <th>店名かな</th>
        <th>味</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    <?php while ($row_ramen = $sth_ramen->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php ph($row_ramen["ramen_name_kanji"]);?></td>
        <td><?php ph($row_ramen["ramen_name_kana"]);?></td>
        <td><?php ph($row_ramen["taste_name"]);?></td>
        <!--このファイルはrequire_once()でしか使われない。ファイルパスはコントローラーと同じ-->
        <td><a href="update.php?ramen_id=<?php ph($row_ramen["ramen_id"]);?>">編集</a></td>
        <td><a href="delete_exec.php?ramen_id=<?php ph($row_ramen["ramen_id"]);?>" onclick="return window.confirm('本当に削除しますか？');">削除</a></td>
    </tr>
    <?php } ?>
</table>
<br>
<!--このファイルはrequire_once()でしか使われない。ファイルパスはコントローラーと同じ-->
<a href="insert.php">新規追加</a>
<?php print $button; ?>
</body>
</html>
