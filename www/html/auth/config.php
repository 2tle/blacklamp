<?php
header('Content-Type: application/json; charset=UTF-8');

function headerSend($status, $name) {
    $status_text = '';
    switch($status) {
        case '200':
            $status_text = ' OK';
            break;

        case '400':
            $status_text = ' Bad Request';
            break;
        case '401':
            $status_text = ' Unauthorized';
            break;
        case '404':
            $status_text = ' Not Found';
            break;
        case '500':
            $status_text = ' Internal Server Error';
            break;
        case '101':
            $status_text = ' Test ERR';
            break;
    }
    header('HTTP/1.1 '.$status.$status_text);
    header("Request-Name: ".$name);
}


function isApiKeyTrue($api_key) {
    $temp = '';
    if(empty($api_key)) {
        headerSend('401','null');
        return false;
    }
    $api_con = new mysqli("localhost","lampstudio","ieelte1214","api_db");
    $result = mysqli_query($api_con,"SELECT * FROM api_key_tb WHERE api_key_md5='".$api_key."'");
    if(mysqli_num_rows($result) != 1) {
        headerSend('401','null');
        return false;
    }
    while($row = mysqli_fetch_array($result)) {
        $temp = $row['name'];
    }

    return $temp;
}


?>
