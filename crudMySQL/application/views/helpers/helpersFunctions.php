<?php

/**
 * Create html select box from Mysql
 * 
 * @param array $config
 * @param string $table
 * @param string $name
 * @param string $valueColumn
 * @param string $labelColumn
 * @param array $data
 * @param string $multiple
 * @return string $html
 */
function createSelectFromDb($config, $table, $name, 
		$valueColumn, $labelColumn, $data, $multiple=FALSE)
{	

	if($multiple===FALSE)
		$html="<select name=\"".$name."\">";
	else
		$html="<select multiple name=\"".$name."[]\">";


	$cnx=connectDB($config);
	$query = "SELECT * FROM ".$table;
	$result=mysqli_query($cnx,$query);
	while ($row = mysqli_fetch_assoc($result)) 
	{	
		$html.="<option value=\"".$row[$valueColumn]."\""; 
				//if (isset($data[$name])&&$data[$name]==".$row[$valueColumn].")
				if (in_array($row[$valueColumn],$data))
					$html.='selected';
				else 
					$html.='';
		$html.=">".$row[$labelColumn]."</option>";		

	}
	$html.="</select>";

	return $html;
}


function createRadioCheckFromDb($config, $table, $name, 
		$valueColumn, $labelColumn, $data, $checkbox=FALSE)
{
	if($checkbox===TRUE)
	{
		$fieldType="checkbox";
		$name=$name."[]";
	}
	else
		$fieldType="radio";

	$html='';
	$cnx=connectDB($config);
	$query = "SELECT * FROM ".$table;
	$result=mysqli_query($cnx,$query);
	while ($row = mysqli_fetch_assoc($result)) 
	{	
		$html.=$row[$labelColumn] .": "."<input type=\"".$fieldType."\" 
					name=\"".$name."\" value=\"".$row[$valueColumn]."\""; 
				if (in_array($row[$valueColumn],$data))
					$html.='checked';
				else
					$html.=''; 
		$html.="/>";

	}		

	return $html;
}
