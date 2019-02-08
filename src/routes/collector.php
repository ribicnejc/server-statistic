<?php

use Slim\Http\Request;
use Slim\Http\Response;

//http://localhost/server-statistic/public/statistic/collect/choice/1234?meta_data=Nejc
$app->get('/statistic/collect/choice/{meta_key}', function (Request $request, Response $response, $args) {
    $meta_key = $args['meta_key'];
    $meta_data = $request->getQueryParam("meta_data");
    $stat = new Statistic();
    $stat->setUpdateData($meta_data, $meta_key);
    $stat->updateData();
});

//http://localhost/server-statistic/public/statistic/collect/request/1234
$app->get('/statistic/collect/request/{meta_key}', function (Request $request, Response $response, $args) {
    $META_DATA = $args['meta_key'];

    $HTTP_ACCEPT_LANGUAGE = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $HTTP_ACCEPT_ENCODING = $_SERVER['HTTP_ACCEPT_ENCODING'];
    $HTTP_ACCEPT = $_SERVER['HTTP_ACCEPT'];
    $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
    $HTTP_UPGRADE_INSECURE_REQUESTS = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'];
    $HTTP_CONNECTION = $_SERVER['HTTP_CONNECTION'];
    $HTTP_HOST = $_SERVER['HTTP_HOST'];
    $REDIRECT_STATUS = "none";//$_SERVER['REDIRECT_STATUS'];
    $SERVER_NAME = $_SERVER['SERVER_NAME'];
    $SERVER_PORT = $_SERVER['SERVER_PORT'];
    $SERVER_ADDR = $_SERVER['SERVER_ADDR'];
    $REMOTE_PORT = $_SERVER['REMOTE_PORT'];
    $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
    $SERVER_SOFTWARE = $_SERVER['SERVER_SOFTWARE'];
    $GATEWAY_INTERFACE = $_SERVER['GATEWAY_INTERFACE'];
    $REQUEST_SCHEME = $_SERVER['REQUEST_SCHEME'];
    $SERVER_PROTOCOL = $_SERVER['SERVER_PROTOCOL'];
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    $REQUEST_URI = $_SERVER['REQUEST_URI'];
    $SCRIPT_NAME = $_SERVER['SCRIPT_NAME'];
    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
    $QUERY_STRING = $_SERVER['QUERY_STRING'];
    $SCRIPT_FILENAME = $_SERVER['SCRIPT_FILENAME'];
    $PHP_SELF = $_SERVER['PHP_SELF'];
    $REQUEST_TIME_FLOAT = $_SERVER['REQUEST_TIME_FLOAT'];
    $REQUEST_TIME = date('Y/m/d H:i:s', date_timestamp_get(date_create()));

    $response = Unirest\Request::get("https://apility-io-ip-geolocation-v1.p.rapidapi.com/$REMOTE_ADDR",
        array(
            "X-RapidAPI-Key" => "UTPJYeCzZmmshR7bsAyRUYQUdc5Hp11SOBLjsnBOxncKjeEYut",
            "Accept" => "application/json"
        )
    );
    try {
        if ($response->body->ip->as != "") {
            $LAT = $response->body->ip->latitude;
            $LNG = $response->body->ip->longitude;
        } else {
            $LAT = 0.000;
            $LNG = 0.000;
        }
    } catch (Exception $e) {
        $LAT = 0.001;
        $LNG = 0.001;
    }


    $stat = new Statistic();
    $stat->setData($HTTP_ACCEPT_LANGUAGE,
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
        $META_DATA,
        $META_DATA);
    $stat->insertData();
});
