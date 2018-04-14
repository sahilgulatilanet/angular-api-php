<?php

$con=mysqli_connect('localhost','root','','angulardb');

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array('status' => false));
    exit;
}

$path='uploads/';
if(isset($_FILES['avtar'])) {
    $originalName = $_FILES['avtar']['name'];
    $target_file=$path.$originalName;
    move_uploaded_file($_FILES["avtar"]["tmp_name"], $target_file);
    $filePath = $path.$generatedName;
    $sql = "INSERT INTO studimg( snm, simg) VALUES ('" . $_POST['name'] . "','" . $originalName . "')";
    $r = mysqli_query($con, $sql);
    echo json_encode(
        array('status' => true, 'msg' => 'file uploaded.','filename'=>$originalName,'path'=>$filePath,'nm'=>$_POST['name'])
    );
}
else {
    echo json_encode(
        array('status' => false, 'msg' => 'No file uploaded.')
    );
    exit;
}