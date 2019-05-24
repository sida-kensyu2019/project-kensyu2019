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
            <link rel="stylesheet" src="pass">
            <script href="pass"></script>
            </head>
        <body>
            <h2>美術品詳細</h2>

            <?php
            $row1 = $sth_material->fetch(PDO::FETCH_ASSOC);// 該当美術品データを配列にして取得
            ?>

            <div id="material_name">
              <?php print h($row1["material_name"])."(".h($row1["material_name"]).")"; ?>
            </div>
            <div id="material_img">
              <img src="<?php ph($row1["picture"]); ?>" name="" width="" height="">
            </div>
            <div id="material_text">
              <p id="material_overview">
                <?php
                  $overview = $row1["author_name"]."(".$row1["author_kana"].")/";
                  $overview .=$row1["material_year"]."/".$row1["genre_name"];
                  ph($overview);
                ?>
              </p>
              <br>
              <p><?php ph($row1["caption"]); ?></p>
            </div>
            <div id="material_control"></div>
            <!--↑美術品詳細↑-->

            <!--↓美術品に対する評価↓-->
            <h3><?php print $count["COUNT(*)"]; ?>件の評価</h3>
            <a href="insert_grade.php?id=<?php $row1["material_id"]; ?>">
              評価を書き込む
            </a>
            <?php //評価テーブル・ユーザテーブル内部連結を配列$rowに格納
            while($row2=$sth_grade->fetch(PDO::FETCH_ASSOC)){  ?>
              <div class="grade">
                  <span class="user_name"><?php ph($row2["user_name"]); ?>さんの評価</span>
                  <?php //五段階評価それぞれで表示する画像変更
                      switch($row2["star"]){
                        case "1":
                        $starImg = "pass";
                        break;
                        case "2":
                        $starImg = "pass";
                        break;
                        case "3":
                        $starImg = "pass";
                        break;
                        case "4":
                        $starImg = "pass";
                        break;
                        case "5":
                        $starImg = "pass";
                        break;
                      }
                   ?>
                  <img src="<?php ph($starImg); ?>" name="star" width="" height="" class="star">
                  <div class="comment">
                    <?php ph($row2["comment"]); ?>
                  </div>
                  <span class="grade_date"><?php ph($row2["grade_date"]); ?></span>
                  <form action="material_detail.php" method="post" class="good">
                    <input type="hidden" value="<?php ph($row2["user_name"]); ?>" name="good">
                    <input type="hidden" value="<?php ph($row2["grade_id"]); ?>" name="good">
                    <input type="submit" value="いいね">
                  </form>
                  <?php ph($row2["cnt"]); ?>
                  <?php
                  if ($_SESSION["user_id"]) {
                    if($row2["user_id"] == $_SESSION["user_id"]){ ?>
                      <a href="material_detail.php?id=<?php ph($row["material_id"]);?>" onclick="return window.confirm('本当に削除しますか？')">削除</a>
                    <?php } ?>
                  <?php } ?>

              </div>
              <br>
            <?php } ?>

        </body>
    </html>
