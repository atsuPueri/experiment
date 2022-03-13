<?php

/**
 * 
 * このファイルは「01, fputcsvで「,」を書き込むとどうなるか.php」
 * で書き込んだ内容を正確に読みだせるか確認するfileです。
 * 
 */


if (($fp = fopen("./file.csv", "r")) !== false) {

    $list = [];
    while (!feof($fp) && $data = fgetcsv($fp)) {
        $list[] = $data;
    }

    fclose($fp);

    echo "<pre>";
    var_dump($list);
    echo "</pre>";
} else {
    exit("ファイル名が間違ってる");
}

// == 結果 == //
// 「"」や「,」はちゃんと文字列として取得できた。
// つまりJSON文字列を書き込んでもしっかりと書き込めて取得できる。
/*
array(5) {
  [0]=>
  array(4) {
    [0]=>
    string(1) "A"
    [1]=>
    string(1) "B"
    [2]=>
    string(1) "C"
    [3]=>
    string(1) "D"
  }
  [1]=>
  array(4) {
    [0]=>
    string(3) "あ"
    [1]=>
    string(3) "い"
    [2]=>
    string(3) "う"
    [3]=>
    string(3) "え"
  }
  [2]=>
  array(4) {
    [0]=>
    string(3) "a,1"
    [1]=>
    string(3) "b,2"
    [2]=>
    string(3) "c,3"
    [3]=>
    string(3) "d,4"
  }
  [3]=>
  array(4) {
    [0]=>
    string(1) ","
    [1]=>
    string(1) """
    [2]=>
    string(3) "",""
    [3]=>
    string(1) "A"
  }
  [4]=>
  array(4) {
    [0]=>
    string(1) "1"
    [1]=>
    string(1) "2"
    [2]=>
    string(1) "3"
    [3]=>
    string(1) "4"
  }
}
*/