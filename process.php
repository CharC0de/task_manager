<?php

include 'config.php';
session_start();
$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$priority = $_POST['priority'] ?? '';
$due_date = $_POST['due_date'] ?? '';
echo var_dump($_POST);
if (isset($_POST['create'])) {

    $sql = "INSERT INTO `tasks` (`id`, `title`, `description`, `priority`, `due_date`) VALUES (NULL, '$title', '$description', '$priority', '$due_date') ";
    $query = mysqli_query($conn, $sql);
    if ($query) {

        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] = 'Create Task Success';
        header('location: index.php');
        exit();
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['status'] = 'Create Task Failure';
        header('location: index.php');
        exit();
    }
}

if (isset($_POST['edit'])) {
    $sql = "UPDATE `tasks` SET `title` = '$title', `description` = '$description', `priority` = '$priority',`due_date` = '$due_date' WHERE `id` = $id;
    ";
    $query = mysqli_query($conn, $sql);
    if ($query) {

        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] = 'Edit Task Success';
        header('location: index.php');
        exit();
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['status'] = 'Edit Task Failure';
        header('location: index.php');
        exit();
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM tasks WHERE `id` = $id";
    $query = mysqli_query($conn, $sql);
    if ($query) {

        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] = 'Delete Task Success';
        header('location: index.php');
        exit();
    } else {
        $_SESSION['status_code'] = 'error';
        $_SESSION['status'] = 'Delete Task Failure';
        header('location: index.php');
        exit();
    }
}
