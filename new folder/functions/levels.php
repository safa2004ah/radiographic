<?php

$tabs=array("employee"=>1,"radiographic"=>1,"doctor"=>1,"patient"=>1,"reports"=>1,"section"=>1,"appointment"=>1,"my_appointment"=>1);
if($admin_arrays[0]['admin_level']==1){
	$tabs['doctor']=1;$tabs['reports']=0;$tabs['radiographic']=0;$tabs['employee']=1;$tabs['patient']=0;$tabs['section']=1;$tabs['appointment']=0;$tabs['my_appointment']=0;
} 	
else if($admin_arrays[0]['admin_level']==2){
	$tabs['doctor']=0;$tabs['reports']=1;$tabs['radiographic']=0;$tabs['employee']=0;$tabs['patient']=1;$tabs['section']=0;$tabs['appointment']=1;$tabs['my_appointment']=0;
}
else if($admin_arrays[0]['admin_level']==3){
	$tabs['doctor']=0;$tabs['reports']=1;$tabs['radiographic']=1;$tabs['employee']=0;$tabs['patient']=0;$tabs['section']=0;$tabs['appointment']=0;$tabs['my_appointment']=1;
}
function out(){
	print '<meta http-equiv="refresh" content="0;URL=index.php?m=home&a=out" />';
	die;
}
if(isset($_GET['m']) && $_GET['m']=='employee'){
	if($admin_arrays[0]['admin_level']==2)
	{
		out();
	}	
	if($admin_arrays[0]['admin_level']==3)
	{
		out();
	}
}
else if(isset($_GET['m']) && $_GET['m']=='doctor'){
	if($admin_arrays[0]['admin_level']==2)
	{
		out();
	}	
	if($admin_arrays[0]['admin_level']==3)
	{
		out();
	}
}
else if(isset($_GET['m']) && $_GET['m']=='section'){
	if($admin_arrays[0]['admin_level']==2)
	{
		out();
	}
	if($admin_arrays[0]['admin_level']==3)
	{
		out();
	}
}
else if(isset($_GET['m']) && $_GET['m']=='patient'){
	if($admin_arrays[0]['admin_level']==1)
	{
		out();
	}
	if($admin_arrays[0]['admin_level']==3)
	{
		out();
	}
}
else if(isset($_GET['m']) && $_GET['m']=='appointment'){
	if($admin_arrays[0]['admin_level']==1)
	{
		out();
	}	
	if($admin_arrays[0]['admin_level']==3)
	{
		out();
	}
}
else if(isset($_GET['m']) && $_GET['m']=='reports'){
	if($admin_arrays[0]['admin_level']==1)
	{
		out();
	}
}
else if(isset($_GET['m']) && $_GET['m']=='radiographic'){
	if($admin_arrays[0]['admin_level']==1)
	{
		out();
	}	
	if($admin_arrays[0]['admin_level']==2)
	{
		out();
	}
}
else if(isset($_GET['m']) && $_GET['m']=='my_appointment'){
	if($admin_arrays[0]['admin_level']==1)
	{
		out();
	}	
	if($admin_arrays[0]['admin_level']==2)
	{
		out();
	}
}


