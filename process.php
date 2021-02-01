<?php

session_start();

$mysqli = new mysqli('sql12.freemysqlhosting.net', 'sql12390031', 'bYjMvJyumf', 'sql12390031') or die(mysqli_error($mysqli));

$title = "";
$des = "";
$update = FALSE;
$id = 0;
$stat = 1;
if (isset($_POST['save'])){
    $title = $_POST['title'];
    $des = $_POST['des'];

    $mysqli->query("INSERT INTO data (title, des) VALUES('$title', '$des') ") or die($mysqli->error());

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    header("location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = TRUE;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if($result){
        $row = $result->fetch_array();
        $title = $row['title'];
        $des = $row['des'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $des = $_POST['des'];

    $mysqli->query("UPDATE data SET title='$title', des='$des' WHERE id='$id'") or die($mysqli->error());
  
    header("location: index.php");
}

if(isset($_GET['nDone'])){
    $id = $_GET['nDone'];
    $stat = 0;

    $mysqli->query("UPDATE data SET stat='$stat' WHERE id='$id'") or die($mysqli->error());
}

if(isset($_GET['done'])){
    $id = $_GET['done'];
    $stat = 1;

    $mysqli->query("UPDATE data SET stat='$stat' WHERE id='$id'") or die($mysqli->error());
}


