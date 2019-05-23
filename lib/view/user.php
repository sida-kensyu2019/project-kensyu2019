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
<title>ユーザマイページ</title>
</head>
<body>

<!-- ユーザ名表示 -->
<h2><?php ph($input["user_name"]); ?></h2>

<!-- アイコン・評価コメント数・いいね数・自己紹介コメント -->
<table border="1">
  <tr>
    <td>アイコン</td>
    <td rowspan="3"><?php ph($input["comment"]); ?></td>
  </tr>
  <tr>
    <td>コメント数<br>
        いいね数</td>
  </tr>
</table>

<!-- ユーザ本人がアクセスした場合のみ表示 -->
<a href="update_user.php">ユーザ情報を変更する</a><br>

<!-- 過去の評価コメント一覧 -->
過去の評価コメント<br>

<!-- 管理者がアクセスした場合のみ表示 -->
<input type="button" value="ユーザ削除" onclick="location.href='m_delete_exec_user.php'"><br>

<!-- ユーザ本人がアクセスした場合のみ表示 -->
<a href="delete_user.php">退会する</a>

</body>
</html>
