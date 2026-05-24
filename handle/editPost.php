<?php
session_start();
// # IF Errors Exist Do Not Make The Changes //
require_once "../config/connection.php";

if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $title = trim(htmlspecialchars($_POST['title']));;
    $body = trim(htmlspecialchars($_POST['body']));;
    $query = "SELECT image FROM posts WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $oldImage = mysqli_fetch_assoc($result)['image'];

    // handle errors
    $errors = [];
    if (empty($title) || empty($body)) {
        $errors[] = "Please Fill All Fileds";
    }

    if ($_FILES['image']['name']) {
        $img = $_FILES['image'];
        $imgName = $img['name'];
        $imgTmpName = $img['tmp_name'];
        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
        $extValidate = ['jpg', 'jpeg', 'png'];

        if (!in_array($ext, $extValidate)) {
            $errors[] = "Image Must Be 'jpeg', 'jpg', 'png'";
            $imgNewName = $oldImage;
        } else {
            $imgNewName = uniqid() . "." . $ext;
        }
    } else {
        $imgNewName = $oldImage;
    }

    // store errors if exist
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location:../editPost.php?id=$id");
        exit();
    }

    $query = "UPDATE posts SET title = '$title', `image` = '$imgNewName', body = '$body' WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        if (!empty($_FILES['image']['name']) && $imgNewName != $oldImage) {
            move_uploaded_file($imgTmpName, '../assets/images/postImage/' . $imgNewName);
            unlink('../assets/images/postImage/' . $oldImage);
        }
        $_SESSION['success'] = "Post Updated Successfully";
        header("location:../index.php");
        exit();
    }
} else {
    header("location:../editPost.php");
    exit();
}
