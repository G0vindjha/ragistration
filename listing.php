<?php
require_once 'connection.php';
$sql = "SELECT * FROM students_details"; 
$result = $conn->query($sql);

$tabledata = "";
$sr = 0;
if(empty($result->num_rows)){
    $tabledata = "<tr><td colspan='8'> <div class = 'text-center text-danger' >No Record found </div></td></tr>";
}
foreach ($result as $value) {
    $sr++;
    $name = $value['firstname']." ".$value['lastname'];
    $gender = $value['gender'];
    $enrollment = $value['enrollment'];
    $streem = $value['streem'];
    $email = $value['email'];
    $phone = $value['phone'];
    $updateBtn = "<a href='addStudent.php?id=".$value['id']."' type='button' class='btn btn-outline-success'>update</a>";
    $deleteBtn = "<a href='delete.php?id=".$value['id']."' type='button' class='btn btn-outline-danger'>delete</a>";
    $tabledata .= "<tr>
    <td>$sr</td>
    <td>$name</td>
    <td>$gender</td>
    <td>$enrollment</td>
    <td>$streem</td>
    <td>$email</td>
    <td>$phone</td>
    <td>$updateBtn $deleteBtn</td>
    </tr>";

}
require_once './header.php';
?>
<div class="gradient-custom text-light text-center py-2 mb-4">
    <h1>Student List</h1>
</div>
<div class="d-flex justify-content-end mb-3 col-11">
    <a href="./addStudent.php" type="button" class="btn gradient-custom-btn">Add Student</a>
</div>
<div class="col-10 d-flex justify-content-center mx-auto">
<table class="table table-striped">
    <tr>
        <th>SR</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Enrollment</th>
        <th>Stream</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>
  <?php echo $tabledata;?>
</table>
</div>

<?php 
require_once './footer.php';
?>