<!DOCTYPE html>
<!--
 * 美術品評価書込入力確認画面
 *
 * システム名：愛パワー美術品評価管理システム
 * 作成者：佐藤瑠菜
 * 作成日：2019/5/23
 * 最終更新日：
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
  -->
<?php require_once("lib/init.php"); ?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<title>美術品評価書込入力確認画面</title>
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
<h2>以下の内容で書き込みますか？</h2>
<form action="insert_exec_grade.php" method="post">
評価
    <?php ph($_POST["star"]); ?>
    <br>
    <?php //五段階評価それぞれで表示する画像変更
        switch($_POST["star"]){
          case "0":
          $starImg = "image/star_0.png";
          break;
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
     <img src="<?php ph($starImg); ?>" height="15px">
    <br>
    <br>

評価コメント<br>
<?php ph($_POST["comment"]); ?><br>

<br>

<!-- 評価を登録 -->
<input type="hidden" value="<?php ph($_POST["material_id"]); ?>" name="material_id">
<input type="hidden" value="<?php ph($_POST["user_id"]); ?>" name="user_id">
<input type="hidden" value="<?php ph($_POST["grade_date"]); ?>" name="grade_date">
<input type="hidden" value="<?php ph($_POST["star"]); ?>" name="star">
<input type="hidden" value="<?php ph($_POST["comment"]); ?>" name="comment">
<input type="submit" value= "送信">

<!-- 美術品評価書込画面に戻る -->
<input type="button" value="訂正" onclick="window.history.back();">

</form>
<br>
</div>
</body>
</html>
