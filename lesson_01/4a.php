<?php
 $rez=0;
for ($i = 0; $i <= 100; $i++) {
    $computer = rand(0,1);
    $rez += $computer;
}



if ($rez ==50) {
        echo "  50/50";
         }
    elseif ($rez>=50){
        echo "на"." ". $rez."% оптимист";
        }
    else{
        echo "на"." ". $rez."% пессимист";
    }
?>



