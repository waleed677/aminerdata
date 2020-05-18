<?php

$no_of_awards = rand(5,10);
$no_of_awards;

$name = ['waleed','arshad','awan','Ali','Muhammad','Rawahid','Arslan','John','Noman','usman','a','b','c','d','e','af','g','h','u','i'];
$j = 0;

for ($i=0; $i <$no_of_awards; $i++) { 
	$awards = array_rand($name);
	echo $name[$awards]."<br>";
	unset($name[$awards]);

}
