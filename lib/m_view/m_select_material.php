<!-- 管理美術品一覧画面 制作者：増井 2019/05/22 13:15 -->
<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
	  <meta charset="utf-8">
	  <title>美術品一覧画面</title>
	  <link rel="stylesheet" href="m_select_material.css">
	</head>
	<body>

		<a href="m_search_material.php">条件を絞り込む</a>
		<a href="m_insert_material.php">新規追加する</a>

		<?php require_once("../init.php");
		while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
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
			<tr>
				<td><?php ph($row["picture"]); ?></td>
				<td><?php ph($row["material_name"]); ?></td>
				<td><?php ph($row["author_name"]); ?></td>
				<td><?php ph($row["genre_name"]); ?></td>
				<td><?php ph($row["material_year"]); ?></td>
				<td><a href="m_update_material.php">編集</td> <!-- 美術品編集画面リンク -->
				<td><a href="m_delete_exec_material.php">削除</td> <!-- 削除完了画面リンク -->
			</tr>
		</table>
	<?php } ?>

</body>
</html>
