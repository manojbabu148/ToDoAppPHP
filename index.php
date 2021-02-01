<!DOCTYPE html>
<html>
<head>
    <title>TO-DO APP</title>
    <meta charset="utf-8">
  <meta name="theme-color" content="#000000">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#0000000">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">       
</head>
<body>
    <h1>ToDoApp</h1>
    <?php require_once 'process.php'?>
    <?php
$mysqli = new mysqli('sql12.freemysqlhosting.net', 'sql12390031', 'bYjMvJyumf', 'sql12390031') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>
<div class="container-fluid mt-4">

    <div class="row">
    <?php   while ($row = $result->fetch_assoc()):  ?>
        <div class="col-sm-auto" >
                <div class="cardclass">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title'] ?></h5>
                        <p class="card-text"><?php echo $row['des'] ?></p>
                        <?php if($row['stat']==1): ?>
                        <a class="fa fa-square-o" style="text-decoration: none; padding: 0 .5rem; font-size: 1.2em;" href="index.php?nDone=<?php echo $row['id']; ?>"></a>
                        <?php else: ?>
                        <a class="fa fa-check-square" style="text-decoration: none; padding: 0 .5rem; font-size: 1.2em;" href="index.php?done=<?php echo $row['id']; ?>"></a>
                        <?php endif ?>
                        <a class="fa fa-edit" style="text-decoration: none; padding: 0 .5rem; font-size: 1.2em;" href="index.php?edit=<?php echo $row['id']; ?>"></a>
                        <a class="fa fa-trash" style="text-decoration: none; padding: 0 .5rem; font-size: 1.2em;" href="index.php?delete=<?php echo $row['id']; ?>"></a>
                    </div>
                </div>
        </div>
    <?php endwhile; ?>
    </div> 
     <hr>

    <form action="process.php" method="post" name="todoform" onsubmit="required()" style="text-align:center;">
    <input type="hidden" name="id" value=<?php echo $id; ?>>
    <div class="form-group">
    <input type="text" name="title" id="input1" value="<?php echo $title; ?>" onkeyup="success()" placeholder=" Title" style="border:0; border-radius:1rem; width: 24rem; height:2rem; background-color:#ebebe0;">
    </div>
    <div class="form-group">
    <textarea name="des" cols="50" rows="6" placeholder=" Description..."style="border:0; border-radius:1rem; background-color:#ebebe0;"><?php echo $des; ?></textarea>
    </div>
    <div class="form-group">
    <?php if($update==TRUE): ?>
    <button class="btn btn-info" type="submit" name="update">Update</button>
    <?php else: ?>
    <button class="btn btn-primary" type="submit" id="save1" name="save" disabled>Save</button>
    <?php endif ?>
    </div>
    </form> 
    <script>
        function required(){
            var value =  document.forms["todoform"]["title"].value;
            if(value == "")
            {
                alert("Title not entered...");
                return false;
            }
            else{
                return true;
            }
        }
        function success() {
	 if(document.getElementById("input1").value==="") { 
            document.getElementById('save1').disabled = true; 
        } else { 
            document.getElementById('save1').disabled = false;
        }
        }
    </script>

<style>
    .cardclass{
    width: 18rem; 
    box-shadow: 0 0 1rem grey;
    border-radius: .5rem;
    margin-left:1.2rem; 
    margin-bottom:1rem;
}
@media screen and (max-width: 600px){
    .cardclass, .col-sm-auto, .card-body{
        margin: .35rem auto;

    }
}
</style>

</div>      



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>      
</body>
</html>
