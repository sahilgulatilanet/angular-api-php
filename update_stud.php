<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
if($request!=null) {
    $con = mysqli_connect("localhost", "root", "", "angulardb");
    $sql = "UPDATE stud SET snm='".$request->nm."',sad='".$request->ad."' WHERE sid=".$request->id;
    $r = mysqli_query($con, $sql);
}
$res;
if($r)
{
    $res->result="Updated";
}
else{
    $res->result="Not Updated";
}
echo json_encode($res);
?>