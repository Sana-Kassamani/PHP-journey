<?php 

function mergeSort(&$list, $start, $end){

    if($start < $end)
    {
        $mid = intdiv($start+$end,2) ;
        mergeSort($list, $start, $mid);
        mergeSort($list, $mid +1, $end);
        merge($list, $start,$mid,$end);

    }
}
function merge(&$list,$start,$mid,$end){
    $left_size = $mid - $start +1;
    $right_size=$end - $mid;
    $left_list=[];
    $right_list=[];

    $left_list = array_slice($list, $start, $left_size);
    $right_list = array_slice($list, $mid + 1, $right_size);
    
    $merge_index =$start;
    $left_index = 0;
    $right_index = 0;

    while($left_index<$left_size && $right_index < $right_size)
    {
        if($left_list[$left_index] <= $right_list[$right_index])
        {
            $list[$merge_index]=$left_list[$left_index];
            $left_index++;
            $merge_index++;
        }
        else{
            $list[$merge_index]=$right_list[$right_index];
            $right_index++;
            $merge_index++;
        }
        
    }
    while($left_index<$left_size)
    {
        $list[$merge_index]=$left_list[$left_index];
        $left_index++;
        $merge_index++;
    }
    while( $right_index < $right_size)
    {
        $list[$merge_index]=$right_list[$right_index];
        $right_index++;
        $merge_index++;

    }
   
}
$list = [2,8,7,4,32,2,5,16];
echo json_encode([
    "list"=>$list
]);


mergeSort($list,0,count($list)-1);

echo json_encode([
    "sorted"=>$list
]);