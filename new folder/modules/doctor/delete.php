<?php

if(isset($_GET['id'])){

	$result = $db->select('select * from administrators  WHERE admin_id = '.$db->sqlsafe($_GET['id']));

	if(!$result){

		print '<meta http-equiv="refresh" content="0;URL=index.php" />';die;

	}else{

		
		$db->delete('administrators',' admin_id = '.$_GET['id']);

		print '<meta http-equiv="refresh" content="0;URL=index.php?m='.$_GET['m'].'&a=view&success=3" />';die;

	}

}else{

	print '<meta http-equiv="refresh" content="0;URL=index.php" />';die;

}

?>