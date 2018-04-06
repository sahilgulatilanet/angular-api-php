<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
if($request!=null) {
    $con = mysqli_connect("localhost", "root", "", "angulardb");
    $sql = "INSERT INTO stud( snm, sad) VALUES ('" . $request->nm . "','" . $request->ad . "')";
    $r = mysqli_query($con, $sql);
}
$res;
if($r)
{
    $res->result="Inserted";
}
else{
    $res->result="Not Inserted";
}
echo json_encode($res);
?>