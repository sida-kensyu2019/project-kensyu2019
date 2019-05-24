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
</head>
<body>
  <form action="login.php" method="post">
    メールアドレス:
      <input type="text" name="mail_address"><br>
    パスワード:
      <input type="password" name="password"><br>
  <?php print $errorMessage; ?>
      <input type="submit" value="ログイン"><br>
  </form>
</body>
</html>
