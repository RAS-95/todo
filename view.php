<?php
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Task list</title>
</head>
<body>
<a href ="index.php" class =" btn btn-sm btn-warning mt-3 ml-4" >Goto Home </a>
    <h2 style="margin-left: 45%;">Task list</h2>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Task</th>
                <th>Deadline</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = mysqli_query($connection, "SELECT * FROM todo");
                if(mysqli_num_rows($result)>0)
                {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo 
                        '
                        <tr class="success">
                            <td>'.$row["id"].'</td>
                            <td>'.$row["task"].'</td>
                            <td>'.$row["creation_date"].'</td>
                            <td>
                                <a href="http://localhost/todo/create.php?id='.$row["id"].'"><button class="btn btn-primary btn-md">Edit</button></a>
                                <a href="http://localhost/todo/delete.php?id='.$row["id"].'"><button class="btn btn-danger btn-md">Delete</button></a>
                            </td>
                        </tr>
                        ';
                    }
                }else{
                    echo 
                    '
                    <tr class="danger">
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    ';                 
                }
            ?>
        </tbody>
    </table>
</body>
</html>