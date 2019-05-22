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
<title>管理者一覧画面</title>
</head>
<body>
<h2>管理者一覧画面</h2>

<?php require_once("../init.php");
while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>

<table border="1">
  <tr>
    <th>ユーザID</th>
    <th><ユーザ名</th>
    <th>メールアドレス</th>
    <th>削除</th>
  </tr>
  <tr>
    <td><?php ph($row["user_id"]); ?></td>
    <td><?php ph($row["user_name"]); ?></td>
    <td><?php ph($row["mail_address"]); ?></td>
    <td><a href="m_delete_exec_user.php">削除</td> <!-- 削除完了画面リンク -->
  </tr>
</table>

<input type="button" value="新規追加" onclick="location.href='m_insert_user.php'">
<!-- 新規管理者登録画面に遷移 -->

</body>
</html>
