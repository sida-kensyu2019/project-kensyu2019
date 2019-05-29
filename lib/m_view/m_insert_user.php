<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新規管理者登録画面</title>
    <link rel="stylesheet" href="../css/m_style.css">
  </head>
  <body>
  <br>
      <header>
        <nav>
          <ul>
            <li><a href="../lib/m_view/m_top.php">トップページ</a></li>
            <li><a href="m_select_material.php">美術品一覧</a></li>
            <li><a href="m_select_user.php">管理者一覧</a></li>
            <li><a href="m_select_genre.php">ジャンル一覧</a></li>
            <li><a href="m_select_job.php">職種一覧</a></li>
            <li><a href="m_select_closed.php">休館日一覧</a></li>
            <li><a href="../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
          </ul>
        </nav>
      </header>
    <br>
    <h1>新規管理者登録</h1>
    <form action="../m_control/m_insert_user.php" method="post">
      <table>
        <tr><th>メールアドレス</th><th><input type="text" size="30" name ="mail_address" value="<?php if(!empty($_POST["mail_address"])){ph($_POST["mail_address"]);} ?>"></th></tr>
        <tr><th>パスワード</th><th><input type="password" size="30" name ="password" value="<?php if(!empty($_POST["password"])){ph($_POST["password"]);} ?>"></th></tr>
        <tr><th>表示名</th><th><input type="text" size="30" name ="user_name" value="<?php if(!empty($_POST["user_name"])){ph($_POST["user_name"]);} ?>"></th></tr>
        <tr><th>職業</th>
          <td>
          <select name="job_id">
            <option value="" selected disabled>選択してください</option>
            <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
              <option <?php if(!empty($_POST["job_id"]) and $row["job_id"] == $_POST["job_id"]) {print "selected";} else {print "";} ?>
                value="<?php ph($row["job_id"]); ?>"><?php ph($row["job_name"]); ?></option>
            <?php } ?>
          </select>
        </td>
        </tr>
      </table>
      <br>
      <div>
        <span class="error"><?php print $msg; ?></span>
      <br>
      <br>
        <input type="submit" value="登録">
        <input type="reset" value="クリア"><br>
      <br>
      <br>
        <input type="button" value="管理者一覧に戻る" onclick="location.href='m_select_user.php'">
      </div>
    </form>
  </body>
</html>
