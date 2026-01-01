<?php

if(isset($_GET['id'])){

	$result = $db->select('select * from patient_photos  WHERE id = '.$db->sqlsafe($_GET['id']).'limit 1');

	if(!$result){

		print '<meta http-equiv="refresh" content="0;URL=index.php" />';die;

	}else{

		$filePath="../images/radiographic/".$result[0]['image'];

		$db->delete('patient_photos',' id = '.$_GET['id']);
		if(file_exists($filePath));
			unlink($filePath);

		print '<meta http-equiv="refresh" content="0;URL=index.php?m='.$_GET['m'].'&a=view&success=3" />';die;

	}

}else{

	print '<meta http-equiv="refresh" content="0;URL=index.php" />';die;

}

?>