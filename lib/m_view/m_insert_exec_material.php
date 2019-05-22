<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>美術品登録完了画面</title>
</head>
<body>
<h1>美術品登録完了</h1>
<br>
<br>
<?php
//require_once("../init.php");
?>
<table>
  <tr><th>美術品名</th><th><?php// ph($_POST["material_name"]) ?></th></tr>
  <tr><th>美術品名読み</th><th><?php// ph($_POST["material_kana"]) ?></th></tr>
  <tr><th>作者名</th><th><?php// ph($_POST["author_name"]) ?></th></tr>
  <tr><th>作者名読み</th><th><?php// ph($_POST["author_kana"]) ?></th></tr>
  <tr><th>ジャンル</th><th><?php// ph($_POST["genre_id"]) ?></th></tr>
  <tr><th>制作年</th><th><?php// ph($_POST["material_name"]) ?></th></tr>
  <tr><th>写真</th><th><?php// ph($_POST["picture"]) ?></th></tr>
  <tr><th>説明</th><th><?php// ph($_POST["caption"]) ?></th></tr>
</table><br>
<br>
<br>
<br>
<p>上記の内容で美術品の登録が完了しました。<p>
<br>
</body>
<a href="m_insert_material.php">
<input type="button" value="美術品登録に戻る">
</a>
</html>
