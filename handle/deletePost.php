<?php
session_start();
require_once '../config/connection.php';
if (isset($_POST['delete'])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("location:../index.php");
        exit();
    }
    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $oldImage = mysqli_fetch_assoc($result)['image'];
    $errors = [];
    // if id is not exist
    if (mysqli_num_rows($result) <= 0) {
        $errors[] = "Post is not exist";
        exit();
    }
    // store errors if exist
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location:../editPost.php?id=$id");
        exit();
    } else {
        $query = "DELETE FROM posts WHERE id = '$id';";
        $result = mysqli_query($connection, $query);
        if ($result) {
            // delete img of product
            unlink('../assets/images/postImage/' . $oldImage);
            $_SESSION['success'] = "Post Deleted Successfully";
            header("location:../index.php");
            exit();
        }
    }
} else {
    header("location:../index.php");
    exit();
}
