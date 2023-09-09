<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

require_once 'connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM students_details WHERE `id` = $id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $gender = $row['gender'];
    $password = $row['password'];
    $email = $row['email'];
    $user_password = $row['user_password'];
    $streem = $row['streem'];
    $enrollment = $row['enrollment'];
    $phone = $row['phone'];
}
if(isset($_POST['submit']) && isset($_GET['id'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['password']);
    $streem = mysqli_real_escape_string($conn, $_POST['streem']);
    $enrollment = mysqli_real_escape_string($conn, $_POST['enrollment']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    $id = $_GET['id'];
    
    $sql = "UPDATE students_details SET firstname = $firstname, lastname = $lastname, gender = $gender, email = $email, password = $password, streem = $streem, enrollment = $enrollment, phone = $phone WHERE id = $id";

    $sql = "UPDATE students_details SET firstname=?, lastname=?, gender=?, email=?, password=?, streem=?, enrollment=?, phone=? WHERE id=?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssisi", $firstname, $lastname, $gender, $email, $user_password, $streem, $enrollment, $phone, $id);

        if ($stmt->execute()) {
            $popup =  "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Student Data Updated',
                    text: 'Thank you for Updating',
                });
                var delay = 2000;
                setTimeout(function () {
                    window.location.href = 'index.php';
                }, delay);
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_POST['submit']) && !isset($_GET['id'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['password']);
    $streem = mysqli_real_escape_string($conn, $_POST['streem']);
    $enrollment = mysqli_real_escape_string($conn, $_POST['enrollment']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $sql = "INSERT INTO students_details (firstname, lastname, gender, email, password, streem, enrollment, phone)
    VALUES ('$firstname', '$lastname', '$gender', '$email', '$user_password', '$streem', '$enrollment', '$phone')";

    if ($conn->query($sql) === TRUE) {
        $popup =  "<script>
      Swal.fire({
        icon: 'success',
        title: 'Student Added',
        text: 'Thank you for registration',
      });
      var delay = 2000;
      setTimeout(function () {
        window.location.href = 'index.php';
      }, delay);
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
require_once 'header.php';
echo $popup;
?>
<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-80">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Registration Form</h2>
                        <form class="row g-3 needs-validation" method="post" novalidate>
                            <div class="col-md-6">
                                <label for="firstname" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname;?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid first name.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname;?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid last name.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" value="<?php echo $email;?>" required>
                                    <div class="invalid-feedback">
                                        Please choose a email.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" value="<?php echo $password;?>" name="password" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Password.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="gender" class="form-label">Gender</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" <?php if($gender == 'Male'){echo 'checked';}?> />
                                    <label class="form-check-label" for="maleGender">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" <?php if($gender == 'Female'){echo 'checked';}?> />
                                    <label class="form-check-label" for="femaleGender">Female</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone No.</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Phone Number.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="streem" class="form-label">Streem</label>
                                <select class="form-select" id="streem" name="streem" required>
                                    <option disabled value="">Choose...</option>
                                    <option value="BCA" <?php if($streem == 'BCA'){echo 'selected';}?>>BCA</option>
                                    <option value="BBA" <?php if($streem == 'BBA'){echo 'selected';}?>>BBA</option>
                                    <option value="BCOM" <?php if($streem == 'BCOM'){echo 'selected';}?>>BCOM</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid streem.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="enrollment" class="form-label">Enrollment No.</label>
                                <input type="number" class="form-control" id="enrollment" name="enrollment" value="<?php echo $enrollment;?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Enrollment Number.
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