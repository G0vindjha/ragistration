<?php
session_start();
require_once './connection.php';
if ($_GET['id']) {
    session_unset();
    session_destroy();
}
if ($_SESSION['id'] != '') {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM students_details WHERE id = $id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $name =  $row['firstname'] . " " . $row['lastname'];
    $gender = $row['gender'];
    $email = $row['email'];
    $streem = $row['streem'];
    $enrollment = $row['enrollment'];
    $phone = $row['phone'];
} else {
    header("Location:login.php");
}
require_once './header.php'
?>
<section class="gradient-custom vh-100">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-80">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card">
                        <h5 class="card-header"><?php echo $email; ?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $name; ?></h5>
                            <p class="card-text">
                                <?php
                                echo "Gender : " . $gender . "<br>";
                                echo "Gender : " . $email . "<br>";
                                echo "Streem : " . $streem . "<br>";
                                echo "Enrollment : " . $enrollment . "<br>";
                                echo "Phone : " . $phone . "<br>";
                                ?>

                            </p>
                            <a href="view.php?id=<?php echo $id; ?>" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once './footer.php';
?>