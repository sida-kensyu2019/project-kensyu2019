<!-- 管理美術品一覧画面 制作者：増井 2019/05/22 13:15 -->
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
	  <meta charset="utf-8">
	  <title>美術品一覧画面</title>
	  <link rel="stylesheet" href="../css/m_style.css">
		<script src=""></script>
	</head>
	<body>
	<br>
		<header>
        <nav>
          <ul>
            <li><a href="../lib/m_view/m_top.php">トップページ</a></li>
            <li><a class="current" href="m_select_material.php">美術品一覧</a></li>
            <li><a href="m_select_user.php">管理者一覧</a></li>
            <li><a href="m_select_genre.php">ジャンル一覧</a></li>
            <li><a href="m_select_job.php">職種一覧</a></li>
            <li><a href="m_select_closed.php">休館日一覧</a></li>
            <li><a href="../logout.php" onclick="return confirm('本当にログアウトしますか？'); ">ログアウト</a></li>
          </ul>
        </nav>
  	</header>
		<br>
		<br>
    <h1>美術品一覧</h1>
		<br>
		<div>
		<input type="button" value="条件を絞り込む" onclick="location.href='m_search_material.php'">　
		<input type="button" value="新規追加" onclick="location.href='m_insert_material.php'">
		<br>
		<br>
		<table border="1">
			<tr>
				<th class="d0">画像</th>
				<th class="d1">美術品名</th>
				<th class="d1">作者名</th>
				<th class="d2">ジャンル</th>
				<th class="d2">制作年</th>
				<th>編集</th>
				<th>削除</th>
				<th>詳細</th>
			</tr>
			<?php
			while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
			<tr class="tr">
				<td class="td"><img class="img" src="<?php ph($row["picture"]); ?>"></td>
				<td><a href="../material_detail.php?material_id=<?php ph($row["material_id"]); ?>" target="_blank"><?php ph($row["material_name"]); ?></a></td>
				<td><?php ph($row["author_name"]); ?></td>
				<td class="d5"><?php ph($row["genre_name"]); ?></td>
				<td><?php ph($row["material_year"]); ?></td>
				<td><a href="m_update_material.php?material_id=<?php ph($row["material_id"]);?>">編集</a></td> <!-- 美術品編集画面リンク -->
				<td><a href="m_delete_exec_material.php?material_id=<?php ph($row["material_id"]);?>" onclick="return confirm('該当の美術品に関するデータを全て削除します。よろしいですか？'); ">削除</a></td> <!-- 削除完了画面リンク -->
				<td><a href="../material_detail.php?material_id=<?php ph($row["material_id"]);?>" target="_blank">詳細</a></td> <!-- 美術品詳細画面リンク、別タブで開く -->
			</tr>
		<?php } ?>
		</table>
		<br>
		</div>
		<br>
</body>
</html>
