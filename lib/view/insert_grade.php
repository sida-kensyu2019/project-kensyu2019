<!DOCTYPE html>
<!--
 * 美術品評価書込画面
 *
 * システム名：愛パワー美術品評価管理システム
 * 作成者：佐藤瑠菜
 * 作成日：2019/5/23
 * 最終更新日：
 * レビュー担当者：
 * レビュー日：
 * バージョン：0.1
  -->
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<title>美術品評価書込画面</title>
</head>
<body>
  <div class="back">
<header>
  <nav>
    <h1>愛パワー美術館</h1>
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
<h2>美術品評価</h2>
<form action="insert_grade.php" method="post">
評価
    <input type="radio" name="star" value="0" checked="checked">0
    <input type="radio" name="star" value="1">1
    <input type="radio" name="star" value="2">2
    <input type="radio" name="star" value="3">3
    <input type="radio" name="star" value="4">4
    <input type="radio" name="star" value="5">5
    <br>
    <br>

評価の詳細<br>
<textarea cols="100" rows="10" name="comment"></textarea><br>

<!-- 評価を登録 -->
<input type="hidden" value="<?php ph($_GET["material_id"]); ?>" name="material_id">
<input type="hidden" value="<?php ph($_SESSION["user_id"]); ?>" name="user_id">
<input type="hidden" value="<?php ph(date("Y-m-d H:i:s")); ?>" name="grade_date">
<input type="submit" value= "登録">

<!-- 美術品詳細画面に戻る -->
<input type="button" value="キャンセル"
       onclick="location.href='material_detail.php?material_id=<?php ph($_GET["material_id"]); ?>'">

</form>
</div>
</body>
</html>
