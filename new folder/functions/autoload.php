<?php
require('functions/levels.php');
if(isset($_GET['m']) && isset($_GET['a'])){
	if($_GET['m'] != '' && $_GET['a'] != ''){
		$m = $_GET['m'];
		$a = $_GET['a'];
		if(file_exists('modules/'.$m)){
			if(file_exists('modules/'.$m.'/'.$a.'.php')){
				$html_require = 'modules/'.$m.'/'.$a.'.php';
				$html_header = strtoupper($m);
				if(file_exists('modules/'.$m.'/script.js')){
					$html_require_script = 'modules/'.$m.'/script.js';
				}
			}else{
				$html_require = 'modules/home/404.php';
				$html_header = strtoupper('404 Error Page');
				if(file_exists('modules/home/script.js')){
					$html_require_script = 'modules/home/script.js';
				}
			}
		}else{
			$html_require = 'modules/home/404.php';
			$html_header = strtoupper('404 Error Page');
			if(file_exists('modules/home/script.js')){
				$html_require_script = 'modules/home/script.js';
			}
		}
	}else{

		print '<meta http-equiv="refresh" content="0;URL=index.php" />';

	}

}else{

	$html_require = 'modules/home/home.php';

	$html_header = strtoupper('home');

	if(file_exists('modules/home/script.js')){

		$html_require_script = 'modules/home/script.js';

	}

}
?>