 <!-- * このファイルの概要説明
 ログイン画面
 このファイルの詳細説明
 非ログインユーザが、管理者、ログインユーザとしての操作権限を得るためにログインする機能
 システム名：愛パワー美術品評価管理システム
 作成者：山田美波、増井裕也
 作成日：2019/05/22 ~ 05/23
 最終更新日：2019/05/23
 レビュー担当者：
 レビュー日：
 バージョン：0.1 -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="css/style.css">
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

  <form action="login.php" method="post">
    メールアドレス:
      <input type="text" name="mail_address"><br>
    パスワード:
      <input type="password" name="password"><br>
  <?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?>
      <input type="submit" value="ログイン"><br>
  </form>
</body>
</html>
