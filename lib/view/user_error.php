<?php require_once("../function/function.php"); ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>データ追加失敗</title>
    <link rel="stylesheet" href="../../css/m_style.css">
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

    このメールアドレスはすでに使用されているので、使用できません。<br><br>
    <a href="../../insert_user.php">新規登録画面</a><br>
  </body>
</html>
