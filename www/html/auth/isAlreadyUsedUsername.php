<?php 
require './config.php';
header('Content-Type: application/json; charset=UTF-8');
// api_key 받아와서 검증.
$api_key = md5($_GET['api_key']);
$request_name = 'null';
$api_key_result = isApiKeyTrue($api_key);
if(!$api_key_result) {
    exit;
} else {
    $request_name = $api_key_result;
}
//db 연결 
$con = new mysqli('localhost','lampstudio','ieelte1214','user_db');
if(!$con) {
    headerSend('500', $request_name);
    exit;
}
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $query = "SELECT * FROM user_tb WHERE username='".$_GET['username']."'";
    $result = mysqli_query($con,$query);
    if(!$result) {
        headerSend('500',$request_name);
        exit;
    }
    $cnt = mysqli_num_rows($result);
    if($cnt == 1) {
        headerSend('200',$request_name);
        echo json_encode(array('result' => true));
    } else {
        headerSend('200',$request_name);
        echo json_encode(array('result' => false));
    }
}
mysqli_close($con);
?>
