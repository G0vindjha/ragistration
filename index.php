<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);
session_start();

require_once 'connection.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email == 'admin@gmail.com' && $password = 'shrusti'){
        $_SESSION['id'] = 'admin';
        header("Location:listing.php");
    }
    $sql = "SELECT * FROM students_details WHERE email = '$email' AND password = $password";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $name =  $row['firstname']." ".$row['lastname'];
    $id =  $row['id'];
    if ($result->num_rows != 0) {
        $_SESSION['id'] = $id;
        $popup =  "<script>
      Swal.fire({
        icon: 'success',
        title: 'Login Success',
        text: 'Wellcome $name',
      });
      var delay = 2000;
      setTimeout(function () {
        window.location.href = 'view.php';
      }, delay);
        </script>";
    } else {
        $popup =  "<script>
      Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: 'Invalid Email or Password!!!',
      });
      var delay = 2000;
      setTimeout(function () {
        window.location.href = 'index.php';
      }, delay);
        </script>";
    }
}

require_once 'header.php';
echo $popup;
?>
<section class="gradient-custom vh-100">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-80">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Login</h2>
                        <form class="row g-3 needs-validation" method="post" novalidate>
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" value="<?php echo $email;?>" required>
                                    <div class="invalid-feedback">
                                        Enter email for login.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" value="<?php echo $password;?>" name="password" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Password.
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn gradient-custom-btn text-light" type="submit" name="submit">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once 'footer.php';
?>