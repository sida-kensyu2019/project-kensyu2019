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
            <li><a href="../lib/m_view/m_top.html">トップページ</a></li>
            <li><a href="m_select_material.php">美術品一覧</a></li>
            <li><a href="m_select_user.php">管理者一覧</a></li>
            <li><a href="m_select_genre.php">ジャンル一覧</a></li>
            <li><a href="m_select_job.php">職種一覧</a></li>
            <li><a href="m_select_closed.php">休館日一覧</a></li>
            <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
          </ul>
        </nav>
      </header>

     </body>
 </html>
