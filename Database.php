<?php

class Database {

    private $host = 'localhost';
    private $login = 'root';
    private $password = 'root';
    private $db_name = 'contact_list';

    private $link;

    public function __construct() {
        $this->link = mysqli_connect($this->host, $this->login, $this->password);
        $this->init_db();
        $this->query('CREATE TABLE IF NOT EXISTS contacts (
            id int NOT NULL AUTO_INCREMENT,
            name varchar(50),
            phone varchar(20),
            timestamp int(10),
            PRIMARY KEY (id)
        )');
    }

    private function init_db() {
        if (!mysqli_select_db($this->link, $this->db_name)) {
            $this->link->query('CREATE DATABASE ' . $this->db_name);
            mysqli_select_db($this->link, $this->db_name);
        }
        return true;
    }

    public function query($query) {
        return $this->link->query($query);
    }
}