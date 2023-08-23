<?php
include('partials/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="main.scss">
</head>
<body>
<div class="register_container">
        <div class="overlay">
            <!--tidak ada konten-->
        </div>
        <div class="titleDiv">
            <h1 class="title">Register</h1>
            <span class="subTitle">Thanks for choosing us!</span>
        </div>

        <form action="" method="POST">
            <div class="row grid">
                <div class="rows">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="rows">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="rows">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="rows">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="row">
                    <input type="submit" id="submitBtn" name="submit" value="Register" required>
                    <span class="registerLink">Have an account already?
                        <a class="text" style="text-decoration:none" href="halaman.php">Login</a></span>
                </div>
            </div>
        </form>
    </div>

<?php
include('partials/footer.php');
?> 

<!-- Let us register a new account to the database and Later Login with the same account -->

<?php
if (isset($_POST['submit'])) {

    //variables
    $username = $_POST['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    $phone = $_POST ['phone'];

    //state out query
    $sql = "INSERT INTO admin SET
            username = '$username',
            email = '$email',
            password = '$password',
            phone = '$phone'    
    ";
    //execute our sql query
    $res = mysqli_query($conn, $sql);
    //check if query executed successfuly
    if($res == true) {
        //message to show account created successfuly
        $_SESSION['accountcreated'] = '<span class = "sukses ">Akun '.$username.' dibuat!</span>';
        header('location: halaman.php');
        exit();
    }
    else {
        //message to show that account failed to be created
        $_SESSION['unsuccessful'] = '<span class = "gagal">Akun '.$username.' gagal!</span>';
        header('location:' .SITEURL. 'register.php'); 
        exit();
    }
}
?>

</body>
</html>