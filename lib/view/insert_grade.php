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
<br>
<h3>美術品に対する評価を書き込んでください</h3>
<form action="insert_grade.php?material_id=<?php ph($_GET["material_id"]); ?>" method="post">
評価
    <label><input type="radio" name="star" value="0" checked="checked">0</label>
    <label><input type="radio" name="star" value="1">1</label>
    <label><input type="radio" name="star" value="2">2</label>
    <label><input type="radio" name="star" value="3">3</label>
    <label><input type="radio" name="star" value="4">4</label>
    <label><input type="radio" name="star" value="5">5</label>
    <br>
    <br>

評価コメント<br>
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
<br>
</div>
</body>
</html>
