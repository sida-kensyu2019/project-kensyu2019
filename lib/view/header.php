<?php //岩井：2019.5.24：Ver1.0 ユーザ共通画面 ?>
<!DOCTYPE html>
 <html>
     <head>
       <meta charset="UTF-8">
       <title>ヘッダー</title>
       <link rel="stylesheet" href="css/style.css">
       <script src=""></script>
     </head>
     <body>

     <header>
        <nav>
          <h1>愛パワー美術館</h1>
          <ul>
            <li><a href="top.php">トップページ</a></li>
            <li><a href="insert_user.php">新規登録</a></li>
            <li><a href="usr.php?user_id=<?php ph($_SESSION["user_id"]); ?>">マイページ</a></li>
            <li><a href="login.php">ログイン</a></li>
            <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？');">ログアウト</a></li>
          </ul>
        </nav>
      </header>

     </body>
 </html>
