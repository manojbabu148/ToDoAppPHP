<!DOCTYPE html>
<html>
<head>
    <title>Php</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">       
</head>
<body>
    <?php require_once 'process.php'?>

    <?php 
        if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>

<div class="container">

    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
        // pre_r($result->fetch_assoc());
    ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
    <?php
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['location'] ?></td>
                <td>
                    <a class="btn btn-info" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                    <a class="btn btn-danger" href="index.php?delete=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
    </div>
   
    <?php
        // function pre_r($array){
        //     echo '<pre>';
        //     print_r($array);
        //     echo '</pre>';
        // }
    ?>
    <div class="row justify-content-center">
    <form action="process.php" method="post">
    <input type="hidden" name="id" value=<?php echo $id; ?>>
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter name">
    </div>
    <div class="form-group">
    <label>Location</label>
    <input type="text" name="location" value="<?php echo $location; ?>" placeholder="Enter location">
    </div>
    <div class="form-group">
    <?php if($update==TRUE): ?>
    <button class="btn btn-info" type="submit" name="update">update</button>
    <?php else: ?>
    <button class="btn btn-primary" type="submit" name="save">Save</button>
    <?php endif ?>
    </div>
    </form> 
    </div>   
</div>






<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>      
</body>
</html>