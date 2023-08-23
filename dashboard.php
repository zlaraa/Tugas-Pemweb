<?php
include('partials/header.php');
?>

    <div class="dashboard">
        <span>
            <?php
            if(isset($_SESSION['loginmessage'])) {
                echo $_SESSION['loginmessage'];
                unset($_SESSION['loginmessage']);
            }
            ?>
            
        </span>
        <h1 class="h1text">Dashboard</h1>
        <div class="logOutBtn">
            <a class="logout" href="logout.php">Log Out</a>
        </div>
    </div>

<?php
include('partials/footer.php');
?>