<?php

$result;
$value;
$from;
$to;
$output=TRUE;

if(isset($_POST['value']) and $_POST['value'] != ""){

	$value = $_POST['value'];
	$from =	$_POST['from'];
	$to = $_POST['to'];
	
	if($from == "Decimal" && $to == "Decimal"){
		$output = FALSE;
	}
	
	if($from == "Decimal" && $to == "Dual"){
		$result = decbin($value);	
	}
	
	if($from == "Decimal" && $to == "Octal"){
		$result = decoct($value);	
	}
	
	if($from == "Decimal" && $to == "Hexadecimal"){
		$result = dechex($value);
	}
	
	if($from == "Dual" && $to == "Dual"){
		$output = FALSE;
	}
	
	if($from == "Dual" && $to == "Decimal"){
		$result = bindec($value);
	}
	
	if($from == "Dual" && $to == "Octal"){
		$result = bindec($value);
		$result = decoct($result);
	}
	
	if($from == "Dual" && $to == "Hexadecimal"){
		$result = bindec($value);
		$result = dechex($result);
	}
	
	if($from == "Octal" && $to == "Dual"){
		$result = octdec($value);
		$result = decbin($result);
	}
	
	if($from == "Octal" && $to == "Decimal"){
		$result = octdec($value);
	}
	
	if($from == "Octal" && $to == "Octal"){
		$output = FALSE;
	}
	
	if($from == "Octal" && $to == "Hexadecimal"){
		$result = octdec($value);
		$result = dechex($result);
	}
	
	if($from == "Hexadecimal" && $to == "Dual"){
		$result = hexdec($value);
		$result = decbin($result);
	}
	
	if($from == "Hexadecimal" && $to == "Decimal"){
		$result = hexdec($value);
	}
	
	if($from == "Hexadecimal" && $to == "Octal"){
		$result = hexdec($value);
		$result = decoct($result);
	}
	
	if($from == "Hexadecimal" && $to == "Hexadecimal"){
		$output = FALSE;
	}
}
?>

<form name="convert" method="post">

Value:
<input name="value" type="text" value="<?php if(isset($value) && $value != "") echo $value; ?>" onclick="this.select()">

<br>
From: 
	<select name="from">
      <option <?php if(isset($from) && $from == "Decimal") echo "selected"; ?>>Decimal</option>
      <option <?php if(isset($from) && $from == "Dual") echo "selected"; ?>>Dual</option>
      <option <?php if(isset($from) && $from == "Octal") echo "selected"; ?>>Octal</option>
      <option <?php if(isset($from) && $from == "Hexadecimal") echo "selected"; ?>>Hexadecimal</option>
    </select>

<br>	
To: &nbsp;&nbsp;&nbsp;
	<select name="to">
	  <option <?php if(isset($to) && $to == "Dual") echo "selected"; ?>>Dual</option>
      <option <?php if(isset($to) && $to == "Decimal") echo "selected"; ?>>Decimal</option>
      <option <?php if(isset($to) && $to == "Octal") echo "selected"; ?>>Octal</option>
      <option <?php if(isset($to) && $to == "Hexadecimal") echo "selected"; ?>>Hexadecimal</option>
    </select>
	
<br>	
	<input type="submit" value="Convert">
</form>	
<br>

<?php

	if(empty($value)){
		echo "<b style='color:Green'>Insert value!</b>";
	}
		
	if ($output != FALSE && isset($value)){	
		echo "Convert: <span style='color:green; font-weight:bold;'>$value</span><br> <span style='color:orange; font-weight:bold;'>$from</span> to <span style='color:orange; font-weight:bold;'>$to</span><br><br>";
		echo ">Result:<br><textarea>".$result."</textarea>";	
	}
	
	if($output==FALSE && isset($value))echo "<b style='color:red'>this would not be really useful!</b>";

?>	
