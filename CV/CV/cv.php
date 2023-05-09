<?php
session_start();
echo $_SESSION['uid'];
if(isset($_SESSION['uid']))
{
    $fd = file_get_contents('../resources/data.json');
    $data = json_decode($fd,true);


    $data['user'][$_SESSION['uIndex']]['jobt'] = $_POST['jobt'];
    $data['user'][$_SESSION['uIndex']]['jobd'] = $_POST['jobd'];
    $data['user'][$_SESSION['uIndex']]['number'] = $_POST['number'];
    $data['user'][$_SESSION['uIndex']]['skills'] = $_POST['skills'];
    $data['user'][$_SESSION['uIndex']]['wHours'] = $_POST['wHours'];

    file_put_contents('../resources/data.json',json_encode($data,JSON_PRETTY_PRINT));
    header("Location: /Home/");
    exit;
}

?>
