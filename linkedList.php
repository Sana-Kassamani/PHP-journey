<?php
class Node{
    public $data;
  public $next;
  public function __construct($data) {
    $this->data = $data;
    $this->next = null;
  }
}
class LinkedList{
    public $head;
    public $size;
    public $tail;
    public function __construct() {
        $this->head = null;
        $this->tail = null;
        $this->size =0;

      }
    public function append($data){
        $node = new Node($data);
        if($this->size ==0){
            $this->head = &$node;
            $this->tail = &$node;
            $this->size=$this->size+1;
        }
        else{
            $this->tail->next = &$node;
            $this->tail=&$node;
            $this->size=$this->size+1;
        }

    }

    public function displayWith2Vowels(){
        $vowels=["a","e","i","o","u"];
        $curr = $this->head;
        while($curr)
        {
            $count =0;
            foreach ($vowels as $char)
            {
                if(strpos($curr->data,$char)===0 || strpos($curr->data,$char) )
                {
                    $count++;
                }
                
                
            }
            if($count >=2)
                {
                    echo $curr->data;
                    echo " -> ";
                }
            $curr=$curr->next;
        }
    }

    public function display(){
        $curr = $this->head;
        while($curr)
        {
            echo $curr->data;
            echo " -> ";
            $curr=$curr->next;
        }
    }


}

$linked_list=new LinkedList();
$linked_list->append("apple");
$linked_list->append("cherry");
$linked_list->append("orange");
$linked_list->append("fig");
$linked_list->append("pumpkin");
$linked_list->append("grape");
$linked_list->display();
echo "\n";
$linked_list->displayWith2Vowels();

