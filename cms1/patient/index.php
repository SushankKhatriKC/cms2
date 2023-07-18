<?php
session_start();
include("../include/connection.php");

if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $user = $_SESSION['patient'];

    if (empty($title)) {
        echo "<script>alert('Enter Title');</script>";
    } else if (empty($message)) {
        echo "<script>alert('Enter Message');</script>";
    } else {
        $query = "INSERT INTO report (title, message, username, date) VALUES ('$title', '$message', '$user', NOW())";
        $res = mysqli_query($connect, $query);

        if ($res) {
            echo "<script>alert('You have sent your report');</script>";
        } else {
            echo "<script>alert('Failed to send report');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
</head>
<body>
    <?php include("../include/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php include("sidenav.php"); ?>
            </div>
            <div class="col-md-10">
                <h5 class="my-3">Patient Dashboard</h5>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">My Profile</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="profile.php">
                                            <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="text-white my-4">Book Appointment</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="appointment.php">
                                        <i class="fa fa-user-calendar fa-3x my-4" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="text-white my-4">My Invoice</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="#">
                                        <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="text-white my-4">Send A Report</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="#">
                                        <i class="fa fa-user fa-3x my-4" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="text-white my-4">My Invoice</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="#">
                                        <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron bg-info my-5">
                                <h5 class="text-center my-2">Send A Report</h5>
                                <form method="post">
                                    <label>Title</label>
                                    <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report">
                                    <label>Message</label>
                                    <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message">
                                    <input type="submit" name="send" class="btn btn-success my-2" value="Send Report">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
