<?php /*ユーザ美術館トップページ：村上：2019/05/23：Ver1.0
        最終更新日：
        レビュー： 
        */
?>

<!DOCTYPE HTML>
    <html>
        <head>
            <title></title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="pass">
            <script src=""></script>
        </head>
        <body>
          　<!--ヘッダメニュー（タイトルロゴとログイン／マイページリンク）-->
            <div id="header">
              <img src="ロゴ画像とかあるといいなぁ" name="logo">
              <?php if(empty($_SESSION)){ ?>
                  <a href="login.php" id="loginOrMypage">ログイン</a>
              } else { ?>
                  <a href="user.php" id="loginOrMypage">マイページ</a>
              <?php } ?>
            </div>
            <!--なんかいい感じの画像-->
            <img src="なんかいい感じの画像" name="title">
            <!--カレンダー-->

            <!--検索ボックス-->
            <table id="search">
              <form action="select_material.php" method="post">
                <tr><th>美術品名</th><th><input type="text" size="30" name ="material_name"></th></tr>
                <tr><th>作者名</th><th><input type="text" size="30" name ="author_name"></th></tr>
                <tr><th>ジャンル</th>
                  <th>
                  <select name="genre_id">
                    <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
                      <option value="<?php ph($row["genre_id"]); ?>"><?php ph($row["genre_name"]) ?></option>
                    <?php } ?>
                  </select>
                  </th>
                </tr>
                <tr><th>制作年</th><th><input type="text" size="30" name ="material_year"></th></tr>
                <input type="submit" name="検索">
                <input type="reset" name="クリア">
              </form>
            </table>
            <!-- 美術品TOP20 -->
            <h2>美術品検索結果</h2>
            <?php require_once("../init.php");
                //平均評価の降順で20件ほどSELECT表示
            	    while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
                    <table>
                        <tr>
                          <th>画像</th>
                          <th>美術品名</th>
                          <th>作者名</th>
                          <th>ジャンル</th>
                          <th>制作年</th>
                        </tr>
                        <tr>
                    			<td><?php ph($row["picture"]); ?></td>
                    			<td><?php ph($row["material_name"]); ?></td>
                    			<td><?php ph($row["author_name"]); ?></td>
                    			<td><?php ph($row["genre_name"]); ?></td>
                    			<td><?php ph($row["material_year"]); ?></td>
                    		</tr>
                    </table>
            <?php } ?>
            <a href="#search">条件を絞り込む</a>
        </body>
    </html>
