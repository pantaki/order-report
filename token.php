<?php

//Get our helper functions
require_once("inc/function.php");
require_once("inc/mysql_connect.php");

// Set varibles for our request
$api_key = "f725a2b0f04922ff794632b712428bc2";
$shared_secret ="76c167abeefe67a11dfeab66802ec956";
$params = $_GET;
$hmac = $_GET['hmac'];

$params = array_diff_key($params, array('hmac' => ''));
ksort($params);

$computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);

// Use hmac data to check that the response is from Shopify or not
if (hash_equals($hmac, $computed_hmac)) {

    // Set variables for our request
    $query = array(
        "client_id" => $api_key,
        "client_secret" => $shared_secret,
        "code" => $params['code']
    );

    // Generate access token URL
    $access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";

    // Configure curl client and execute request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $access_token_url);
    curl_setopt($ch, CURLOPT_POST, count($query));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
    $result = curl_exec($ch);
    curl_close($ch);

    // Store the access token
    $result = json_decode($result, true);
    $access_token = $result['access_token'];
    echo $access_token;

    $sql = "INSERT INTO shops (shop_url, access_token, install_date) VALUES ('".$params['shop']."','".$access_token."',NOW())";

    if($conn->query($sql)) {
        header("Location: https://" .$params['shop']."/admin/apps/export-order-7");
        exit();
    } else {
        echo "Error for inserting the access token.";
    }
//    echo $access_token;

//    header("Location: https://" . $params['shop']. "/admin/apps/export-order-7");
//    exit();

} else {
    // Someone is trying to be shady!
    die('This request is NOT from Shopify!');
}
?>


