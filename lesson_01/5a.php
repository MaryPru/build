
<?php
$a='семь';
$b='четыре';
$sum=0;

print($a."=a "." ".$b."=b"." ");

echo "<br>\n";


switch ($a ) {
    case 'ноль':
        $a1=0;
        echo "a равно 0";
        break;
    case 'один':
        $a1=1;
        echo "a равно 1";
        break;
    case 'два':
        $a1=2;
        echo "a равно 2";
        break;
     case 'три':
        $a1=3;
         echo "a равно 3";
        break;
     case 'четыре':
        $a1=4;
        echo "a равно 4";
        break;
    case 'пять':
        $a1=5;
        echo "a равно 5";
        break;
     case 'шесть':
        $a1=6;
        echo "a равно 6";
        break;
    case 'семь':
        $a1=7;
        echo "a равно 7";
        break;
    case 'восемь':
        $a1=8;
        echo "a равно 8";
        break;
    case 'девять':
        $a1=9;
        echo "a равно 9";
        break;
    }
    echo "<br>\n";

        switch ($b ) {
            case 'ноль':
                $b1=0;
                echo "b равно 0";
                break;
            case 'один':
                $b1=1;
                echo "b равно 1";
                break;
            case 'два':
                $b1=2;
                echo "b равно 2";
                break;
             case 'три':
                $b1=3;
                 echo "b равно 23";
                break;
             case 'четыре':
                $b1=4;
                echo "b равно 4";
                break;
            case 'пять':
                $b1=5;
                echo "b равно 5";
                break;
             case 'шесть':
                $b1=6;
                echo "b равно 6";
                break;
            case 'семь':
                $b1=7;
                echo "b равно 7";
                break;
            case 'восемь':
                $b1=8;
                echo "b равно 8";
                break;
            case 'девять':
                $b1=9;
                echo "b равно 9";
                break;    
}
$sum=$a1+$b1;
echo "<br>\n";
if($sum>9){
   print($sum."=сумма чисел и это большое число"); 
}
else{
    print($sum."=сумма чисел и это маленькое число"); 
}



?>