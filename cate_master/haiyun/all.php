<?php
include '../conn.php';

$cate_name= $_POST['name'];
$cate_des= $_POST['description'];
$cate_added_by= $_POST['created_by'];
$cate_datetime= date("Y-m-d H:i:s");
//check connection
if($conn->connect_error){
die ("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM category_master;";


$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)){
    
    $cate_id = $row["category_id"];
    $cate_name = $row['cate_name'];
    $cate_des = $row['description'];
    $created_by = $row['created_by'];
    $cate_datetime=$row['created_datetime'];

   

    $return_arr[] = array("cate_id" => $cate_id,
                    "cate_name" => $cate_name,
                    "cate_des"=>$cate_des,
                    "created_by" => $created_by,
                    "cate_datetime" => date($cate_datetime));
}
echo json_encode($return_arr);
$conn->close();
?>