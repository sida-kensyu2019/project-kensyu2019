<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>美術品登録完了画面</title>
<link rel="stylesheet" href="../css/m_style.css">
</head>
<body>
      <header>
        <nav>
          <h1>管理者画面</h1>
          <ul>
            <li><a href="../lib/m_view/m_top.html">トップページ</a></li>
            <li><a href="m_select_material.php">美術品一覧</a></li>
            <li><a href="m_select_user.php">管理者一覧</a></li>
            <li><a href="m_select_genre.php">ジャンル一覧</a></li>
            <li><a href="m_select_job.php">職種一覧</a></li>
            <li><a href="m_select_closed.php">休館日一覧</a></li>
            <li><a href="../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
          </ul>
        </nav>
      </header>

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
