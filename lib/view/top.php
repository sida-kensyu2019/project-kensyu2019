<?php /*ユーザ美術館トップページ：村上：2019/05/23：Ver1.0
        最終更新日：2019/05/24：Ver1.1
        レビュー：
        */
?>

<!DOCTYPE HTML>
    <html>
        <head>
            <title></title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="css/style.css">
            <script src=""></script>
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
                  <?php if (user_lv_check()) { ?>
                    <li><a href="lib/m_view/m_top.html">管理者トップ</a></li>
                  <?php } ?>
              <?php } else { ?>
              <li><a href="login.php">ログイン</a></li>
              <li><a href="insert_user.php">新規登録</a></li>
              <?php } ?>
            </ul>
          </nav>
        </header>
        
        <!--管理画面に不正なアクセスがあった場合、トップに遷移し、エラーメッセージ表示-->
        <script>
        <?php if (!(empty($_COOKIE["access_error"]))) { ?>
          alert("アクセス権がありません");
        <?php setcookie("access_error", "", time()-60, "/");
          } ?>
        </script>

            <div id="titleCalender">
            <!--なんかいい感じの画像-->
              <img src="なんかいい感じの画像" name="title">
            <!--カレンダーを表示したい-->
              <table>
                  <caption>
                     休館日カレンダー
                  </caption>
                  <tr>
                     <th>日</th>
                     <th>月</th>
                     <th>火</th>
                     <th>水</th>
                     <th>木</th>
                     <th>金</th>
                     <th>土</th>
                  </tr>
                  <tr>
                     <?php
                         //二次元配列$calender,$closed_listの値を取り出し照合する繰り返し
                         $cnt = 0;
                        $year = date("Y");
                        $month = date("n");
                         foreach($calender as $value_day){
                            foreach($closed_list as $value_closed){
                                 $date = explode("-", $value_closed["closed"]);
                                 if ((int)$date[2] == $value_day["day"] AND (int)$date[0] == $year AND (int)$date[1] == $month) { ?>
                                   <td>
                                     <?php $cnt++; ?>
                                     <?php print $value_day["day"]."<br>休館日";
                                       $closed_judge = true;
                                       break; ?>
                                   </td>
                               <?php }
                            }
                                 if($closed_judge = true){ ?>
                                  <td>
                                     <?php $cnt++; ?>
                                     <?php print $value_day["day"]; ?>
                                     <?php $closed_judge = false; ?>
                                  </td>
                                <?php } ?>

                           <?php if ($cnt == 7) { ?>
                                 </tr>
                                 <tr>
                                 <?php $cnt = 0;
                                 }
                         }  ?>
                  </tr>
              </table>
            </div>
            <!--検索ボックス-->
            <table id="search">
              <form action="select_material.php" method="post">
                <tr><th>美術品名</th><th><input type="text" size="30" name ="material_name"></th></tr>
                <tr><th>作者名</th><th><input type="text" size="30" name ="author_name"></th></tr>
                <tr><th>ジャンル</th>
                  <th>
                  <select name="genre_id">
                    <option value="" selected disabled>選択してください</option>
                    <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
                      <option value="<?php ph($row["genre_id"]); ?>"><?php ph($row["genre_name"]) ?></option>
                    <?php } ?>
                  </select>
                  </th>
                </tr>
                <tr><th>制作年</th><th><input type="text" size="30" name ="material_year"></th></tr>
            </table>
            <input type="submit" value="検索">
            <input type="reset" value="クリア">
          </form>
            <!-- 美術品TOP20 -->
            <?php
                //平均評価の降順で20件ほどSELECT表示
                  $cnt == 0;
            	    foreach($rowTop as $topMaterial){ ?>
                    <?php $cnt++; ?>
                    <table>
                        <tr>
                    			<td>
                            <img src="<?php ph($topMaterial["picture"]); ?>">
                          </td>
                          <td><?php ph($topMaterial["AVG(star)"]); ?></td>
                    			<td><?php ph($topMaterial["material_name"]); ?>
                    			<br><?php ph($topMaterial["author_name"]); ?></td>
                          <td><?php ph($topMaterial["comment"]); ?></td>
                          <td><a href="material_detail.php?material_id=<?php ph($topMaterial["material_id"]); ?>" target="_blank">詳細</a></td>
                    		</tr>
                    </table>
                      <?php if ($cnt == 20){
                        break;
                      } ?>
            <?php } ?>
            <a href="#search">条件を絞り込む</a>
        </body>
    </html>
