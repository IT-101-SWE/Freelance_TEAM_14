<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data =json_decode( file_get_contents('../resources/data.json'),true);

    $email =$_POST['email'];
    $password =$_POST['password'];
    $i = 0;
    foreach($data['user'] as $user){

        if ($user['email']== $email && password_verify($password ,$user['password']) ){

                session_start();
                $_SESSION['uname'] =$user['name'];
                $_SESSION['uid'] = $user['uid'];
                $_SESSION['uIndex'] = $i;
                $_SESSION['uState'] = $user['uState'];
                header('Location: /Home/');
                exit;


        }
        $i++;
    }
    header("Location:{$_SERVER['HTTP_REFERER']}?err=1".http_build_query($_GET));
    exit;
}
?>