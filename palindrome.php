<?php

function palindrome($string){
    $i=0;
    $j=strlen($string)-1;

    while($i<=$j)
    {
        if($string[$i] != $string[$j])
        {
            return false;
        }
        $i = $i + 1;
        $j = $j - 1;
    
    }
    return true;
}
$string = "0 ";
if(palindrome($string)){
    echo "$string is a palindrome";
}
else{
    echo "$string is NOT a palindrome";
}

