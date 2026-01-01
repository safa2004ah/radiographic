<?php
$login_status = $_COOKIE['logged_in'];
$md5_all = md5(substr(md5($_COOKIE['username']),5,20).substr($_COOKIE['session'],5,20).substr($_COOKIE['login_time'],5,20));
if ($login_status != $md5_all){
	exit;
}else{
	require ("conf.php");
	$chk_security = $db->select('SELECT * FROM `users_sessions` WHERE logged_in='.$db->sqlsafe($login_status).' ');
}
if ($chk_security[0]['logged_in'] == $_COOKIE['logged_in'] || $chk_security[0]['username'] == $_COOKIE['username'] || $chk_security[0]['session'] == $_COOKIE['session'] || $chk_security[0]['login_time'] == $_COOKIE['login_time']){
	$admin_arrays = $db->select('SELECT * FROM `users` WHERE users_id='.$db->sqlsafe($chk_security[0]['users_id']).' ');
	print_r($admin_arrays);
}
?>