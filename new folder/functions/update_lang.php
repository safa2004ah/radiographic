<?php
function update_lang($db,$table,$muhannad,$ar,$en,$fr,$it,$sp)
{
	$up_arr = array(
	$muhannad => $db->sqlsafe($ar)
	);
	$db->update($table,$up_arr,'main_id='.$_GET['id'].' AND langs_id=1');

	$up_arr = array(
	$muhannad => $db->sqlsafe($en)
	);
	$db->update($table,$up_arr,'main_id='.$_GET['id'].' AND langs_id=2');

	$up_arr = array(
	$muhannad => $db->sqlsafe($fr)
	);
	$db->update($table,$up_arr,'main_id='.$_GET['id'].' AND langs_id=3');

	$up_arr = array(
	$muhannad => $db->sqlsafe($it)
	);
	$db->update($table,$up_arr,'main_id='.$_GET['id'].' AND langs_id=4');

	$up_arr = array(
	$muhannad => $db->sqlsafe($sp)
	);
	$db->update($table,$up_arr,'main_id='.$_GET['id'].' AND langs_id=5');
}
?>