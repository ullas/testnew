<?php 
$val="";


$items=$additional['additional'];
for($k=0;$k<count($items); $k++)
{
			print_r($items);
		
	$val.= "$(" .$items[$k]['name'] .  ").val()" . ",";
	if(count($items)!=$k){
		$val.= "+";
	}
	
}


echo $val;
?>