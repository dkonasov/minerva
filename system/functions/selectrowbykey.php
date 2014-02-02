<?php
/*

Документация по функции:
Функция selectrowbykey выполняет поиск записи в указанной таблице по заданной паре ключ="значение". В том случае, если запись находится, функция возвращает данные записи
в виде ассоциативного массива ['поле']='значение'. В противном случае возвращается "ложь".

Входящие аргументы: $key - ключ, $value-значение, $table-таблица для поиска.

*/
function selectrowbykey($key, $value, $table)

{
$query="SELECT * FROM ".$table." WHERE ".$key."=\"".$value."\"";
if ($q=mysql_query($query)){
$result=mysql_fetch_assoc($q);
return ($result);
}
else {

return false;

}
}

?>