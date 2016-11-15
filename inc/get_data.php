<?php

require './db_connection.php';

$sql = "select * from apps_countries";
$res = mysql_query($sql);

while ($row = mysql_fetch_assoc($res)) {
    $data[] = $row;
}
print json_encode($data);
