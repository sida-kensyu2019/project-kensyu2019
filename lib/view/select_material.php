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
<!-- 検索ボックス -->
    <form action="select_material.php" method="post" id="search">
      <table id="table_search">
      <tr><th>美術品名</th><th><input type="text" size="30" name ="material_name"
        value="<?php ph($_POST["material_name"]); ?>"></th></tr>
      <tr><th>作者名</th><th><input type="text" size="30" name ="author_name"
        value="<?php ph($_POST["author_name"]); ?>"></th></tr>
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
      <tr><th>制作年</th><th><input type="text" size="30" name ="material_year"
        value="<?php ph($_POST["material_year"]); ?>"></th></tr>
      </table>
      <input type="submit" value="検索">
      <input type="reset" value="リセット">
    </form>

<!-- 検索結果 -->
<h2>美術品検索結果</h2>
<table class="material_list">
    <tr>
      <th class="material_th" width="150px">画像</th>
      <th class="material_th">美術品名</th>
      <th class="material_th">作者名</th>
      <th class="material_th">ジャンル</th>
      <th class="material_th">制作年</th>
      <th class="material_th">詳細</th>
    </tr>

    <?php while ($row_result=$sth_result->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr class="ml_tr">
			<td class="ml_td"><img src="<?php ph($row_result["picture"]); ?>" width="150px" height=""></td>
			<td class="ml_td"><?php ph($row_result["material_name"]); ?></td>
			<td class="ml_td"><?php ph($row_result["author_name"]); ?></td>
			<td class="ml_td"><?php ph($row_result["genre_name"]); ?></td>
			<td class="ml_td"><?php ph($row_result["material_year"]); ?></td>
			<td class="ml_td"><a href="material_detail.php?material_id=<?php ph($row_result["material_id"]); ?>">詳細</a></td>
    </tr>
    <?php } ?>

</table>

<a href="#table_search">条件を絞り込む</a>
<!-- ページ上部の検索フォームへのページ内リンク -->
</div>
</body>
</html>
