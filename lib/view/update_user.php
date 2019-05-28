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
<link rel="stylesheet" href="css/style.css">
<title>ユーザ情報変更画面</title>
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
      <li><a href="insert_user.php" class="li_a">新規登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<h2>ユーザ情報変更画面</h2>
<form action="update_user.php?user_id=<?php ph($_GET["user_id"]); ?>" method="post" id="form_update">
  <?php ph($msg); ?>
  <table id="table_search">
    <tr><th>メールアドレス</th><td><?php ph($sth["mail_address"]) ?></td></tr>
    <tr><th>パスワード</th>
      <td>
        <input type="password" size="30" name ="password" class="update_user" value="<?php ph($sth["password"]) ?>">
      </td>
    </tr>
    <tr><th>表示名</th>
      <td>
        <input type="text" size="30" name ="user_name" class="update_user" value="<?php ph($sth["user_name"]) ?>">
      </td>
    </tr>
    <tr><th>職業</th>
      <td>
      <select name="job_id" class="update_user2">
        <?php while ($row = $sth_job->fetch(PDO::FETCH_ASSOC)) { ?>
          <option <?php if ($row["job_id"]==$sth["job_id"]) {print "selected";}?>
          value="<?php ph($row["job_id"]); ?>"><?php ph($row["job_name"]) ?></option>
        <?php } ?>
      </select>
      </td>
    </tr>
    <tr>
      <th>プロフィールコメント</th>
      <td>
        <textarea cols="32" rows="5" name="profile" class="update_user3"><?php ph(isset($sth["profile"]) ? $sth["profile"] : "よろしくお願いします。");?>
        </textarea>
      </td>
    </tr>
    <input type="hidden" name="user_id" value="<?php ph($_SESSION["user_id"]); ?>">
    <input type="hidden" name="mail_address" value="<?php ph($sth["mail_address"]); ?>">
  </table>
  <div class="right">
    <input type="submit" value="変更">
    <input type="reset" value="クリア">
  </div>
</form>
<br>
<a href="user.php?user_id=<?php ph($_SESSION["user_id"]); ?>">マイページに戻る</a>
<br>
<br>
</div>
</body>
</html>
