<!DOCTYPE html>
<!--
 * 管理者一覧画面
 *
 * システム名：愛パワー美術品評価管理システム
 * 作成者：村上菜々
 * 作成日：2019/5/23
 * 最終更新日：2019/5/24
 * レビュー担当者：
 * レビュー日：
 * バージョン：1.1
  -->
    <html>
        <head>
            <meta charset="utf-8">
            <title>美術品詳細</title>
            <link rel="stylesheet" href="css/style.css">
            <script href="pass"></script>
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

            <h2>美術品詳細</h2>

            <div id="material_name"> <!--美術品名表示-->
              <?php print h($sth_material["material_name"])."(".h($sth_material["material_name"]).")"; ?>
            </div>
            <div id="material_img"> <!--画像表示-->
              <img src="<?php ph($sth_material["picture"]); ?>" name="" width="" height="">
            </div>
            <div id="material_text"> <!--詳細コメント表示-->
              <p id="material_overview">
                <?php
                  $overview = $sth_material["author_name"]."(".$sth_material["author_kana"].")/";
                  $overview .= $sth_material["material_year"]."/".$sth_material["genre_name"];
                  ph($overview);
                ?>
              </p>
              <br>
              <p><?php ph($sth_material["caption"]); ?></p>
            </div>
            <div id="material_control"></div>
            <!--↑美術品詳細↑-->

            <!--↓美術品に対する評価↓-->
            <h3><?php ph($count["COUNT(*)"]); ?>件の評価</h3>
            <?php if (login_check()) { ?>
              <a href="insert_grade.php?material_id=<?php ph($sth_material["material_id"]); ?>">評価を書き込む</a>
            <?php } ?>
            <?php //評価テーブル・ユーザテーブル内部連結を配列$rowに格納
            while($row2=$sth_grade->fetch(PDO::FETCH_ASSOC)){  ?>
              <div class="grade">
                  <span class="user_name"> <!--評価したユーザの名前表示-->
                    <a href="user.php?user_id=<?php ph($row2["user_id"]); ?>">
                    <?php ph($row2["user_name"]); ?></a>さんの評価
                  </span>
                  <?php //五段階評価それぞれで表示する画像変更
                      switch($row2["star"]){
                        case "NULL":
                        $starImg = "image/star_0.png";
                        case "1":
                        $starImg = "image/star_1.png";
                        break;
                        case "2":
                        $starImg = "image/star_2.png";
                        break;
                        case "3":
                        $starImg = "image/star_3.png";
                        break;
                        case "4":
                        $starImg = "image/star_4.png";
                        break;
                        case "5":
                        $starImg = "image/star_5.png";
                        break;
                      }
                   ?>
                  <img src="<?php ph($starImg); ?>" name="star" width="" height="12px" class="star"> <!--評価の星表示-->
                  <div class="comment"> <!--評価コメント表示-->
                    <?php ph($row2["comment"]); ?>
                  </div>
                  <span class="grade_date"><?php ph($row2["grade_date"]); ?></span>
                <?php if (login_check()) { ?>
                  <form action="insert_exec_good.php" method="post" class="good">
                    <input type="hidden" value="<?php ph($row2["grade_id"]); ?>" name="grade_id">
                    <input type="hidden" value="<?php ph($row2["material_id"]); ?>" name="material_id">
                    <?php $no_good=true; 
                    foreach ($row_goodList as $row_good) {
                      if ($row_good["grade_id"] == $row2["grade_id"]) { ?>
                        <!-- いいね済み -->
                        <input type="image" src="image/good.png" width="50" value="いいね" name="good">
                        <?php $no_good = false;
                      }
                    }
                    if ($no_good) { ?>
                      <!-- 未いいね -->
                      <input type="image" src="image/nogood.png" width="50" value="未いいね" name="good">
                    <?php } ?>
                  </form>
                <?php
                if($row2["user_id"] == $_SESSION["user_id"] || user_lv_check()){ ?>
                    <a href="delete_exec_grade.php?grade_id=<?php ph($row2["grade_id"]);?>&material_id=<?php ph($row2["material_id"]);?>"
                    onclick="return window.confirm('本当に削除しますか？')">削除</a>
                  <?php }
                } ?>

              </div>
              <br>
            <?php } ?>

        </body>
    </html>
