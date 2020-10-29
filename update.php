<?php 
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQLI CRUD Project</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" />   
</head>
<body>
    <section class="main-container mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <nav class="navbar navbar-expand-lg navbar-light shadow mt-3">
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                            <a class="nav-item nav-link " href="index.php">Create Student Info </a>
                            <a class="nav-item nav-link" href="read.php">View Student Data</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="main-content">
                        <h1 style="text-transform:uppercase; font-weight:700; margin-left:10px">Edit Student Info</h1>
                    </div>
                    <div class="form-container shadow p-3 m-2"> 
                        <form action="" method="POST">
                            <?php
                                if(isset($_GET['update'])):
                                $update_ID = "SELECT * FROM students WHERE id={$_GET['update']}";
                                $updateQuery = mysqli_query($conn, $update_ID);
                                while($studentInfo = mysqli_fetch_assoc($updateQuery)):
                                    $updateId = $studentInfo['id'];
                                    $updateName = $studentInfo['name'];
                                    $updateRoll = $studentInfo['roll'];
                                
                            ?>
                                <label for="name">Edit Your Name</label>
                                <input class="form-control" type="text" name="name" id="name" value="<?php echo $updateName?>">
                                <label for="roll">Edit Roll Number</label>
                                <input class="form-control" type="number" name="roll" id="roll" value="<?php echo $updateRoll?>">
                                <input class="mt-3 btn btn-primary" name="update_btn" type="submit" value="update">
                            <?php 
                                endwhile;
                            endif;  
                            ?>
                            <?php 

                                if(isset($_POST['update_btn'])){
                                    $updatedName = $_POST['name'];
                                    $updatedRoll = $_POST['roll'];
                                    $updatedData = "UPDATE students SET name='$updatedName', roll={$updatedRoll} WHERE id=$updateId";
                                    $dataUpdatedQ = mysqli_query($conn, $updatedData);
                                    if($dataUpdatedQ){
                                        echo "Information Is Updated";
                                    }
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

