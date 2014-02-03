<?php

require_once './system/functions/sanitise.php';
require_once './system/functions/encrypt.php';
require_once './system/functions/dbconn.php';

function adduser($mail, $password) //Добавление нового пользователя
{
dbconn('utf-8');
$mail=sanitise($mail);
$password=encrypt($password);
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

function setusercookie($email, $password, $longsession) {
$password=encrypt($password);
if($longsession) {
setcookie("email",$email, time()+3600000);
setcookie("password",$password, time()+3600000);
}

else {
setcookie("email",$email);
setcookie("password",$password);
}

}

function checkusercookie() {

if($_COOKIE['email']&& $_COOKIE['password'])
{
dbconn('utf-8');
$email=sanitise($_COOKIE['email']);
$q='SELECT email, pass FROM users WHERE email="'.$email.'" AND pass="'.$_COOKIE['password'].'"';
$r=mysql_query($q) or die(mysql_error);
if(mysql_num_rows($r)>0) return true;
else return false;
}
else return false;

}

?>
