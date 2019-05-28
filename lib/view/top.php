<?php /*ユーザ美術館トップページ：村上：2019/05/23：Ver1.0
        最終更新日：2019/05/24：Ver1.1
        レビュー：
        */
?>

<!DOCTYPE HTML>
    <html>
        <head>
            <title>トップページ</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="css/style.css">
            <script src=""></script>
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
                  <?php if (user_lv_check()) { ?>
                    <li><a href="lib/m_view/m_top.html" class="li_a">管理者トップ</a></li>
                  <?php } ?>
              <?php } else { ?>
              <li><a href="login.php" class="li_a">ログイン</a></li>
              <li><a href="insert_user.php" class="li_a">新規登録</a></li>
              <?php } ?>
            </ul>
          </nav>
        </header>
        <article>
        <!--管理画面に不正なアクセスがあった場合、トップに遷移し、エラーメッセージ表示-->
        <script>
        <?php if (!(empty($_COOKIE["access_error"]))) { ?>
          alert("アクセス権がありません");
        <?php setcookie("access_error", "", time()-60, "/");
          } ?>
        </script>
            <div class="titleImg">
              <img src="image/test.jpg" name="title" width="500px">
              <img src="image/test.jpg" name="title" width="500px">
              <img src="image/museum1.png" width="500px">
              <!-- <img src="image/museum2.jpg" width="500px"> -->
              <img src="image/museum3.jpg" width="500px">
            </div>
            <div id="calendar">
              <table id="table_calendar">
                  <caption>
                     休館日カレンダー
                  </caption>
                  <tr>
                     <th class="th">日</th>
                     <th class="th">月</th>
                     <th class="th">火</th>
                     <th class="th">水</th>
                     <th class="th">木</th>
                     <th class="th">金</th>
                     <th class="th">土</th>
                  </tr>
                  <tr>
                     <?php
                         //二次元配列$calender,$closed_listの値を取り出し照合する繰り返し
                         $cnt = 0;
                        $year = date("Y");
                        $month = date("n");
                         foreach($calender as $value_day){
                           $closed_judge = true;
                            foreach($closed_list as $value_closed){
                                 $date = explode("-", $value_closed["closed"]);
                                 if ((int)$date[2] == $value_day["day"] AND (int)$date[0] == $year AND (int)$date[1] == $month) { ?>
                                   <td class="td">
                                     <?php $cnt++; ?>
                                     <?php print $value_day["day"]."<br>休館";
                                       $closed_judge = false;
                                       break; ?>
                                   </td>
                               <?php }
                            }
                                 if($closed_judge == true){ ?>
                                  <td class="td">
                                     <?php $cnt++; ?>
                                     <?php print $value_day["day"]; ?>
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
              <form action="select_material.php" method="post" id="search">
                <table id="table_search">
                <tr><th>美術品名</th><th><input type="text" size="30" name ="material_name"></th></tr>
                <tr><th>作者名</th><th><input type="text" size="30" name ="author_name"></th></tr>
                <tr><th>ジャンル</th>
                  <th>
                  <select name="genre_id" id="select_genre">
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
            <input type="reset" value="リセット">
          </form>
            <!-- 美術品TOP20 -->
            <table id="table_top">
              <caption><h2>TOP20</h2></caption>
              <tr>
                <th class="material_th" width="150px">画像</th>
                <th class="material_th">星</th>
                <th class="material_th" width="160px">作品名<br>作者名</th>
                <th class="material_th">評価TOPコメント</th>
                <th class="material_th" width="60px">詳細へ</th>
              </tr>
            <?php
                //平均評価の降順で20件ほどSELECT表示
                  $cnt == 0;
            	    foreach($rowTop as $topMaterial){ ?>
                    <?php $cnt++; ?>
                        <tr class="ml_tr">
                    			<td class="material">
                            <img src="<?php ph($topMaterial["picture"]); ?>" class="img_material">
                          </td>
                          <td class="material">
                            <?php
                              ph(round($topMaterial["AVG(star)"], 1));
                            ?>
                          </td>
                    			<td class="material"><?php ph($topMaterial["material_name"]); ?>
                    			<br><?php ph($topMaterial["author_name"]); ?></td>
                          <td class="material"><span class="comment"><?php ph($topMaterial["comment"]); ?></span></td>
                          <td class="material"><a href="material_detail.php?material_id=<?php ph($topMaterial["material_id"]); ?>">詳細</a></td>
                    		</tr>
                      <?php if ($cnt == 20){
                        break;
                      } ?>
            <?php } ?>
            </table>
            <a href="#search">条件を絞り込む</a>
          </div>
          </article>
        </body>
    </html>
