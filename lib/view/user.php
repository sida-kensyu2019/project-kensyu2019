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
<link rel="stylesheet" href="css/style.css">
<title>ユーザマイページ</title>
</head>
<body>
<header>
  <nav>
    <h1>愛パワー美術館</h1>
    <ul>
      <li><a href="top.php">トップページ</a></li>
      <?php if (user_lv_check()) { ?>
        <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？');">ログアウト</a></li>
        <li><a href="user.php?user_id=<?php ph($_SESSION["user_id"]); ?>">マイページ</a></li>
      <?php } else { ?>
      <li><a href="login.php">ログイン</a></li>
      <li><a href="insert_user.php">新規登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>

<!-- ユーザ名表示 -->
<h1><?php ph($row["user_name"]); ?></h1>

<!-- アイコン・評価コメント数・いいね数・自己紹介コメント -->
<table border="1">
  <tr>
    <td>アイコン</td>
    <td rowspan="3"><?php ph($row["profile"]); ?></td>
  </tr>
  <tr>
    <td>コメント数<br>
        いいね数</td>
  </tr>
</table>

<?php if ($row["user_lv"] == 2) { ?>

<!-- ユーザ本人がアクセスした場合のみ表示 -->
<a href="update_user.php">ユーザ情報を変更する</a><br>

<?php } ?>
<br>

<!-- 過去の評価コメント一覧 -->
<h2>過去の評価コメント</h2>
  <table border="1">
      <tr>
        <th>美術品名</th>
        <th>作者名</th>
        <th>評価</th>
        <th>評価コメント</th>
      </tr>
      <?php while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
  			<td><a href = "material_detail.php?material_id=<?php ph($row["material_id"]); ?>"> <?php ph($row["material_name"]); ?> </a></td>
  			<td><?php ph($row["author_name"]); ?></td>
        <td><?php ph($row["star"]); ?></td>
  			<td><?php ph($row["comment"]); ?></td>
  		</tr>
      <?php } ?>
  </table>

<?php if ($row["user_lv"] == 1) { ?>

<!-- 管理者がアクセスした場合のみ表示 -->
<input type="button" value="ユーザ削除" onclick="location.href='m_control/m_delete_exec_user.php'"><br>

<?php } else { ?>

<!-- ユーザ本人がアクセスした場合のみ表示 -->
<a href="delete_user.php">退会する</a>

<?php } ?>

</body>
</html>
