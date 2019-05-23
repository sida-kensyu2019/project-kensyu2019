<?php
　//カレンダーのコントロールとビュー：村上：2019/05/23：Ver1.1
  require_once("function.php");
  $dbh = connectDb();

  try {
      // プレースホルダ付きSQLを構築
      $sql = "SELECT closed FROM eye_power_db.m_closed;";
      $sth = $dbh->prepare($sql); // SQLを準備

      // SQLを発行
      $sth->execute();

      //休館日データをすべて二次元配列に格納
      $closed_list = $sth->fetchAll(PDO::FETCH_ASSOC);

  } catch (PDOException $e) {
      exit("SQL発行エラー：{$e->getMessage()}");
  }

 ?>
<!DOCTYPE html>
 <html>
     <head>
       <meta charset="UTF-8">
       <title>カレンダー</title>
       <link rel="stylesheet" href="pass">
       <script src=""></script>
     </head>
     <body>
          <?php
              //現在の年月取得
              $year = date("Y");
              $month = date("n");
              //月末日取得
              $last_day = date("j", mktime(0, 0, 0,$month + 1, 0, $year));
              //配列生成
              $calender = array();
              $j = 0;
              //月末日までをループして二次元配列に格納
              for ($i = 1; $i <= $last_day ; $i++) {
                  $week = date("w", mktime(0, 0, 0,$month, 0, $year));
                  //一日目のみ月始め曜日まで空の文字列格納
                  if ($i == 1) {
                      for ($s = 0; $s <= $week; $s++) {
                      $calender[$j]["day"] = "";
                      $j++;
                      }
                  }
                  $calender[$j]["day"] = $i;
                  $j++;
                  //月末日のみ残り曜日に空の文字列格納
                  if ($i == $last_day) {
                      for ($e = 1; $e <= 6 ; $e++) {
                        $calender[$j]["day"] = "";
                        $j++;
                      }
                  }
              }

           ?>
           <table>
               <caption>
                  休館日カレンダー   
               </caption>
               <tr>
                  <th>日</th>
                  <th>月</th>
                  <th>火</th>
                  <th>水</th>
                  <th>木</th>
                  <th>金</th>
                  <th>土</th>
               </tr>
               <tr>
                  <?php
                      //二次元配列$calender,$closed_listの値を取り出し照合する繰り返し
                      $cnt = 0;
                  　　
                      foreach($calender as $value_day){
                         foreach($closed_list as $value_closed){
                              $date = explode("-", $value_closed["closed"]);
                              if ((int)$date[2] == $value_day["day"] AND (int)$date[0] == $year AND (int)$date[1] == $month) { ?>
                                <td>
                                  <?php $cnt++; ?>
                                  <?php print $value_day["day"]."<br>休館日";
                                    break; ?>
                                </td>
                            <?php }
                         } ?>
                             <?php if ((int)$date[2] != $value_day["day"]){ ?>
                               <td>
                                  <?php $cnt++; ?>
                                  <?php print $value_day["day"]; ?>
                               </td>
                             <?php } ?>

                        <?php if ($cnt == 7) { ?>
                              </tr>
                              <tr>
                              <?php $cnt = 0;
                              }
                      }  ?>
               </tr>
           </table>
     </body>
 </html>
