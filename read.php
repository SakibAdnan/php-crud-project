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
                        <h1 style="text-transform:uppercase; font-weight:700; margin-left:10px">Students Information</h1>
                    </div>
                    <?php 
                        if(isset($_GET['delete'])){
                            $studentInfoDelete = "DELETE FROM students WHERE id={$_GET['delete']}";
                            $deleteQuery = mysqli_query($conn, $studentInfoDelete);
                            if($deleteQuery){
                                echo "The {$_GET['delete']} number Student Info Delete Successfully";
                            }
                        }
                    ?>
                    <div class="table-container shadow p-3 m-2"> 
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Student Roll</th>
                                <th>Update Info</th>
                                <th>Delete</th>
                            </tr>
                            <?php 
                                $studentQuery = "SELECT * FROM students ";
                                $studentDataRead = mysqli_query($conn, $studentQuery);
                                if($studentDataRead->num_rows>0):
                                    while($studentData = mysqli_fetch_assoc($studentDataRead)):
                                        $studentID = $studentData['id'];
                                        $studentName = $studentData['name'];
                                        $studentRoll = $studentData['roll'];
                            ?>
                                <tr >
                                        <td><?php echo $studentID; ?></td>
                                        <td><?php echo $studentName; ?></td>
                                        <td><?php echo $studentRoll; ?></td>
                                        <td class="text-center">
                                            <a href="update.php?update=<?php echo $studentID; ?>" class="btn btn-info">Update</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="read.php?delete=<?php echo $studentID; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                </tr>
                            <?php 
                                    endwhile;
                                endif;
                            ?>
                        </table>
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

