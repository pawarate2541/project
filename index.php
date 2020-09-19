<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'WqFC4QmBYDd5ZYutXd3ZMKS2zizMZWHc7PzS1W/Xt3//C/6s8nCUn8/2SzCu2SyBFcEe7vy/VAckgL7P32dhcOqalm5wpO91T4YkplUYh6WwSbP+cWCmHntm2TzH/hD1oNLWLDAZqb4JULuuq8lErQdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '98fdde1d2a1e51e0b7c0cd2472d69002';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

$jsonFlex = [
    "type" => "flex",
    "altText" => "Hello Flex Message",
    "contents" => [
        [
        "type"=> "text",
        "text"=> "หนักไหม ฝากของกับเราได้นะ Smart locker ยินดีให้บริการครับผม "
       ],
       [
        "type"=> "sticker",
        "packageId"=> "11537",
        "stickerId"=> "52002735"
       ]
      ]  
];




?>
