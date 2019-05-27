<?php //作成者：山田 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理者登録完了画面</title>
<link rel="stylesheet" href="../css/m_style.css">
</head>
<body>
      <header>
        <nav>
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

<h1>登録完了</h1>
<br>
<p>管理者を登録しました。<p>
<br>
<br>
<br>
</body>
<a href="m_insert_user.php">
<input type="button" value="新規管理者登録に戻る">
</a>
</html>
