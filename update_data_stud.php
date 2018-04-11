<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
if($request!=null) {
    $con = mysqli_connect("localhost", "root", "", "angulardb");
    $sql = "select * from stud WHERE sid=" . $request->id;
    $r = mysqli_query($con, $sql);
    $res;

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        //print_r($row);
       $res->id=$row['sid'];
       $res->nm=$row['snm'];
       $res->ad=$row['sad'];
    }
    echo json_encode($res);

}