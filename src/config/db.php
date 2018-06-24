<?php
/**
 * Created by PhpStorm.
 * User: Nejc
 * Date: 24. 06. 2018
 * Time: 17:24
 */


class db
{
    private $deploymentTarget = null;
    private $dbhost = null;
    private $dbuser = null;
    private $dbpass = null;
    private $dbname = null;

    // Connect
    public function connect()
    {
        $this->setupCredentials();
        $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
        $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
    private function setupCredentials() {
        $settings = require __DIR__ . '../settings.php';

        $this->deploymentTarget = $settings["settings"]["deployment_target"];
        $this->dbhost = $settings["settings"]["database_credentials"][$this->deploymentTarget]["host"];
        $this->dbuser = $settings["settings"]["database_credentials"][$this->deploymentTarget]["user"];
        $this->dbpass = $settings["settings"]["database_credentials"][$this->deploymentTarget]["pass"];
        $this->dbname = $settings["settings"]["database_credentials"][$this->deploymentTarget]["name"];
    }
}