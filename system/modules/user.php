<?php

require_once './system/functions/sanitise.php';
require_once './system/functions/encrypt.php';
require_once './system/functions/dbconn.php';

function adduser($mail, $password) //Добавление нового пользователя
{
$mail=sanitise($mail);
$password=encrypt($password);
dbconn('utf-8');
$query='INSERT INTO users(email, pass) VALUES("'.$mail.'", "'.$password.'");';
$r=mysql_query($query) or die(mysql_error());
return $r;
}

function checkuser($email, $password) //проверка имени пользователя и пароля
{
$result=false;
$email=sanitise($email);
$password=encrypt($password);
dbconn('utf-8');
$q='SELECT email, pass FROM users WHERE email="'.$email.'"';
$r=mysql_query($q) or die(mysql_error);
while ($row=mysql_fetch_array($r))
{
if($row['pass']==$password)
$result=true;
else
$result=false;
}
return $result;
}

?>