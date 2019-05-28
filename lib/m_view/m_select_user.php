<!DOCTYPE html>
<!--
 * 管理者一覧画面
 *
 * システム名：愛パワー美術品評価管理システム
 * 作成者：佐藤瑠菜
 * 作成日：2019/5/22
 * 最終更新日：
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
  -->
<html>
<head>
<meta charset="utf-8">
<title>管理者一覧画面</title>
<link rel="stylesheet" href="../css/m_style.css">
</head>
<body>
<br>
      <header>
        <nav>
          <ul>
            <li><a href="../lib/m_view/m_top.php">トップページ</a></li>
            <li><a href="m_select_material.php">美術品一覧</a></li>
            <li><a class="current" href="m_select_user.php">管理者一覧</a></li>
            <li><a href="m_select_genre.php">ジャンル一覧</a></li>
            <li><a href="m_select_job.php">職種一覧</a></li>
            <li><a href="m_select_closed.php">休館日一覧</a></li>
            <li><a href="../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
          </ul>
        </nav>
      </header>

<br>
<br>
<h1>管理者一覧</h1>

<table border="1">
  <tr>
    <th>ユーザID</th>
    <th>ユーザ名</th>
    <th class="d1">メールアドレス</th>
    <th>削除</th>
  </tr>
  <?php while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
  <tr>
    <td class="d5"><?php ph($row["user_id"]); ?></td>
    <td><?php ph($row["user_name"]); ?></td>
    <td><?php ph($row["mail_address"]); ?></td>
    <td><a href="m_delete_exec_user.php?user_id=<?php ph($row["user_id"]);?>">削除</td> <!-- 削除完了画面リンク -->
  </tr>
  <?php } ?>
</table>
<br>
<div>
<input type="button" value="新規追加" onclick="location.href='m_insert_user.php'">
<!-- 新規管理者登録画面に遷移 -->
</div>

</body>
</html>
