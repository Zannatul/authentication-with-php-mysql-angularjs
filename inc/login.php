<?php

require_once '../inc/db_connection.php';

$db = new Db_connection();

$data = json_decode(file_get_contents('php://input'));
$username = $data->username;
$password = $data->password;

$is_authenticate = $db->getAuthData($username, md5($password));

$resultData = array(
    'id' => $is_authenticate->id,
    'username' => $is_authenticate->username
);

print json_encode($resultData);
