<?php 
    include('config.php');
// print_r($_POST);
    $row = array(
        'caption' => 'Create',
        'task' => '',
        'creation_date' => ''
    );
    if(isset($_POST['submit']))
    {
        if(!isset($_GET['id']))
        {
            $task= $_POST['task'];
            $date = $_POST['date'];
        
            $send_q = "INSERT INTO todo(task,creation_date) VALUES('$task','$date')";
            
            $send = mysqli_query($connection,$send_q);
            if(!$send)
            {
                  echo "sorry! Not created <br>".mysqli_error($connection);
            }
            else
            {
                echo "<div class='alert alert-success'>Congrats! Your task is created!</div>";
            }
        }
        else
        {
            // print_r($_POST);
            $id = $_GET['id'];
            $sql = "SELECT * FROM todo WHERE id='$id'";
            $row = mysqli_fetch_assoc(mysqli_query($connection, $sql));
            $row['caption'] = 'Update';

            $task= $_POST['task'];
            $date = $_POST['date'];
            $id = $_GET['id'];
            $send_q = "UPDATE todo SET task='$task', creation_date='$date' WHERE id=$id";
        
            $send = mysqli_query($connection,$send_q);
            if(!$send)
            {
                  echo "sorry! Not updated <br>".mysqli_error($connection);
        
            }
            else
            {
                echo "<div class='alert alert-success'>Congrats! Your task is updated!</div>";
            }
            $id = $_GET['id'];
            $sql = "SELECT * FROM todo WHERE id='$id'";
            $row = mysqli_fetch_assoc(mysqli_query($connection, $sql));
            $row['caption'] = 'Update';
        }
    
    }else if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM todo WHERE id='$id'";
        $row = mysqli_fetch_assoc(mysqli_query($connection, $sql));
        $row['caption'] = 'Update';
    }
?>

<!DOCTYPE html>
<html>
<head> 
<link rel ="stylesheet" type = "text/css" href ="css/style.css">
<link rel ="stylesheet" type = "text/css" href ="css/bootstrap.css">
<title> RAS-todo app |<?php $row['caption'];?></title> 
</head>

<body> 
<div class ="container">
    <a href ="index.php" class =" btn btn-sm btn-warning mt-3 ml-4" >Goto Home </a>
    
       <h1 class ="text-center mt-5" font color ="red">TODO APP </h1>
        <p class = "text-center m-4"> <b>Make & edit your daily routine here!</b></p>
     <div class ="container">
       
     <h3 class ="text-center text-dark mt-5"><?php echo $row['caption'];?> Your Task</h3>
     <form method ="POST">
          <div class ="form-group">

          <label for ="task">Task </label>
          <textarea class ="form-control" name = "task"><?php  echo $row['task'];?></textarea>
          </div>
          
          <div class ="form-group">
              <label for ="date">Creation Date</label>
              <input type ="date" class ="form-control" name ="date" value="<?php echo $row['creation_date']; ?>">
          </div>
          <input type="submit" class ="btn btn-lg btn-success mt-4"  value="<?php echo $row['caption']; ?>" name="submit"/>
     </form>


     </div>
</div>

</body>
</html>