<?php

$value = '3.0';

$value = explode('.', $value);



echo '<pre>';
print_r($value);
echo '</pre>';


$firstvalue = $value[0] * 1;
$mediumvalue = $value[1] * 1;
$lastvalue = 4 - $firstvalue;

echo $mediumvalue.'<br>';


for($i = 1; $i <= $firstvalue; $i++)
	echo '<span style="color: ACA235; border: 1px solid #ACA235; background: #ECE385; padding: 5px 15px; display: inline-block; margin-top: 5px;">Estrela preenchido</span><br>';


if($mediumvalue < 5)
	echo '<span style="color: 9D9D9D; border: 1px solid #9D9D9D; background: #F4F4F4; padding: 5px 15px; display: inline-block; margin-top: 5px;">Estrela não preenchida</span><br>';
else if($mediumvalue >= 5)
	echo '<span style="color: 9D9D9D; border: 1px solid #9D9D9D; background: linear-gradient(145deg, #F4F4F4, #ECE385); padding: 5px 15px; display: inline-block; margin-top: 5px;">Estrela meia preenchida</span><br>';


for($i = 1; $i <= $lastvalue; $i++)
	echo '<span style="color: 9D9D9D; border: 1px solid #9D9D9D; background: #F4F4F4; padding: 5px 15px; display: inline-block; margin-top: 5px;">Estrela não preenchida</span><br>';

?>