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
                        <h1 style="text-transform:uppercase; font-weight:700; margin-left:10px">Add a student Information</h1>
                    </div>
                    <?php 
                        if(isset($_POST['btn'])){
                            $studentName = $_POST['name'];
                            $studentRoll = $_POST['roll'];
                            if(!empty($studentName)  && !empty($studentRoll)){
                                $studentDataQuery = "INSERT INTO students(name, roll) VALUE('$studentName', $studentRoll)";
                                $studentDataInput = mysqli_query($conn, $studentDataQuery);
                                if($studentDataInput){
                                    echo "Data Added Successfully";
                                }
                            }else{
                                echo "Fields should be require";
                               
                            }
                        }

                    ?>
                    <div class="form-container shadow p-3 m-2"> 
                        <form action="" method="POST">
                            <label for="name">Your Name</label>
                            <input class="form-control" type="text" name="name" id="name">
                            <label for="roll">Roll Number</label>
                            <input class="form-control" type="number" name="roll" id="roll">
                            <input class="mt-3 btn btn-primary" name="btn" type="submit" value="Submit">
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

