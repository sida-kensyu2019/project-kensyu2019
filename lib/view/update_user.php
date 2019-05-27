<!DOCTYPE html>
<!--
 * 管理者一覧画面
 *
 * システム名：愛パワー美術品評価管理システム
 * 作成者：佐藤瑠菜
 * 作成日：2019/5/23
 * 最終更新日：
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
  -->
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<title>ユーザ情報変更画面</title>
</head>
<body>
<header>
  <nav>
    <h1>愛パワー美術館</h1>
    <ul>
      <li><a href="top.php">トップページ</a></li>
      <?php if (login_check()) { ?>
        <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？');">ログアウト</a></li>
        <li><a href="user.php?user_id=<?php ph($_SESSION["user_id"]); ?>">マイページ</a></li>
      <?php } else { ?>
      <li><a href="login.php">ログイン</a></li>
      <li><a href="insert_user.php">新規登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<h2>ユーザ情報変更画面</h2>

<table>
  <form action="update_user.php" method="post">
    <tr><th>メールアドレス</th><th> <?php ph($_POST["mail_address"]) ?>/th></tr>
    <tr><th>パスワード</th><th><input type="text" size="30" name ="password"></th></tr>
    <tr><th>表示名</th><th><input type="text" size="30" name ="user_name"></th></tr>
    <tr><th>職業</th>
      <th>
      <select name="job_id">
        <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?php ph($row["job_id"]); ?>"><?php ph($row["job_name"]) ?></option>
        <?php } ?>
      </select>
      </th>
    </tr>
    <tr><th>
    <input type="submit" name="変更">
    <input type="reset" name="クリア">
  </tr></th>
    <br>
  </form>
</table>
<a href="user.php">マイページに戻る</a>

</body>
</html>
