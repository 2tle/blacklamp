<?php 
require './config.php';
header('Content-Type: application/json; charset=UTF-8');
$api_key = md5($_GET['api_key']);
$request_name = 'null';
$api_key_result = isApiKeyTrue($api_key);
if(!$api_key_result) {
    exit;
} else {
    $request_name = $api_key_result;
} 
$con = new mysqli('localhost','lampstudio','ieelte1214','user_db');
if(!$con) {
    headerSend('500', $request_name);
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $username = urldecode($_GET['username']);
    $googleid = '';
    $data = array();
    $query = "SELECT * FROM user_tb WHERE username='".$username."'";
    $result = mysqli_query($con,$query);
    if(!$result) {
        headerSend('500',$request_name);
        exit;
    }
    if(mysqli_num_rows($result) != 1) {
        headerSend('404', $request_name);
    }
    while($row = mysqli_fetch_array($result)) {
        $data['ubase']['googleid'] = $row['googleid'];
	    $googleid = $row['googleid'];
        $data['ubase']['username'] = $row['username'];
        $data['ubase']['lamppoint'] = $row['lamppoint'];
    }

    $query = "SELECT * FROM lol_tb WHERE googleid='".$googleid."'";
    $result = mysqli_query($con,$query);
    if(!$result) {
        headerSend('500',$request_name);
        exit;
    }
    if(mysqli_num_rows($result) != 1) {
        $data['lol'] = null;
    } else {
        while($row = mysqli_fetch_array($result)) {
            $data['lol']['username'] = $row['lol_username'];
            $data['lol']['solo'] = $row['lol_solo_tier'];
            $data['lol']['team'] = $row['lol_team_tier'];
	        $api_key = 'RGAPI-47c561bc-530a-4cd4-9c55-47f8cd50c7e4';
	        $url = 'https://kr.api.riotgames.com/lol/summoner/v4/summoners/by-name/'.$data['lol']['username'].'?api_key='.$api_key;
	        $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 
            $response = curl_exec ($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
	        $result_api = json_decode($response, true);
	        $data['lol']['profileIconId'] = $result_api['profileIconId'];

	    
        }
    }

    $query = "SELECT * FROM ow_tb WHERE googleid='".$googleid."'";
    $result = mysqli_query($con,$query);
    if(!$result) {
        headerSend('500',$request_name);
        exit;
    }
    if(mysqli_num_rows($result) != 1) {
        $data['ow'] = null;
    } else {
        while($row = mysqli_fetch_array($result)) {
            $data['ow']['username'] = $row['ow_username'];
            $data['ow']['tanker'] = $row['ow_tanker_tier'];
            $data['ow']['dealer'] = $row['ow_dealer_tier'];
            $data['ow']['healer'] = $row['ow_healer_tier'];
        }
    }

    $query = "SELECT * FROM pubg_tb WHERE googleid='".$googleid."'";
    $result = mysqli_query($con,$query);
    if(!$result) {
        headerSend('500',$request_name);
        exit;
    }
    if(mysqli_num_rows($result) != 1) {
        $data['pubg'] = null;
    } else {
        while($row = mysqli_fetch_array($result)) {
            $data['pubg']['username'] = $row['pubg_username'];
            $data['pubg']['solo'] = $row['pubg_solo_tier'];
            $data['pubg']['duo'] = $row['pubg_duo_tier'];
            $data['pubg']['squad'] = $row['pubg_squad_tier'];
        }
    }

    headerSend('200',$request_name);
    echo json_encode(array('profile' => $data));
    


}
mysqli_close($con);
?>
