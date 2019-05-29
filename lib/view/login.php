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
  <div class="back">
<header>
  <nav>
    <img src="image/titlelogo.png" height="90px">
    <ul>
      <li><a href="top.php" class="li_a">トップページ</a></li>
      <?php if (login_check()) { ?>
        <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？');" class="li_a">ログアウト</a></li>
        <li><a href="user.php?user_id=<?php ph($_SESSION["user_id"]); ?>" class="li_a">マイページ</a></li>
      <?php } else { ?>
      <li><a href="login.php" class="li_a">ログイン</a></li>
      <li><a href="insert_user.php" class="li_a">新規会員登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
  <h2>ログイン</h2>
  <form action="login.php" method="post" id="form_update">
    <span class="error"><?php ph($errorMessage, ENT_QUOTES); ?></span>
    <br>
    <table id="table_search">
      <tr>
        <th>メールアドレス</th>
          <td><input type="text" name="mail_address" class="update_user"></td>
      </tr>
      <tr>
        <th>パスワード</th>
          <td><input type="password" name="password" class="update_user"></td>
      </tr>
    </table>
    <br>
    <input type="submit" value="ログイン" class="right blue_button">
  </form>
  <br>
</div>
</body>
</html>
