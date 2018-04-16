<?php
header("Access-Control-Allow-Origin: *");
class apiclass
{
    public $con;
    var $sql;
    function __construct(){
        $this->con=mysqli_connect("localhost","root","","angulardb");
    }
    function insertStud($n,$a){

        $this->sql="INSERT INTO stud(snm, sad) VALUES ('".$n."','".$a."')";
        $result=mysqli_query($this->con,$this->sql);
        $data="";
        $data->nm=$n;
        $data->ad=$a;
        echo json_encode($data);
    }
    function viewstud(){
        $this->sql="select * from stud";
        $result=mysqli_query($this->con,$this->sql);
        $r=[];
        $i=0;
        while ($row=mysqli_fetch_assoc($result)){
            //echo json_encode($row);
            $r[$i++]=$row;
        }
        echo json_encode($r);
    }
    function delstud($id){
        $this->sql="Delete from stud WHERE sid=".$id;
        $result=mysqli_query($this->con,$this->sql);
        echo json_encode("deleted");
    }
    function updstud($id,$nm,$ad){
        $this->sql="UPDATE stud SET snm='".$nm."',sad='".$ad."' WHERE sid=".$id;
        $result=mysqli_query($this->con,$this->sql);
        echo json_encode("updated");
    }
}
$obj=new apiclass();
/*if($_REQUEST['action']=='insstud'){
//    $data = json_decode(file_get_contents("php://input"));
//    echo json_encode($data);
    $nm=$_REQUEST['nm'];
    $ad=$_REQUEST['ad'];
    //echo json_encode($nm);
    $obj->insertStud($nm,$ad);
}
elseif ($_REQUEST['action']=='viewstud'){
    $obj->viewstud();
}
elseif ($_REQUEST['action']=='delstud'){
    $id=$_REQUEST['id'];
    echo json_encode($id);
    $obj->delstud($id);
}
elseif ($_REQUEST[action]=='updstud'){
    $id=$_REQUEST['id'];
    $nm=$_REQUEST['nm'];
    $ad=$_REQUEST['ad'];
    $obj->updstud($id,$nm,$ad);
}*/
$r=$_REQUEST['action'];
switch ($r){
    case 'insstud':
        $nm=$_REQUEST['nm'];
        $ad=$_REQUEST['ad'];
        $obj->insertStud($nm,$ad);
        break;
    case 'viewstud':
        $obj->viewstud();
        break;
}