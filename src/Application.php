<?php

namespace App;

class Application {

    /**
     * 
     * @var Database
     */
    public $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function run(){
        return $this->database->host;
    }
}

?>