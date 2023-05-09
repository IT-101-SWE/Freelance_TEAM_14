<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // (data.json) user data file
    $data = json_decode(file_get_contents('../resources/data.json'), true);

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nextId = $data['nextId'];
    $data['nextId']++;


    //Validate form data
    if (empty($name) || empty($email) || empty($password)) {
        die("Please fill out all fields.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }


    // Check if email already exists
    foreach ($data['user'] as $user) {
        if ($user['email'] == $email) {
            echo 'Email already exists';
            exit;
        }
    }

    // Add new user to data array
    $data['user'][] = array(
        'uid' => $nextId,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'uState' => 1

    );

    // Save data to JSON file
    file_put_contents('../resources/data.json', json_encode($data,JSON_PRETTY_PRINT));

    echo 'Registration successful!';
    // Redirect user to login page
    header('Location: ../Login/');
    exit();
}