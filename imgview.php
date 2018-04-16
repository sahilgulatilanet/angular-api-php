<?php

$con=mysqli_connect('localhost','root','','angulardb');

header("Access-Control-Allow-Origin: *");




    $sql = "SELECT * FROM studimg";
    $r = mysqli_query($con, $sql);
    $res;
    $i=0;
    while($row=mysqli_fetch_assoc($r)){
        $res[$i++]=$row;
    }
    echo json_encode($res);


