<?php
session_start();
require_once '../config/connection.php';
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $img = $_FILES['image'];
    $body = $_POST['body'];
    $imgName = $img['name'];
    $ext = pathinfo($imgName, PATHINFO_EXTENSION);
    $extValidate = ['jpeg', 'jpg', 'png'];
    $imgTmpName = $img['tmp_name'];
    $imgNewName = uniqid(8) . time() . '.' . $ext;

    // handle errors
    $errors = [];
    if (empty($title) || empty($body)) {
        $errors[] = "Please Fill All Fileds";
    }    

    if (empty($imgName)) {
        $errors[] = "Image Required";
    } elseif ($img['error'] != 0) {
        $errors[] = "Failde File";
    } elseif (!in_array($ext, $extValidate)) {
        $errors[] = "File Must Be 'jpeg', 'jpg', 'png' ";
    }

    // store errors if exist
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('location:../addPost.php');
        exit();
    }

    $query = "INSERT INTO posts (`title`, `image`, `body`, `user_id`)
    values ('$title','$imgNewName','$body', 1)";
    $result = mysqli_query($connection, $query);

    if($result){
        move_uploaded_file($imgTmpName, "../assets/images/postImage/" . $imgNewName);
    }
    

    // Success msg
    $_SESSION['success'] = "Post created successfully";
    header("location:../addPost.php");
    exit();
}
