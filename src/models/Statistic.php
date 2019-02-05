<?php
/**
 * Created by PhpStorm.
 * User: Nejc
 * Date: 5. 02. 2019
 * Time: 17:14
 */

class statistic
{
    private $HTTP_ACCEPT_LANGUAGE = null;
    private $HTTP_ACCEPT_ENCODING = null;
    private $HTTP_ACCEPT = null;
    private $HTTP_USER_AGENT = null;
    private $HTTP_UPGRADE_INSECURE_REQUESTS = null;
    private $HTTP_CONNECTION = null;
    private $HTTP_HOST = null;
    private $REDIRECT_STATUS = null;
    private $SERVER_NAME = null;
    private $SERVER_PORT = null;
    private $SERVER_ADDR = null;
    private $REMOTE_PORT = null;
    private $REMOTE_ADDR = null;
    private $SERVER_SOFTWARE = null;
    private $GATEWAY_INTERFACE = null;
    private $REQUEST_SCHEME = null;
    private $SERVER_PROTOCOL = null;
    private $DOCUMENT_ROOT = null;
    private $REQUEST_URI = null;
    private $SCRIPT_NAME = null;
    private $REQUEST_METHOD = null;
    private $QUERY_STRING = null;
    private $SCRIPT_FILENAME = null;
    private $PHP_SELF = null;
    private $REQUEST_TIME_FLOAT = null;
    private $REQUEST_TIME = null;
    private $LAT = null;
    private $LNG = null;
    private $META_DATA = null;

    public function setData(
        $HTTP_ACCEPT_LANGUAGE,
        $HTTP_ACCEPT_ENCODING,
        $HTTP_ACCEPT,
        $HTTP_USER_AGENT,
        $HTTP_UPGRADE_INSECURE_REQUESTS,
        $HTTP_CONNECTION,
        $HTTP_HOST,
        $REDIRECT_STATUS,
        $SERVER_NAME,
        $SERVER_PORT,
        $SERVER_ADDR,
        $REMOTE_PORT,
        $REMOTE_ADDR,
        $SERVER_SOFTWARE,
        $GATEWAY_INTERFACE,
        $REQUEST_SCHEME,
        $SERVER_PROTOCOL,
        $DOCUMENT_ROOT,
        $REQUEST_URI,
        $SCRIPT_NAME,
        $REQUEST_METHOD,
        $QUERY_STRING,
        $SCRIPT_FILENAME,
        $PHP_SELF,
        $REQUEST_TIME_FLOAT,
        $REQUEST_TIME,
        $LAT,
        $LNG,
        $META_DATA
    )
    {
        $this->HTTP_ACCEPT_LANGUAGE = $HTTP_ACCEPT_LANGUAGE;
        $this->HTTP_ACCEPT_ENCODING = $HTTP_ACCEPT_ENCODING;
        $this->HTTP_ACCEPT = $HTTP_ACCEPT;
        $this->HTTP_USER_AGENT = $HTTP_USER_AGENT;
        $this->HTTP_UPGRADE_INSECURE_REQUESTS = $HTTP_UPGRADE_INSECURE_REQUESTS;
        $this->HTTP_CONNECTION = $HTTP_CONNECTION;
        $this->HTTP_HOST = $HTTP_HOST;
        $this->REDIRECT_STATUS = $REDIRECT_STATUS;
        $this->SERVER_NAME = $SERVER_NAME;
        $this->SERVER_PORT = $SERVER_PORT;
        $this->SERVER_ADDR = $SERVER_ADDR;
        $this->REMOTE_PORT = $REMOTE_PORT;
        $this->REMOTE_ADDR = $REMOTE_ADDR;
        $this->SERVER_SOFTWARE = $SERVER_SOFTWARE;
        $this->GATEWAY_INTERFACE = $GATEWAY_INTERFACE;
        $this->REQUEST_SCHEME = $REQUEST_SCHEME;
        $this->SERVER_PROTOCOL = $SERVER_PROTOCOL;
        $this->DOCUMENT_ROOT = $DOCUMENT_ROOT;
        $this->REQUEST_URI = $REQUEST_URI;
        $this->SCRIPT_NAME = $SCRIPT_NAME;
        $this->REQUEST_METHOD = $REQUEST_METHOD;
        $this->QUERY_STRING = $QUERY_STRING;
        $this->SCRIPT_FILENAME = $SCRIPT_FILENAME;
        $this->PHP_SELF = $PHP_SELF;
        $this->REQUEST_TIME_FLOAT = $REQUEST_TIME_FLOAT;
        $this->REQUEST_TIME = $REQUEST_TIME;
        $this->LAT = $LAT;
        $this->LNG = $LNG;
        $this->META_DATA = $META_DATA;
    }

    public function insertData()
    {
        $sql = "INSERT INTO `test_application`( 
        `HTTP_ACCEPT_LANGUAGE`, 
        `HTTP_ACCEPT_ENCODING`, 
        `HTTP_ACCEPT`, 
        `HTTP_USER_AGENT`, 
        `HTTP_UPGRADE_INSECURE_REQUESTS`, 
        `HTTP_CONNECTION`, 
        `HTTP_HOST`, 
        `REDIRECT_STATUS`, 
        `SERVER_NAME`, 
        `SERVER_PORT`, 
        `SERVER_ADDR`, 
        `REMOTE_PORT`, 
        `REMOTE_ADDR`, 
        `SERVER_SOFTWARE`, 
        `GATEWAY_INTERFACE`, 
        `REQUEST_SCHEME`, 
        `SERVER_PROTOCOL`, 
        `DOCUMENT_ROOT`, 
        `REQUEST_URI`, 
        `SCRIPT_NAME`, 
        `REQUEST_METHOD`, 
        `QUERY_STRING`, 
        `SCRIPT_FILENAME`,  
        `PHP_SELF`, 
        `REQUEST_TIME_FLOAT`, 
        `REQUEST_TIME`,
        `LAT`,
        `LNG`,
        `META_DATA`) 
        VALUES (
        '$this->HTTP_ACCEPT_LANGUAGE',
        '$this->HTTP_ACCEPT_ENCODING',
        '$this->HTTP_ACCEPT',
        '$this->HTTP_USER_AGENT',
        '$this->HTTP_UPGRADE_INSECURE_REQUESTS',
        '$this->HTTP_CONNECTION',
        '$this->HTTP_HOST',
        '$this->REDIRECT_STATUS',
        '$this->SERVER_NAME',
        '$this->SERVER_PORT',
        '$this->SERVER_ADDR',
        '$this->REMOTE_PORT',
        '$this->REMOTE_ADDR',
        '$this->SERVER_SOFTWARE',
        '$this->GATEWAY_INTERFACE',
        '$this->REQUEST_SCHEME',
        '$this->SERVER_PROTOCOL',
        '$this->DOCUMENT_ROOT',
        '$this->REQUEST_URI',
        '$this->SCRIPT_NAME',
        '$this->REQUEST_METHOD',
        '$this->QUERY_STRING',
        '$this->SCRIPT_FILENAME',
        '$this->PHP_SELF',
         $this->REQUEST_TIME_FLOAT,
        '$this->REQUEST_TIME',
         $this->LAT,
         $this->LNG,
        '$this->META_DATA',
        );";

        try {
            $db = new db();
            $db = $db->connect();
            $stmt = $db->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            print_r($e);
        }
    }

}