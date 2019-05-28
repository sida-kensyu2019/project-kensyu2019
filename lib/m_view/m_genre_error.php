<?php
require_once("../init.php");
//不正なアクセスを無効化
m_access_check_view();
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>データ追加失敗</title>
    <link rel="stylesheet" href="../../css/m_style.css">
  </head>
  <body>
  <br>
    <header>
      <nav>
        <ul>
          <li><a href="m_top.php">トップページ</a></li>
          <li><a href="../../m_control/m_select_material.php">美術品一覧</a></li>
          <li><a href="../../m_control/m_select_user.php">管理者一覧</a></li>
          <li><a href="../../m_control/m_select_genre.php">ジャンル一覧</a></li>
          <li><a href="../../m_control/m_select_job.php">職種一覧</a></li>
          <li><a href="../../m_control/m_select_closed.php">休館日一覧</a></li>
          <li><a href="../../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
        </ul>
      </nav>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div>
    このジャンルはすでに使用されているので、削除できません。<br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a href="../../m_control/m_select_genre.php">ジャンル一覧</a><br>
  </div>
  </body>
</html>
