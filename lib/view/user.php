<!DOCTYPE html>
<!--
 * 管理者一覧画面
 *
 * システム名：愛パワー美術品評価管理システム
 * 作成者：佐藤瑠菜
 * 作成日：2019/5/22
 * 最終更新日：
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
  -->
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/style.css" />
    <title>ユーザマイページ</title>
  </head>
  <body>
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
          <li><a href="insert_user.php" class="li_a">新規登録</a></li>
          <?php } ?>
        </ul>
      </nav>
    </header>

    <!-- ユーザ名表示 -->
    <h1><?php ph($row["user_name"]); ?>さんのページ</h1>

    <!-- アイコン・評価コメント数・いいね数・自己紹介コメント -->
    <table id="user">
      <tr>
        <td class="user" width="150px">
          <img src="image/india_main.jpg" width="150px" height="150px">
        </td>
        <td rowspan="3" class="user"><?php ph($row["profile"]); ?></td>
      </tr>
      <tr>
        <td class="user">
            コメント(<?php ph($gradeCnt); ?>)<br>
            いいね(<?php ph($goodCnt); ?>)
        </td>
      </tr>
    </table>
      <!-- ユーザ本人がアクセスした場合のみ表示 -->
    <?php if ($_SESSION["user_id"] == $_GET["user_id"] ) { ?>
        <a href="update_user.php?user_id=<?php ph($_SESSION["user_id"]) ?>" class="menu">ユーザ情報を変更する</a><br>
    <?php } ?>
    <br>

    <!-- 過去の評価コメント一覧 -->
    <h2>過去の評価コメント</h2>
      <table>
          <tr>
            <th>美術品名</th>
            <th>作者名</th>
            <th>評価</th>
            <th>評価コメント</th>
          </tr>
          <?php while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
          <tr>
      			<td><a href = "material_detail.php?material_id=<?php ph($row["material_id"]); ?>"> <?php ph($row["material_name"]); ?> </a></td>
      			<td><?php ph($row["author_name"]); ?></td>
            <td width="60px"><?php //五段階評価それぞれで表示する画像変更
                switch($row["star"]){
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
            <img src="<?php ph($starImg); ?>" name="star" width="" height="12px" class="star"> <!--評価の星表示--></td>
      			<td><?php ph($row["comment"]); ?></td>
      		</tr>
          <?php } ?>
      </table>

    <?php if ($_SESSION["user_lv"] == 1) { ?>

    <!-- 管理者がアクセスした場合のみ表示 -->
    <input type="button" value="ユーザ削除"
    onclick="location.href='m_control/m_delete_exec_user.php?user_id=<?php ph($_GET["user_id"]); ?>'">

    <?php } ?>

    <?php if ($_SESSION["user_id"] == $_GET["user_id"] ) { ?>

    <!-- ユーザ本人がアクセスした場合のみ表示 -->
    <form action="delete_user.php" method="post">
      <!-- <input type="hidden" name="user_id" value="<?php ph($_SESSION["user_id"]); ?>"> -->
    </form>
    <a href="delete_user.php">退会する</a>

    <?php } ?>

  </body>
</html>
