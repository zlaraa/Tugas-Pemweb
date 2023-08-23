<?php
include('partials/header.php');
?>

    <?php
    if(isset($_SESSION['accountcreated'])) {
        echo $_SESSION['accountcreated'];
        unset($_SESSION['accountcreated']); 
    }
    ?>

    <div class="form_container">
        <div class="overlay">
            <!--tidak ada konten-->
        </div>
        <div class="titleDiv">
            <h1 class="title">Login</h1>
            <span class="subTitle">Welcome Back!</span>
        </div>

        <?php
        if(isset($_SESSION['noadmin'])) {
            echo $_SESSION['noadmin'];
            unset($_SESSION['noadmin']);
        }
        ?>

        <form action="" method="POST">
            <div class="row grid">
                <div class="rows">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="rows">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="row">
                    <input type="submit" id="submitBtn" name="submit" value="Login" required>
                    <span class="registerLink">Don't have an account? 
                        <a class="text" style="text-decoration:none" href="register.php">Register</a></span>
                </div>
            </div>
        </form>
    </div>

<?php
include('partials/footer.php');
?>

<!--Let login to the database-->
<?php

if(isset($_POST['submit'])) {
    // echo 'Ya, data di kirim';
    // Let us create variablesto store username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // sql to select if there's the details in database
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    //Execute the query
    $result = mysqli_query($conn, $sql);

    //Count the number of account with same username and password
    $count = mysqli_num_rows($result);
    //put the count results into one associate array
    $row = mysqli_fetch_assoc($result);

    //check if there's at least one account in the database
    if($count ==1) {
    //message  to welcome admin to the dashboard
        $_SESSION['loginmessage'] = '<span class="sukses">Selamat datang '.$username.'</span>';
        header('location: dashboard.php');
        exit();
    }
    //message if the admin is not the database
    else {
        $_SESSION['noadmin'] = '<span class="gagal">'.$username.' tidak dapat login </span>';
        header('location:' . 'halaman.php');
        exit();
    }
}

