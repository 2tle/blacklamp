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
//get post method 따라서 요청 처리
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $return_arr = array();
    $query = "SELECT * FROM partypost_tb ORDER BY idx DESC";
    $result = mysqli_query($con,$query);
    if(!$result) {
        headerSend('500',$request_name);
        exit;
    }
    while($row = mysqli_fetch_array($result)) {
        $arr['googleid'] = $row['googleid'];
        $arr['username'] = $row['username'];
        $arr['type'] = $row['gametype'];
        $arr['title'] = $row['title'];
        $arr['address'] = $row['discord_address'];
	$arr['address'] = "http://api.lampstudio.xyz/discord?ownerid=".$arr['googleid']."&discord=".$arr['address']."&playerid=";
        $arr['tier'] = $row['user_tier'];
        array_push($return_arr,$arr);
    }
    headerSend('200',$request_name);
    echo json_encode(array('ppost' => $return_arr));

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data['googleid'] = $_POST['googleid'];
    $data['username'] = $_POST['username'];
    $data['title'] = $_POST['title'];
    $data['type'] = $_POST['type'];
    $data['link'] = $_POST['link'];
    $data['tier'] = "";

    if(empty($data['googleid']) or empty($data['username']) or empty($data['title']) or empty($data['link'])) {
        headerSend('400',$request_name);
        exit;
    }

    if($data['type'] == '0') {
        $query = "SELECT * FROM lol_tb WHERE googleid='".$data['googleid']."'";
        $result = mysqli_query($con,$query);
        if(!$result) {
            headerSend('500',$request_name);
            exit;
        } else {
            while($row = mysqli_fetch_array($result)){
                $data['tier'] = $row['lol_solo_tier'];
            }
        }
    } else if($data['type'] == '1') {
        $query = "SELECT * FROM ow_tb WHERE googleid='".$data['googleid']."'";
        $result = mysqli_query($con,$query);
        if(!$result) {
            headerSend('500',$request_name);
            exit;
        } else {
            while($row = mysqli_fetch_array($result)){
                $data['tier'] = $row['ow_dealer_tier'];
            }
        }

    } else if($data['type'] == '2') {
        $query = "SELECT * FROM pubg_tb WHERE googleid='".$data['googleid']."'";
        $result = mysqli_query($con,$query);
        if(!$result) {
            headerSend('500',$request_name);
            exit;
        } else {
            while($row = mysqli_fetch_array($result)){
                $data['tier'] = $row['pubg_solo_tier'];
            }
        }

    }

    $query = "INSERT INTO partypost_tb (googleid,username,gametype,title,discord_address,user_tier) VALUES ('".$data['googleid']."','".$data['username']."','".$data['type']."','".$data['title']."','".$data['link']."','".$data['tier']."')";
    $result = mysqli_query($con,$query);
    if(!$result) {
        headerSend('500',$request_name);
        exit;
    } else {
        headerSend('200',$request_name);
        exit;
    }
}
mysqli_close($con);


?>
