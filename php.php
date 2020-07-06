<?php
$i = 0;
$array = array('a'=>'aa','b'=>'bb','c'=>'cc');
foreach($array as $key=>$value){
if($i == 2){
break;
}
echo $value.'<br>';
$i++;
}
?>