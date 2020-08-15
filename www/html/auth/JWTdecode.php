<?php
require 'config.php';
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
//임시적인 JWT로 sub값을 가져오는 방법. 테스트 용에서만 사용.
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jwt = $_POST['jwt'];
    $jwt_arr = explode('.',$jwt);
    $json_string = base64_decode($jwt_arr[1]);
    $json = json_decode($json_string);
    headerSend('200',$request_name);
    $json = get_object_vars($json);
    echo json_encode(array('email' => $json['email'], 'sub' => $json['sub']));

}
?>
