<?php
include '../conn.php';

//check connection
if($conn->connect_error){
die ("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from catefory_master WHERE cate_name = '$cate_name';";

if ($conn->query($sql) === TRUE) {

    die ("Category name already exists");

}else{

$sql = "INSERT INTO category_master (cate_name, description, created_by,created_datetime)

VALUES ('$cate_name', '$cate_des', $cate_added_by,'$cate_datetime')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>


