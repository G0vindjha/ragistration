<?php
if(isset($_GET['id'])){
    require_once './connection.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM students_details WHERE `id` = $id";
    if ($conn->query($sql) === TRUE) {
        $popup =  "<script>
      Swal.fire({
        icon: 'success',
        title: 'Student Record Deleted',
        text: 'You Have Deleted One Record',
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
require_once './header.php';
echo $popup;
?>