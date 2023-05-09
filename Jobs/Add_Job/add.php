<?php
session_start();

$data = json_decode(file_get_contents('/mnt/c/Users/Ahmed/Desktop/FreeLance/resources/data.json'), true);
if($_SESSION['uState'] == 0)
{
    $jobData = array('jobt'=>$_POST['jobt'],
        'skills'=> $_POST['skills'],
        'wHoursp'=>$_POST['pt'],
    'wHoursf'=>$_POST['ft'],
        'jobd'=>$_POST['jobd'],
        'jobId'=>$data['nextJobId']);

    $data['nextJobId']++;

    $data['job'][] = $jobData;
    file_put_contents('/mnt/c/Users/Ahmed/Desktop/FreeLance/resources/data.json',json_encode($data,JSON_PRETTY_PRINT));
    header("Location: /Jobs/");
    exit;

}

?>

