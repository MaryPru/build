<?php
$range = range(1,50);

$max=end($range);
$min=$range[0];

function isSimple($n){
        if ($n==2)
         return true;
	    if ($n%2==0)
		return false;
	$i=3;
	$max_factor = (int)sqrt($n);
	while ($i<=$max_factor){
		if ($n%$i == 0)
			return false;
		$i+=2;
	}
	return true;
}

function getSimples($max)
{
	$arr = [];
	for ($i=3; $i<=$max; $i++){
		if (isSimple($i))
			$arr[] = $i;

	}
	return $arr;
}

$numbers=getSimples($max);
print(json_encode($numbers).'  простые');


function isCompose($n){

	    if ($n%2==0 && isSimple($n)==true)
		return true;

	return false;
}

function getCompose($max)
{
	$arr = [];
	for ($i=4; $i<=$max; $i++){
		if (isCompose($i))
			$arr[] = $i;
			if(!isSimple($i))
			$arr[]=$i;
	}
	return $arr;
}
echo "<br/>";
$even=getCompose($max);
print(json_encode($even).'  составные');

?>

