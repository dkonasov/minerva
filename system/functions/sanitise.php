<?php

/*
Документация по функции:

Функция Sanitise обезопашивает вводимую пользователем строку. Все символы HTML занимаются на безопасные во избежании взлома.
*/

 function sanitise($value)

  {

   $value=HtmlSpecialChars($value);

   $value=mysql_real_escape_string($value);

   return $value;

   }

?>