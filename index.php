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
      "type" => "bubble",
      "direction" => "ltr",
      "header" => [
        "type" => "box",
        "layout" => "vertical",
        "contents" => [
          [
            "type" => "text",
            "text" => "SmartLocker",
            "size" => "lg",
            "align" => "center",
            "weight" => "bold",
            "color" => "#009813"
          ]
        ]
      ],
        "hero" => [
    "type" => "image",
    "url" => "https://vos.line-scdn.net/bot-designer-template-images/bot-designer-icon.png",
    "size" => "full",
    "aspectRatio" => "1.51:1",
    "aspectMode" => "fit"
  ],
      "body" => [
        "type" => "box",
        "layout" => "vertical",
        "contents" => [
          [
            "type" => "text",
            "text" => "SmartLocker ยินดีให้บริการครับ",
            "align" => "center"
          ]
        ]
      ],
      "footer" => [
        "type" => "box",
        "layout" => "horizontal",
        "contents" => [
          [
            "type" => "text",
            "text" => "Location",
            "size" => "lg",
            "align" => "center",
            "color" => "#0084B6",
            "action" => [
              "type" => "message",
              "label" => "Location",
              "text" => "Location"
            ]
          ],
          [
            "type" => "text",
            "text" => "How To Use",
            "size" => "lg",
            "align" => "center",
            "color" => "#0084B6",
            "action" => [
              "type" => "message",
              "label" => "How To Use",
              "text" => "How To Use"
            ]
          ]
        ]
      ]
    ]
  ];

if ( sizeof($request_array['events']) > 0 ) {
    foreach ($request_array['events'] as $event) {
        error_log(json_encode($event));
        $reply_message = '';
        $reply_token = $event['replyToken'];


        $data = [
            'replyToken' => $reply_token,
            'messages' => [$jsonFlex]
        ];

        print_r($data);

        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
        
    }
}

echo "OK";




function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}
    


?>
