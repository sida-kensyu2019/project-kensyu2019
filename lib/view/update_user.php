<!DOCTYPE html>
<!--
 * 管理者一覧画面
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
<title>ユーザ情報変更画面</title>
</head>
<body>
<h2>ユーザ情報変更画面</h2>

<table>
  <form action="update_check_user.php" method="post">
    <tr><th>メールアドレス</th><th> <?php ph($_POST["mail_address"]) ?>/th></tr>
    <tr><th>パスワード</th><th><input type="text" size="30" name ="password"></th></tr>
    <tr><th>表示名</th><th><input type="text" size="30" name ="user_name"></th></tr>
    <tr><th>職業</th>
      <th>
      <select name="job_id">
        <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?php ph($row["job_id"]); ?>"><?php ph($row["job_name"]) ?></option>
        <?php } ?>
      </select>
      </th>
    </tr>
    <input type="submit" name="変更">
    <input type="reset" name="クリア">
    <br>
    <a href="user.php">マイページに戻る</a>
  </form>
</table>

</body>
</html>
