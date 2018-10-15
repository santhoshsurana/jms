<?php  include "functions.php";

	$states=$_GET['state'];
	$states = explode("~", $states);
	$loop=count($states);
	$temp="<select name='residingCity'  id='residingCity'><option value='0'>Any</option>\n";
	$i=0;
	while($i!=$loop)
	{
		
		$state=$states[$i];
		$sql = "SELECT * FROM `cities` WHERE `state_id`=$state ORDER BY `city_name` ASC";
		$result=_db($sql);
		while($data=mysqli_fetch_row($result))
		{
			$temp .="<option value='".$data['0']."'>".$data['1']."</option>\n";
		}
		$i++;
	}
	
    $temp .="</select>";
	echo $temp;
?>