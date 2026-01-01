<?php
class db{
	var $dbConnect;
	function connect($db , $server = "localhost" , $user ="root" , $pass ="WPc>p5uS}(g7OabG" ){
		$this->dbserver = trim($server);
		$this->dbuse = trim($user);
		$this->dbpass = trim($pass);
		$this->dbname = trim($db);
		$this->dbConnect = mysqli_connect($this->dbserver , $this->dbuse , $this->dbpass );
		if($this->dbConnect){
			$this->dbSelected = mysqli_select_db($this->dbConnect,$this->dbname);
			if(!$this->dbSelected){
				die( $this->debug(mysqli_error($this->dbConnect)) );
			}
			mysqli_set_charset($this->dbConnect,'utf8');
		}else{
			die( $this->debug(mysqli_error($this->dbConnect)) );
		}
	}
	function select_where($query , $where = 1){
		$this->query = $query;
		$this->where = $where;
		$this->query.=$this->where;
		$result = mysqli_query($this->query) or die( $this->debug(mysqli_error($this->dbConnect),$this->query) );
		for ($i= 0 ; $i<mysqli_num_rows($result);$i++){
			$rows = mysqli_fetch_assoc($result);
			$output[$i] = $rows;
		}
		mysqli_free_result($result);
		return $output;
	}
	function select($query){
		$output = array();
		$this->query = $query;
		$result = mysqli_query($this->dbConnect,$this->query) or die( $this->debug(mysqli_error($this->dbConnect),$this->query) );
		for ($i= 0 ; $i<mysqli_num_rows($result);$i++){
			$rows = mysqli_fetch_assoc($result);
			$output[$i] = $rows;
		}
		mysqli_free_result($result);
		return $output;
	}
	function update($table , $values , $where = 1){
		$this->tableName = trim($table);
		$this->value = $values;
		$this->where = $where;
		if(!is_array($this->value)){
			die($this->debug('The Value that you are trying to deal with is not an array'));
		}
		$count = 0;
		$this->query = 'update '.$this->tableName.' set ';
		foreach($this->value as $key => $val ){
			if($count == 0){
					$this->query.=" `$key`= ".$val." " ;
			}else{
				$this->query.=" , `$key`= ". $val ." " ;
			}
			$count++;
		}
		// $this->query.="  WHERE $this->where  LIMIT $this->limit ";
		$this->query.="  WHERE $this->where ";
		// $result = mysqli_query( $this->query ) or die( $this->debug(mysqli_error($this->dbConnect),$this->query) );
		$result = mysqli_query( $this->dbConnect,$this->query ) or die( $this->debug(mysqli_error($this->dbConnect),$this->query) );
		return true;
	}
	function insert($table , $values ){
		$this->tableName = trim($table);
		$this->value = $values;
		if(!is_array($this->value)){
			die($this->debug('The Value that you are trying to deal with is not an array'));
		}
		$count = 0;
		foreach($this->value as $key => $val ){
			if($count == 0){
				$this->fields =       "`".$key."`";
				$this->fieldsValues = $val;
			}else{
				$this->fields  .=     ", "."`".$key."`";
				$this->fieldsValues.= ", ".$val." ";
			}
			$count++;
		}
		$this->query = sprintf("insert into %s (%s) values(%s)",$this->tableName,$this->fields,$this->fieldsValues);
		$result = mysqli_query( $this->dbConnect,$this->query ) or die( $this->debug(mysqli_error($this->dbConnect),$this->query) );
		if( $this->affect() ){
			$done = mysqli_insert_id($this->dbConnect);
		}else{
			$done = 0 ;
		}
		return $done;
	}
	function delete($table , $where){
		$this->table = trim($table);
		$this->where = $where;
		$this->query = sprintf( "DELETE from %s WHERE %s" , $this->table , $this->where );
		$result = mysqli_query($this->dbConnect,$this->query) or die($this->debug(mysqli_error($this->dbConnect),$this->query));
		if($this->affect()){
			$done = true;
		}else{
			$done = false;
		}
		return $done;
	}
	function affect(){
		return mysqli_affected_rows($this->dbConnect);
	}
	function debug($error , $query = NULL){
		$this->error = $error;
		$this->query = $query;
		$message= '<div align="center" ><div style="width:500px;;border:1px dashed red;font-size:15px;padding:15px;margin:10px;direction:ltr;text-align:left;">' .
				  '<p style="color:red;	font-weight:bolder;">&nbsp;&nbsp;' .
				  'ERROR :</p>' .
				  '<p style="direction:ltr;text-align:left;"><strong>'.$this->error.'</strong></p>';
		if(!is_null($this->query)){
		$message.= '<p> your SQL Statement was  :</p> ' .
				   '<p style="direction:ltr;text-align:left;"><strong>'.$this->query.'</strong></p>';
		}
		$message.='</div></div>';
		return $message;
	}
	function sqlSafe($value, $quote="'"){
		$value = str_replace(array("\'","'"),"&#39;",$value);
		//$value = str_replace(array('\"','"'),"&quot;",$value);
		// if (get_magic_quotes_gpc()) {
		// 	$value = stripslashes($value);
		// }
		if(version_compare(phpversion(),"4.3.0")=="-1") {
			$value = mysqli_escape_string($value);
		} else {
			if(!$this->dbConnect){
				$this->debug(@mysqli_error($this->dbConnect));
			}
			$value = mysqli_real_escape_string($this->dbConnect,$value);
		}
		$value = $quote . $value . $quote;
		return $value;
	}
	function ads($position,$full_site_url){
		$ads_arrays = $this->select('SELECT * FROM `ads` WHERE `active`="1" AND `position`="'.$position.'" ');
		if($ads_arrays[0][link] == 'flash'){
			print '
				<div class="'.$position.'">
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="110" height="260">
					<param name="movie" value="'.$full_site_url.'ads/'.$ads_arrays[0][name].'" />
					<param name="quality" value="high" />
					<param name="wmode" value="transparent" />
				<embed src="'.$full_site_url.'ads/'.$ads_arrays[0][name].'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent" width="110" height="260"></embed>
				</object>
				</div>
			';
		}elseif($ads_arrays[0][link] == 'flashRW'){
			print '
				<div class="'.$position.'">
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="260" height="100">
					<param name="movie" value="'.$full_site_url.'ads/'.$ads_arrays[0][name].'" />
					<param name="quality" value="high" />
					<param name="wmode" value="transparent" />
				<embed src="'.$full_site_url.'ads/'.$ads_arrays[0][name].'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent" width="260" height="100"></embed>
				</object>
				</div>
			';
		}else{
			print '<a target="_blank" href="'.$ads_arrays[0][link].'"><img src="'.$full_site_url.'ads/'.$ads_arrays[0][name].'" class="'.$position.'" /></a>';
		}
	}
	function close(){
		mysqli_close($this->dbConnect);
	}
}
?>