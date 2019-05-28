<?php
require_once("../init.php");
//不正なアクセスを無効化
m_access_check_view();
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>管理トップページ</title>
    <link rel="stylesheet" href="../../css/m_style.css">
  </head>
  <body>
  <br>
    <header>
      <nav>
        <ul>
          <li><a class="current" href="m_top.php">トップページ</a></li>
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
    <div>
      <h1>管理トップページ</h1>
      <table>

        <tr><td class="d3"><a href="../../m_control/m_select_material.php">美術品一覧</a></td></tr>
        <tr><td class="d3"><a href="../../m_control/m_select_user.php">管理者一覧</a></td></tr>
        <tr><td class="d3"><a href="../../m_control/m_select_genre.php">ジャンル一覧</a></td></tr>
        <tr><td class="d3"><a href="../../m_control/m_select_closed.php">休館日一覧</a></td></tr>
        <tr><td class="d3"><a href="../../m_control/m_select_job.php">職種一覧</a></td></tr>
        <tr><td class="d3"><a href="../../top.php">美術館トップページへ戻る</a></td></tr>

      </table>
        <br>
        <br>
        <a href="../../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a>
    </div>
  </body>
</html>
