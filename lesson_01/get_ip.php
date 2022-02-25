<?php
$ip = $_GET['ip'];


if(str_contains($ip,'.')){
    $pieces = explode(".", $ip);
    $y1=$pieces[0];
    $y2=$pieces[1];
    $y3=$pieces[2];
    $y4=$pieces[3];
    echo $y4 ;
    echo$y3 ;
    echo  $y2 ;
    echo $y1;
    echo json_encode($pieces);
    echo "<br>\n";
    
    $x = $y4*256*256*256+$y3*256*256+$y2*256+$y1;
    echo $x. "--ip-адрес";

}

else{
    $y1=(int)($ip/(256*256*256));
    $y2=(int)(($ip-$y1*256*256*256)/(256*256));
    $y3=(int)(($ip-$y1*256*256*256-$y2*256*256)/256);
    $y4=$ip-$y1*256*256*256-$y2*256*256-$y3*256;
    $x = "$y1.$y2.$y3.$y4";
    echo $x. "--ip-адрес";
}

?>