<?php 
$con = new mysqli("localhost","lampstudio","ieelte1214","user_db");
if(!$con) {
    echo "<script>document.location.href='https://api.lampstudio.xyz/errorpage/500.html';</script>";
    exit;
}
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $ownerid = $_GET['ownerid'];
    $joinid = $_GET['playerid'];
    $discord = $_GET['discord'];
    if(empty($ownerid) or empty($joinid) or empty($discord)){
        echo "<script>document.location.href='https://api.lampstudio.xyz/errorpage/400.html';</script>";
        exit;
    }
    $query = "INSERT INTO partyjoin_tb (ownerid,joinid,discord) VALUES ('".$ownerid."','".$joinid."','".$discord."')";
    $result = mysqli_query($con,$query);
    if(!$result) {
        echo "<script>document.location.href='https://api.lampstudio.xyz/errorpage/500.html';</script>";
        exit;
    } else {
        echo "<script>document.location.href='".$discord."';</script>";
    }

}
mysqli_close($con);
?>
