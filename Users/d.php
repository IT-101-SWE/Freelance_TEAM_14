<?php

$dfile = file_get_contents("/resource/data.json");

$data = json_decode($dfile,true);
$data['job'] = array();

for($i = 0; $i < 100; $i++)
{
    if($i % 2 == 0)
    {
        $in = 0;
    }
    else
    {
        $in = 1;
    }




}

file_put_contents("data.json",json_encode($data));

?>