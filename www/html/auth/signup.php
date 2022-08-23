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

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $data['googleid'] = $_POST['googleid'];
    $data['username'] = $_POST['username'];
    $data['email'] = $_POST['email'];
    $data['lol'] = $_POST['lol'];
    $data['ow'] = $_POST['ow'];
    $data['pubg'] = $_POST['pubg'];
    if(empty($data['googleid']) || empty($data['username']) || empty($data['email']) ) {
        headerSened('400',$request_name);
        exit;
    }
    if(empty($data['lol'])) $data['lol'] = null;
    if(empty($data['ow'])) $data['ow'] = null;
    if(empty($data['pubg'])) $data['pubg'] = null;

    $query = "INSERT INTO user_tb (googleid,username,email) VALUES ('".$data['googleid']."','".$data['username']."','".$data['email']."')";
    if(mysqli_query($con,$query)) {
        
    } else {
        headerSend('500',$request_name);
        exit;
    }
    $query = "INSERT INTO lol_tb (googleid,lol_username) VALUES ('".$data['googleid']."','".$data['lol']."')";
    if(mysqli_query($con,$query)) {
        
    } else {
        headerSend('500',$request_name);
        exit;
    }
    $query = "INSERT INTO ow_tb (googleid,ow_username) VALUES ('".$data['googleid']."','".$data['ow']."')";
    if(mysqli_query($con,$query)) {
        
    } else {
        headerSend('500',$request_name);
        exit;
    }
    $query = "INSERT INTO pubg_tb (googleid,pubg_username) VALUES ('".$data['googleid']."','".$data['pubg']."')";
    if(mysqli_query($con,$query)) {
        
    } else {
        headerSend('500',$request_name);
        exit;
    }
    $query = "INSERT INTO lamppoint_tb (googleid,username,pointcount,lamppoint) VALUES ('".$data['googleid']."','".$data['username']."',0,0)";
    if(mysqli_query($con,$query)) {

    } else {
        headerSend('500',$request_name);
        exit;
    }

    headerSend('200',$request_name);
    exit;
}
?>
