<!DOCTYPE html>
<!--
 * 検索結果表示画面
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
<title>検索結果表示画面</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <nav>
    <h1>愛パワー美術館</h1>
    <ul>
      <li><a href="top.php">トップページ</a></li>
      <?php if (user_lv_check()) { ?>
        <li><a href="logout.php" onclick="return confirm('本当にログアウトしますか？');">ログアウト</a></li>
        <li><a href="usr.php?user_id=<?php ph($_SESSION["user_id"]); ?>">マイページ</a></li>
      <?php } else { ?>
      <li><a href="login.php">ログイン</a></li>
      <li><a href="insert_user.php">新規登録</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>

<!-- 検索ボックス -->
  <table id="search">
    <form action="select_material.php" method="post">
      <tr><th>美術品名</th><th><input type="text" size="30" name ="material_name"></th></tr>
      <tr><th>作者名</th><th><input type="text" size="30" name ="author_name"></th></tr>
      <tr><th>ジャンル</th>
        <th>
        <select name="genre_id">
          <option value="" selected disabled>選択してください</option>
          <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php ph($row["genre_id"]); ?>"><?php ph($row["genre_name"]) ?></option>
          <?php } ?>
        </select>
        </th>
      </tr>
      <tr><th>制作年</th><th><input type="text" size="30" name ="material_year"></th></tr>
  </table>
      <input type="submit" value="検索">
      <input type="reset" value="クリア">
    </form>

<!-- 検索結果 -->
<h2>美術品検索結果</h2>
<table>
    <tr>
      <th>画像</th>
      <th>美術品名</th>
      <th>作者名</th>
      <th>ジャンル</th>
      <th>制作年</th>
      <th>詳細</th>
    </tr>

    <?php while ($row_result=$sth_result->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr>
			<td><?php ph($row_result["picture"]); ?></td>
			<td><?php ph($row_result["material_name"]); ?></td>
			<td><?php ph($row_result["author_name"]); ?></td>
			<td><?php ph($row_result["genre_name"]); ?></td>
			<td><?php ph($row_result["material_year"]); ?></td>
			<td><a href="material_detail.php?material_id=<?php ph($row_result["material_id"]); ?>">詳細</a></td>
    </tr>
    <?php } ?>

</table>

<a href="#search">条件を絞り込む</a>
<!-- ページ上部の検索フォームへのページ内リンク -->

</body>
</html>
