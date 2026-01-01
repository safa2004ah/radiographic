<?php
require ("../../../includes/conf.php");
$arr = $db->select('SELECT *  FROM orders');
for($i=0;$i<count($arr);$i++)
{
  if($arr[$i]["id"]==$_GET['e'])
    {
      $x=(int)(($arr[$i]["status"]));
      $x++;
      $ar = array(
        "id"=>$db->sqlsafe($arr[$i]['id']),
        "status"=>$db->sqlsafe($x)
      );
      $db->update('status',$ar,"id =".$ar['id']."");
        break;
    }
}
//echo $ar[0]['name'];
?>