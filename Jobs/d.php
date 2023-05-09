<?php

$dfile = file_get_contents("data.json");

$data = json_decode($dfile,true);
$data['jobs'] = array();

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
    $data['jobs'][] = array("jobt"=>"job".$i,"jobd"=>$in+$i,"jobid"=>$i+1);
    echo $data['jobs'][$i]['jobt']."\n";

}

file_put_contents("data.json",json_encode($data,JSON_PRETTY_PRINT));

?>