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
<html>
<head>
<meta charset="utf-8">
<title>美術品評価書込入力確認画面</title>
</head>
<body>

<?php //require_once("../init.php"); ?>

<h2>美術品評価確認画面</h2>
<form action="insert_check_grade.php" method="post">
評価
    <?php ph($_POST["star"]); ?>
    <br>
    <br>

評価の詳細<br>
<?php ph($_POST["comment"]); ?><br>

<!-- 評価を登録 -->
<input type="submit" value= "送信" onclick="location.href='material_detail.php'">

<!-- 美術品評価書込画面に戻る -->
<input type="button" value="訂正" onclick="location.href='insert_grade.php'">

</form>
</body>
</html>
