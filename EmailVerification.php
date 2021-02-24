
<?php 
session_start();
include "class.php";
$verified = new Crud();
$e = $verified->email_verifieds;

$errors = [];
$email = $_SESSION['email'];


if($email == false){
  header('Location: login-user.php');
}

if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = $_POST['code'];
    $check_code = "SELECT * FROM users WHERE active_status = $otp_code";
    $result =  $verified->con->query($check_code);
    if($result->num_rows > 0){
        $fetch_data = $result->fetch_assoc();
        $fetch_code = $fetch_data['active_status'];
        $email = $fetch_data['email'];
        $status = 'verified';
        $update_otp = "UPDATE users SET active_status = '$status' WHERE active_status = $fetch_code";
        $update_res = $verified->con->query($update_otp);
        if($update_res){
            $success = "You account now is active !";
            $_SESSION['success'] = $success;
            header('location: index.php');
            
            exit();
        }else{
            $errors['otp-error'] = "Failed while updating code!";
        }
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Code Verification</title> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form  method="Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info']) && !empty($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="code" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
