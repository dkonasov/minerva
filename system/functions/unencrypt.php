<?php

/*

Документация по функции:

Функция unencrypt производить сравнение хеша заданной строки с заданным хешем при использовании соли.

Аргументы функции:
$string - строка для хеширования
$hash - хеш
Функция выдает истину при совпадении хешей и ложь в обратном случае.

*/

function unencrypt ($string, $hash) {

$string=$string.SALT;
$string=md5($string);
if ($string==$hash) {

return true;

}

else {

return false;

}

}

?>