<?php

function mkCalender(){
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
          $week_end = date("w", mktime(0, 0, 0,$month + 1, 0, $year));
            while ($week_end < 6) {
              $calender[$j]["day"] = "";
              $j++;
              $week_end++;
            }
        }
    }
    return $calender;
}
