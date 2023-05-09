<?php

//if request not submitted go back
if(!(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['gender']) && isset($_POST['level'])))
{
    
    header("Location:". $_SERVER['HTTP_REFERER']);
    exit;
}


$email = $_POST['email'];
$name  = $_POST['name'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];
$level = $_POST['level'];

//path to data.json in global
$file_path_to_data = "http://127.0.0.1/resources/data.json";

//open file
$file = file_get_contents($file_path_to_data);
//decode data in file
$data = json_decode($file, TRUE);

//path to record.json in global
$file_path_to_record = "../resources/record.json";

//open file contain last id
$id_file = file_get_contents($file_path_to_record);

//decode id file

$id_data = json_decode($id_file,true);

$lastId = $id_data['userid'] + 1;
//store data in array with order
$userData = array("id"=> $lastId,"name"=>$name,"email"=>$email,"pass"=>$pass,"gender"=>$gender,"level"=>$level);

//update record file

$id_data['userid'] = $lastId;

file_put_contents($file_path_to_record,json_encode($id_data));

//add new data to user object

$data['user'][] = $userData;

//encode user data
$eud = json_encode($data);

//store user data
file_put_contents($file_path_to_data,$eud);

header("Location:/Login/");
exit;
?>
