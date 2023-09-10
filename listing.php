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
    $updateBtn = "<a href='addStudent.php?id=".$value['id']."' type='button' class='btn btn-outline-success'>Update</a>";
    $deleteBtn = "<a href='delete.php?id=".$value['id']."' type='button' class='btn btn-outline-danger'>Delete</a>";
    $viewBtn ="<a href='view.php?admin_view_id=".$value['id']."' type='button' class='btn btn-outline-warning'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
    <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
    <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
  </svg></a>"; 
    $tabledata .= "<tr>
    <td>$sr</td>
    <td>$name</td>
    <td>$gender</td>
    <td>$enrollment</td>
    <td>$streem</td>
    <td>$email</td>
    <td>$phone</td>
    <td>$updateBtn $deleteBtn $viewBtn</td>
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