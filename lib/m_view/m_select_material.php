<!-- 管理美術品一覧画面 制作者：増井 2019/05/22 13:15 -->
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
	  <meta charset="utf-8">
	  <title>美術品一覧画面</title>
	  <link rel="stylesheet" href="../css/m_style.css">
	</head>
	<body>
		<header>
			<nav>
				<h1>管理者画面</h1>
				<ul>
					<li><a href="m_top.html">トップページ</a></li>
					<li><a href="../../m_control/m_select_material.php">美術品一覧</a></li>
					<li><a href="../../m_control/m_select_user.php">管理者一覧</a></li>
					<li><a href="../../m_control/m_select_genre.php">ジャンル一覧</a></li>
					<li><a href="../../m_control/m_select_job.php">職種一覧</a></li>
					<li><a href="../../m_control/m_select_closed.php">休館日一覧</a></li>
					<li><a href="">ログアウト</a></div>
				</ul>
			</nav>
		</header>

		<a href="m_search_material.php">条件を絞り込む</a>
		<a href="m_insert_material.php">新規追加する</a>

		<table>
			<tr>
				<th>画像</th>
				<th>美術品名</th>
				<th>作者名</th>
				<th>ジャンル</th>
				<th>制作年</th>
				<th>編集</th>
				<th>削除</th>
			</tr>
			<?php
			while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
			<tr>
				<td><?php ph($row["picture"]); ?></td>
				<td><?php ph($row["material_name"]); ?></td>
				<td><?php ph($row["author_name"]); ?></td>
				<td><?php ph($row["genre_name"]); ?></td>
				<td><?php ph($row["material_year"]); ?></td>
				<td><a href="m_update_material.php?material_id=<?php ph($row["material_id"]);?>">編集</a></td> <!-- 美術品編集画面リンク -->
				<td><a href="m_delete_exec_material.php?material_id=<?php ph($row["material_id"]);?>">削除</a></td> <!-- 削除完了画面リンク -->
			</tr>
		<?php } ?>
		</table>

</body>
</html>
