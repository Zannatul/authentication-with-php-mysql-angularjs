<?php

class Db_connection {

    private $hostName = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $databaseName = 'angularAuthentication';
    public $link = '';
    public $error = '';

    public function __construct() {
        $this->connectDb();
    }

    private function connectDb() {
        $this->link = mysqli_connect($this->hostName, $this->userName, $this->password, $this->databaseName);
        if (!$this->link) {
            echo 'Connection Error' . $this->link->connect_error();
            return FALSE;
        }
    }

    public function getAuthData($username, $password) {
        $querySql = "select * from user where username='$username' and password = '$password'";
        $result = $this->link->query($querySql) or die($this->link->error . __LINE__);

        if ($result->num_rows == 1) {
           return mysqli_fetch_object($result);
        } else {
            return FALSE;
        }
    }

}
