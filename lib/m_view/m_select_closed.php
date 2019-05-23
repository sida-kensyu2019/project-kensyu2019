<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>休館日一覧画面</title>
  <link rel="stylesheet" href="m_select_closed.css">
</head>
<body>
  <h1>休館日一覧</h1>
  <form action="m_insert_exec_closed.php" method="post">
    <select name="year"> <!--選択肢に年を3年分表示-->
    	<option value="<?php ph(date('Y'))?>"><?php ph(date("Y"))?></option>
			<option value="<?php ph(date('Y')+1)?>"><?php ph(date("Y")+1)?></option>
			<option value="<?php ph(date('Y')+2)?>"><?php ph(date("Y")+2)?></option>
		</select>年
		<select name="month">
			<?php for($i=0;$i<12;$i++){ //選択肢に月を12表示(要検討) ?>
    	<option value="<?php ph(date('m')+$i)?>"><?php ph(date("n")+$i)?></option>
			<?php } ?>
		</select>月
		<select name="day">
			<?php for($i=0;$i<31;$i++){ //選択肢に日を31表示(要検討) ?>
    	<option value="<?php ph(date('d')+$i)?>"><?php ph(date("j")+$i)?></option>
			<?php } ?>
		</select>日
		<input type="submit" value="新規追加">
  </form>
  <table border=1>
    <tr><th>休館日</th><th></th></tr>
  <?php while($row=$sth->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr>
      <td><?php ph($row["closed"]); ?></td>
      <td><a href="m_delete_exec_closed.php">削除</a></td>
    <tr>
  <?php } ?>
</table>
</body>
</html>
