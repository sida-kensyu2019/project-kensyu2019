/*管理美術品一覧画面 制作者：増井 2019/05/22 13:15*/

<?php
	require_once("../init.php");

	try{
		$sql="SELECT
					 picture,
					 material_name,
					 author_name,
					 genre_name,
					 material_year
					FROM
					 m_material t1
					 INNER JOIN m_genre t2
					 	ON t1.genre_id = t2.genre_id";
		$sth=$dbh->prepare($sql);
		$sth->execute();
	}catch(PDOException $e){
		exit("SQL発行エラー：{e->getMessage()}");
	}

	while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
		<tr>
			<td><?php ph($row["picture"]); ?></td>
			<td><?php ph($row["material_name"]); ?></td>
			<td><?php ph($row["author_name"]); ?></td>
			<td><?php ph($row["genre_name"]); ?></td>
			<td><?php ph($row["material_year"]); ?></td>
			<td><a href="">編集</td> <!-- 美術品編集画面リンク -->
			<td><a href="">削除</td> <!-- 削除完了画面リンク -->
		</tr>
	<?php } ?>
