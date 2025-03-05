<?php
session_start();
include("db/dbConnection.php");

        if (isset($_REQUEST['logout'])) {
            session_destroy();
            header("Location: index.php");
        }
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
  
  

    // SQL query to fetch user details
    $sql = "SELECT
                id,
                name,
                username,
                password
            FROM
                `user_tbl`
            WHERE
            STATUS
                = 'Active' AND username = '$username' AND PASSWORD = '$password';"; 
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $username = $row['username'];
        $password = $row['password'];

        // Set session variables
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
       
    header('Location: zenvic/index.php');
                    exit;

        }}
        ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title>Marzcafe</title>
    <style>
        #error-message {
            display: none;
            color: red;
        }
        .error {
            display: block;
        }
        .device-type {
            display: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="section-authentication-cover">
            <div class="">
                <div class="row g-0">
                    <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">
                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                            <div class="card-body">
                                <img src="assets/images/login-images/login-page.png" class="img-fluid auth-img-cover-login" width="650" alt=""/>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                        <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                            <div class="card-body p-sm-5">
                                <div class="">
                                    <div class="mb-3 text-center">
                                        <img src="assets/images/login-images/logo.png" id="logo" class="rounded" width="170" alt="">
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">Login</h5>
                                    </div>
                                    <div class="form-body">
                                        <?php if(isset($_SESSION['msg'])) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $_SESSION['msg']; session_unset(); ?>
                                            </div>
                                        <?php } ?>
                                        <form class="row g-3" action="" method="POST">
                                            <!-- <input type="hidden" id="locationName" name="location_name"> -->
                                            <!-- <input type="hidden" id="systemInfo" name="system_info"> -->
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="inputEmailAddress" placeholder="Username" value="<?php echo isset($_REQUEST['username']) ? $_REQUEST['username'] : ''; ?>">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password" value="<?php echo isset($_REQUEST['password']) ? $_REQUEST['password'] : ''; ?>">
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Login</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div id='message'><?php echo $error ?? ''; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!-- Password show & hide js -->
<script>
    $(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") === "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bx-hide");
            $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") === "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bx-hide");
            $('#show_hide_password i').addClass("bx-show");
        }
    });

   
});

$(document).ready(function() {
    // Define logo paths
    const defaultLogo = "assets/images/login-images/logo.png";
    const traineeLogo = "assets/images/login-images/nexgenlogo.png"; 

    // Check if the hostname is 'trainee.nexgenitacademy.com'
    if (window.location.hostname === "trainee.nexgenitacademy.com") {
        console.log("Trainee site detected, applying trainee logo."); // Debugging message
        $("#logo").attr("src", traineeLogo);
    } else {
        console.log("Default site detected, applying default logo."); // Debugging message
        $("#logo").attr("src", defaultLogo);
    }
});
</script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>
</html>
