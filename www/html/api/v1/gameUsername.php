<?php 
parse_str(file_get_contents('php://input'), $_PATCH);
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
if($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    if(empty($_PATCH['googleid'])) {
        headerSend('400',$request_name);
        exit;
    }
    if(empty($_PATCH['ow'])) $bool['ow'] == false;
    else $bool['ow'] == true;
    if(empty($_PATCH['lol'])) $bool['lol'] == false;
    else $bool['lol'] == true;
    if(empty($_PATCH['pubg'])) $bool['pubg'] == false;
    else $bool['pubg'] == true;
    if($bool['lol']) {
        $query = "UPDATE lol_tb SET lol_username = '".$_PATCH['lol']."' WHERE googleid = '".$_PATCH['googleid']."'";
        if(mysqli_query($con,$query)) {

        } else {
            headerSend('500',$request_name);
            exit;
        }
    }
    if($bool['ow']) {
        $query = "UPDATE ow_tb SET ow_username = '".$_PATCH['ow']."' WHERE googleid = '".$_PATCH['googleid']."'";
        if(mysqli_query($con,$query)) {

        } else {
            headerSend('500',$request_name);
            exit;
        }
    }
    if($bool['pubg']) {
        $query = "UPDATE pubg_tb SET pubg_username = '".$_PATCH['pubg']."' WHERE googleid = '".$_PATCH['googleid']."'";
        if(mysqli_query($con,$query)) {

        } else {
            headerSend('500',$request_name);
            exit;
        }
    }

    headerSend(200,$request_name);
}
mysqli_close($con);
?>
